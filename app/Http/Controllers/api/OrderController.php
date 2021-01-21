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
            ->select('customers.customer_name','orders.*')
            ->where('order_date',$date)
            ->get();

        return response()->json($order);

    }

  //  public function thisWeeek(){
      //  Carbon::setWeekStartsAt(Carbon::SUNDAY);

       // $thisWeek =  DB::table('orders')

      //      ->whereBetween('created_at',[Carbon::now()->startOfWeek(),Carbon::now()->endOfWeek()])
       //     ->get();
     //   return response()->json($thisWeek);
    //}

    public function thisMonth(){
        $date = date('F');

        $orders = DB::table('orders')
            ->join('customers','orders.customer_id','customers.id')
            ->select('customers.customer_name','orders.*')
            ->where('order_month',$date)
            ->get();

        return response()->json($orders);
    }

    public function all(){
        $order = DB::table('orders')
            ->join('customers','orders.customer_id','customers.id')
            ->select('customers.customer_name','customers.phone_number','customers.address','orders.*')
            ->get();

        return response()->json($order);
    }
    public function details($id){
        $order = DB::table('orders')
            ->join('customers','orders.customer_id','customers.id')
            ->select('customers.customer_name','customers.phone_number','customers.address','orders.*')
            ->where('orders.id',$id)
            ->first();

        return response()->json($order);
    }

    public function OrderDetailsAll($id){

        $details = DB::table('orders_details')
            ->join('products','orders_details.product_id','products.id')
            ->where('orders_details.order_id',$id)
            ->select('products.product_name','products.product_code','products.product_image','orders_details.*')
            ->get();
        return response()->json($details);


    }
    public function status($id){
        $orders = DB::table('orders')
            ->where('id',$id)
            ->first();

        return response()->json($orders);

    }

    public function update(Request $request,$id){
        $status = $request->order_status;
        $update = DB::table('orders')->where('id',$id)->update(['order_status'=> $status ]);

        return response()->json($update);

    }


}
