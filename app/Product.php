<?php

namespace UHack\Pronto;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $fillable = [
        'merchant_id',
        'sku',
        'name',
        'description',
        'image',
        'price',
    ];

    public function merchant()
    {
        return $this->belongsTo(Merchant::class);
    }

    public function items()
    {
        return $this->hasMany(Item::class);
    }
}
