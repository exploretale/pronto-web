<?php

namespace UHack\Pronto;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
