<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Product;
use App\Model\Order;
use Carbon\Carbon;
use DB;
use Image;

class PosController extends Controller
{
    public function categorisedProduct($id){
        $categorisedProduct = Product::where('category_id',$id)->get();

        return response()->json($categorisedProduct);
    }

    public function orderDone(Request$request){
       $validate = $request->validate([
           'customer_id' => 'required',
           'pay_by' =>'required',
           'vat'=>'required'
       ]);

       $data = array();

       $data['customer_id'] = $request->customer_id;
       $data['qty'] = $request->qty;
       $data['sub_total'] = $request->subtotal;
       $data['vat'] = $request->vat;
       $data['total'] = $request->total;
       $data['pay'] = $request->pay;
       $data['due'] = $request->dues;
       $data['pay_by'] = $request->pay_by;
       $data['created_at'] = Carbon::now();
       $data['order_date'] = date('d/m/Y');
       $data['order_month'] = date('F');
       $data['order_year'] = date('Y');
       $data['order_status'] = 'processing';

       $order_id = DB::table('orders')->insertGetId($data);



       $details = DB::table('carts')->get();

       $odata = array();

       foreach ($details as $detail){
           $odata['order_id'] = $order_id;
           $odata['product_id'] = $detail->product_id;
           $odata['product_qty'] = $detail->qty;
           $odata['product_price'] = $detail->product_price;
           $odata['subtotal'] = $detail->subtotal;
           $odata['total'] = $request->total;
           $odata['vat'] = $request->vat;

         $insert_odetails=   DB::table('orders_details')->insert($odata);

         $reduce_stock = DB::table('products')->where('id',$detail->product_id)->update(['product_quantity' => DB::raw('product_quantity -'.$detail->qty)]);

       }

       $delete_cart = DB::table('carts')->delete();


    }


}
