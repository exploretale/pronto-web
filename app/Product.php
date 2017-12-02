<?php

namespace UHack\Pronto;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    public function merchant()
    {
        return $this->belongsTo(Merchant::class);
    }
}
