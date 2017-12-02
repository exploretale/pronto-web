<?php

namespace UHack\Pronto\Http\Controllers\Api;

use Illuminate\Http\Request;
use UHack\Pronto\Http\Controllers\ApiController;
use UHack\Pronto\Http\Transformers\OrderTransformer;
use UHack\Pronto\Order;

class OrdersController extends ApiController
{
    public function store(Request $request)
    {
        $orderData = $request->only([
            'merchant_id'
        ]);
        $orderItems = $request->get('items');

        $order = Order::create($orderData);
        foreach ($orderItems as $orderItem) {
            $order->items()->create($orderItem);
        }

        return $this->response->withItem($order, new OrderTransformer);
    }


    public function redirect(Request $request)
    {
        //$accessCode = $request->get('code');

        //post to get access code


    }
}
