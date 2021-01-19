<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;

class OrderController extends Controller
{
    public function todaysOrder(){
        $date = date('d/m/Y');

        $order = DB::table('orders')
            ->join('customers','orders.customer_id','customers.id')
            ->where('order_date',$date)
            ->get();

        return response()->json($order);

    }

    public function thisWeeek(){
        Carbon::setWeekStartsAt(Carbon::SUNDAY);

        $thisWeek =  DB::table('orders')

            ->whereBetween('created_at',[Carbon::now()->startOfWeek(),Carbon::now()->endOfWeek()])
            ->get();
        return response()->json($thisWeek);
    }

    public function thisMonth(){
        $date = date('F');

        $orders = DB::table('orders')
            ->join('customers','orders.customer_id','customers.id')
            ->where('order_month',$date)
            ->get();

        return response()->json($orders);
    }

    public function all(){
        $order = DB::table('orders')
            ->join('customers','orders.customer_id','customers.id')
            ->get();

        return response()->json($order);
    }



}
