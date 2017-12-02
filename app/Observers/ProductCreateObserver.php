<?php

namespace UHack\Pronto\Observers;

use UHack\Pronto\Product;

class ProductCreateObserver
{

    public function creating(Product $product)
    {
        $product->sku = substr(uniqid('PRNT-'), 0, 15);
    }

}