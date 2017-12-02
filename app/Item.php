<?php

namespace UHack\Pronto;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'quantity',
        'product_id'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
