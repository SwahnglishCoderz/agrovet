<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $fillable = [
        'product_id',
        'quantity',
        'manufactured_date',
        'expiry_date',
        'date_stocked',
        'bought_price',
        'transport_cost',
    ];
}
