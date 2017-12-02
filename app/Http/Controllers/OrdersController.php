<?php

namespace UHack\Pronto\Http\Controllers;

use UHack\Pronto\Order;
use UnionBank;

class OrdersController extends Controller
{

    public function checkout(Order $order)
    {
        $redirectUrl = UnionBank::authorizeUrl();

        return view('web.checkout', compact('order', 'redirectUrl'));
    }

}
