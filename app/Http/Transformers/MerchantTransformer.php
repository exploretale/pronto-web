<?php

namespace UHack\Pronto\Http\Transformers;

use League\Fractal\TransformerAbstract;
use UHack\Pronto\Merchant;

class MerchantTransformer extends TransformerAbstract
{
    protected $defaultIncludes = [
        'products',
    ];

    public function transform(Merchant $model)
    {
        return [
            'id' => (int)$model->zomato_id,
            'name' => $model->name,
            'image' => $model->image,
            'url' => $model->url,
            'address' => $model->address,
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at,
        ];
    }

    public function includeProducts(Merchant $model)
    {
        $collection = $model->products;

        if ($collection->isEmpty()) {
            return null;
        }

        return $this->collection($collection, new ProductTransformer);
    }
}
