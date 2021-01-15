<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Product;
use App\Model\Category;
use DB;
use Image;

class PosController extends Controller
{
    public function categorisedProduct($id){
        $categorisedProduct = Product::where('category_id',$id)->get();

        return response()->json($categorisedProduct);
    }
}
