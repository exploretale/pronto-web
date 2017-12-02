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
            'image' => $model->image,
            'description' => $model->description,
            'price' => $model->price ? number_format($model->price, 2) : null
        ];
    }
}