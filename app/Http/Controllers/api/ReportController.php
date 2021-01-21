<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class ReportController extends Controller
{
    public function todaysSell(){
        $date = date('d/m/Y');
        $count = DB::table('orders')->where('order_date',$date)->sum('total');

        return response()->json($count);
    }

    public function monthly(){

        $count = DB::table('orders')->whereYear('created_at',Carbon::now()->year)->whereMonth('created_at',Carbon::now()->month)->sum('total');

        return response()->json($count);
    }

    public function totalSell(){

        $count = DB::table('orders')->sum('pay');

        return response()->json($count);
    }

    public function totalDue(){

        $count = DB::table('orders')->sum('due');

        return response()->json($count);
    }
    public function totalorders(){

        $count = DB::table('orders')->count();

        return response()->json($count);
    }

    public function delivered(){
        $order_status = 'Delivered';

        $count = DB::table('orders')->where('order_status',$order_status)->count();

        return response()->json($count);
    }
    public function queue(){
        $order_status = 'processing';

        $count = DB::table('orders')->where('order_status',$order_status)->count();

        return response()->json($count);
    }

    public function shipping(){
        $order_status = 'shipping';

        $count = DB::table('orders')->where('order_status',$order_status)->count();

        return response()->json($count);
    }
    public function employee(){


        $count = DB::table('employees')->count();

        return response()->json($count);
    }
    public function monthlySalary(){

        $date = date('F');

        $count = DB::table('salaries')->where('month',$date)->groupBy('year')->orderBy('year','DESC')->sum('amount');

        return response()->json($count);
    }
    public function year(){

        $date = date('Y');

        $count = DB::table('salaries')->where('year',$date)->sum('amount');

        return response()->json($count);
    }
    public function expense(){

        $count = DB::table('expenses')->whereYear('created_at',Carbon::now()->year)->whereMonth('created_at',Carbon::now()->month)->sum('amount');

        return response()->json($count);
    }

    public function totalExpense(){

        $count = DB::table('expenses')->sum('amount');

        return response()->json($count);
    }
    public function supplier(){

        $count = DB::table('suppliers')->count();

        return response()->json($count);
    }

    public function topSelling(){

        $topsales = DB::table('orders_details')
            ->leftJoin('products','products.id','=','orders_details.product_id')
            ->select('products.id','products.product_name','orders_details.product_id',
                DB::raw('SUM(orders_details.product_qty) as total'))
            ->groupBy('products.id','orders_details.product_id','products.product_name')
            ->orderBy('total','desc')
            ->limit(6)
            ->get();

        return response()->json($topsales);
    }


}
