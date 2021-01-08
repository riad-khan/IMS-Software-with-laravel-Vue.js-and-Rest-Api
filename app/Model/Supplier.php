<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $table='suppliers';
    protected $fillable = [
        'sname', 'email', 'phone','nid','address','shop','photo'
    ];


}
