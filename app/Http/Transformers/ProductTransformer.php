<?php

namespace UHack\Pronto\Http\Transformers;

use League\Fractal\TransformerAbstract;
use UHack\Pronto\Product;

class ProductTransformer extends TransformerAbstract
{

    public function transform(Product $model)
    {
        return [
            'id' => (int)$model->id,
            'sku' => $model->sku,
            'name' => $model->name,
            'description' => $model->description,
            'price' => $model->price ? number_format($model->price) : null
        ];
    }
}