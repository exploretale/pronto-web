<?php

namespace UHack\Pronto\Http\Transformers;

use League\Fractal\TransformerAbstract;
use UHack\Pronto\Item;
use UHack\Pronto\Merchant;

class ItemTransformer extends TransformerAbstract
{
    public function transform(Item $model)
    {
        return [
            'id' => (int)$model->id,
            'product_id' => (int)$model->product_id,
            'quantity' => (int)$model->quantity,
        ];
    }
}
