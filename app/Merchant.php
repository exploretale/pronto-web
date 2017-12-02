<?php

namespace UHack\Pronto;

use Illuminate\Database\Eloquent\Model;

class Merchant extends Model
{

    protected $fillable = [
        'user_id',
        'zomato_id',
        'name',
        'url',
        'image',
        'address',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
