<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'manufacturer_id','type_id','concentration','product_name',
    ];
}
