<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Product;
use App\Model\Cart;

class CartController extends Controller
{
    public function addCart(Request $request,$id){
        $fetchProduct = Product::where('id',$id)->first();

        $data = array();

        $data['product_id'] = $id;
        $data['product_name'] = $fetchProduct->product_name;

        $data['qty'] = 1;
        $data['product_price'] = $fetchProduct->selling_price;
        $data['subtotal'] = $fetchProduct->selling_price;
        $data['order_status'] ='unknown';

        $qty = $fetchProduct->product_quantity;

        if($qty < 1){
            return response()->json('product stock Out');
        }else{
            $cartInsert = new Cart();

            $insert = $cartInsert->create($data);
        }




    }

    public function getCartProducts(){
        $order_status = 'unknown';
      $get = Cart::where('order_status',$order_status)->get();


        return response()->json($get);
    }

    public function removeProducts($id){
        $find = Cart::where('id',$id)->delete();
    }

}
