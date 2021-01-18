<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
   protected $table = 'orders';
    protected $fillable = [
        'customer_id', 'qty','sub_total','vat','total','pay','due','pay_by','order_date','order_month','order_year'
    ];
}
