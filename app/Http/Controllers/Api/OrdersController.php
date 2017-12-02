<?php

namespace UHack\Pronto\Http\Controllers\Api;

use Carbon\Carbon;
use EllipseSynergie\ApiResponse\Laravel\Response;
use Illuminate\Http\Request;
use UHack\Pronto\Http\Controllers\ApiController;
use UHack\Pronto\Http\Transformers\OrderTransformer;
use UHack\Pronto\Order;
use GuzzleHttp\Client;

class OrdersController extends ApiController
{

    public function store(Request $request)
    {
        //get access token
        $orderData = $request->only([
            'merchant_id',
        ]);
        $itemData = $request->only([
            'product_id',
            'quantity'
        ]);

        $order = Order::create($orderData);

        $order->items()->create($itemData);


        return response()->withArray([
            'checkout_url' => ""

        ]);
    }


    public function redirect(Request $request)
    {
        $data = $request->get('code');
        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'https://api-uat.unionbankph.com/partners/',

        ]);

        $response = json_decode($client->request('POST', 'sb/convergent/v1/oauth2/token', [
            'form_params' => [
                'grant_type' => "authorization_code",
                "client_id" => config('UNIONBANK_CLIENT_ID'),
                "code" => $data,
                "redirect_uri" => ""
            ],
            'allow_redirects' => false
        ])->getBody());

        return $this->processOrderPayment($response['access_token']);
    }

    private function processOrderPayment($accessToken)
    {
        $latestOrder = Order::pending()->latest()->first();

        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'https://api-uat.unionbankph.com/partners/',

        ]);

        $item = $latestOrder->items()->first();
        $amount = $item->product->price * $item->quantity;

        $response = json_decode($client->request('POST', 'sb/merchants/v1/payments/single', [

            "authorization" => "Bearer " . $accessToken,
            "x-ibm-client-id" => config('UNIONBANK_CLIENT_ID'),
            "x-ibm-client-secret" => config('UNIONBNK_CLIENT_SECRET'),
            "x-merchant-id" => "2c27bb1b-c55b-4c6c-ad63-8ac62501a8a1",
            'content-type' => "application/json",
            "accept" => "application/json",
            'json' => [
                "senderPaymentId" => "$latestOrder->id",
                "paymentRequestDate" => "2017-10-10T12:11:50Z",
                'remarks' => 'Pronto food ordering',

                "amount" => [
                    "currency" => "PHP",
                    "value" => "$amount",
                ]
            ],
            'allow_redirects' => false
        ])->getBody());

        if ($response['state'] === 'SUCCESS') {
            $latestOrder->update([
                'status' => Order::STATUS_ACTIVE
            ]);
            return response()->json([
                'success' => 'Successfully paid for order!'
            ]);
        } else {

            return response()->json([
                'success' => 'An error has occurred'
            ]);
        }
    }
}
