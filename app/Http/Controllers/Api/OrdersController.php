<?php

namespace UHack\Pronto\Http\Controllers\Api;

use Carbon\Carbon;
use EllipseSynergie\ApiResponse\Laravel\Response;
use Illuminate\Http\Request;
use UHack\Pronto\Http\Controllers\ApiController;
use UHack\Pronto\Http\Transformers\OrderTransformer;
use UHack\Pronto\Order;
use GuzzleHttp\Client;
use UnionBank;

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


        return response()->json([
            'checkout_url' => route('checkout', $order)
        ]);
    }


    public function redirect(Request $request)
    {
        $data = $request->get('code');
        $response = json_decode(UnionBank::getHttpClient()->request('POST', 'sb/convergent/v1/oauth2/token', [
            'form_params' => [
                'grant_type' => "authorization_code",
                "client_id" => config('unionbank.client_id'),
                "code" => $data,
                "redirect_uri" => UnionBank::getRedirectUrl()
            ],
            'allow_redirects' => false
        ])->getBody(), true);

        return $this->processOrderPayment($response['access_token']);
    }

    private function processOrderPayment($accessToken)
    {
        $latestOrder = Order::pending()->latest()->first();
        $item = $latestOrder->items()->first();
        $amount = $item->product->price * $item->quantity;

        $response = json_decode(UnionBank::getHttpClient()->request('POST', 'sb/merchants/v1/payments/single', [

            "authorization" => "Bearer " . $accessToken,
            "x-ibm-client-id" => config('unionbank.client_id'),
            "x-ibm-client-secret" => config('unionbank.client_secret'),
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
        ])->getBody(), true);

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
