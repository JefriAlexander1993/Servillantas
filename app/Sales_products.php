<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sales_products extends Model
{
       protected $table = 'sales_products';

    protected $fillable = [
        'quantity','price','total', 
    ];
}
