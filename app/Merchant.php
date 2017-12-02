<?php

namespace UHack\Pronto;

use Illuminate\Database\Eloquent\Model;

class Merchant extends Model
{

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
