<?php

namespace UHack\Pronto\Http\Controllers;

use UHack\Pronto\Http\Transformers\MerchantTransformer;
use UHack\Pronto\Merchant;

class MerchantController extends ApiController
{

    public function index()
    {
        $merchants = Merchant::all();

        return $this->response->withCollection($merchants, new MerchantTransformer);
    }

}
