<?php

namespace UHack\Pronto;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    public function merchant()
    {
        return $this->belongsTo(Merchant::class);
    }
}
