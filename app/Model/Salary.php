<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    protected $table = 'salaries';
    protected $fillable = [
        'employee_id', 'employee_name','employee_email','amount','month','year'
    ];
}
