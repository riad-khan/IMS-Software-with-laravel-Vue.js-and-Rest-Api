<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class printController extends Controller
{
    public function latestOrder(){
        $fetch = DB::table('orders_details')->latest('order_id')->first();
        $orderId = $fetch->order_id;


        $product = DB::table('orders_details')
            ->join('products','orders_details.product_id','products.id')
            ->select('*')
            ->where('orders_details.order_id',$orderId)
            ->get();

        return response()->json($product);
    }
    public function subtotal(){
        $fetch = DB::table('orders_details')->latest('order_id')->first();
        $orderId = $fetch->order_id;

        $sub = DB::table('orders_details')->select('subtotal')->where('order_id',$orderId)->sum('subtotal');

        return response()->json($sub);

    }

    public function vat(){
        $fetch = DB::table('orders_details')->latest('order_id')->first();
        $orderId = $fetch->order_id;
        $vat = DB::table('orders_details')->select('vat')->where('order_id',$orderId)->groupBy('vat')->get();

        return response()->json($vat);
    }

    public function total(){
        $fetch = DB::table('orders_details')->latest('order_id')->first();
        $orderId = $fetch->order_id;
        $total = DB::table('orders_details')->select('total')->where('order_id',$orderId)->groupBy('total')->get();
        return response()->json($total);
    }
    public function paid(){
        $fetch = DB::table('orders_details')->latest('order_id')->first();
        $orderId = $fetch->order_id;

        $fetch = DB::table('orders')->where('id',$orderId)->get();

        return response()->json($fetch);
    }
}
