<?php

namespace UHack\Pronto\Http\Controllers\Api;

use UHack\Pronto\Http\Controllers\ApiController;
use UHack\Pronto\Http\Transformers\MerchantTransformer;
use UHack\Pronto\Merchant;

class MerchantsController extends ApiController
{

    public function index()
    {
        $merchants = Merchant::all();

        return $this->response->withCollection($merchants, new MerchantTransformer);
    }

}
