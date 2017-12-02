<?php

namespace UHack\Pronto;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    const STATUS_PENDING = 'PENDING';
    const STATUS_SUCCESS = 'SUCCESS';

    protected $fillable = [
        'merchant_id',
        'status',
    ];

    public function merchant()
    {
        return $this->belongsTo(Merchant::class);
    }

    public function items()
    {
        return $this->hasMany(Item::class);
    }

    public function scopePending($query)
    {
        return $query->where('status', self::STATUS_PENDING);
    }
}
