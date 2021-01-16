<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'carts';
    protected $fillable = [
      'product_id','product_name','qty','product_price','subtotal','order_status'
    ];
}
