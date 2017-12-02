<?php

namespace UHack\Pronto\Http\Transformers;

use League\Fractal\TransformerAbstract;
use UHack\Pronto\Merchant;
use UHack\Pronto\Order;

class OrderTransformer extends TransformerAbstract
{
    protected $defaultIncludes = [
        'items'
    ];

    public function transform(Order $model)
    {
        return [
            'id' => (int)$model->id,
            'status' => $model->status,
        ];
    }

    public function includeItems(Order $model)
    {
        $collection = $model->items;

        if ($collection->isEmpty()) {
            return null;
        }

        return $this->collection($collection, new ItemTransformer);
    }
}
