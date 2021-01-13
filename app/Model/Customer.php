<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
   protected $table = 'customers';
    protected $fillable = [
        'customer_name', 'customer_email', 'phone_number','address','image'
    ];
}
