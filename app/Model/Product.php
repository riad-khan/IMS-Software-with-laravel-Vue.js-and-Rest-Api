<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = [
        'product_name', 'product_description', 'product_code','selling_price','root','buying_price','category_id','supplier_id','product_quantity','product_image'
    ];

    public function categories(){
        return $this->belongsTo(Category::class);
    }

    public function supplier(){
        return $this->belongsTo(Supplier::class);
    }
}
