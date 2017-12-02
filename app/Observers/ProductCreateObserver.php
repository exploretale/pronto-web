<?php

namespace UHack\Pronto\Observers;

use UHack\Pronto\Product;

class ProductCreateObserver
{

    public function creating(Product $product)
    {
        $product->sku = "PRNT-{$this->generateSKU()}";
    }

    private function generateSKU()
    {
        do {
            $salt = sha1(time() . mt_rand());
            $newKey = substr($salt, 0, 10);
        }
        while (Product::where('sku', $newKey)->count());

        return $newKey;
    }

}