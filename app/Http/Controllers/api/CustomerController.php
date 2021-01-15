<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Model\Product;
use Illuminate\Http\Request;
use App\Model\Customer;
use DB;
use Image;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $all_customer = Customer::all();
       return response()->json($all_customer);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'customer_name' => 'required',
            'customer_email' =>'required|unique:customers|max:255',
            'phone_number' => 'required',
            'address' => 'required',

        ]);

        if($request->image){
            $position = strpos($request->image,';');

            //which index to take
            $sub = substr($request->image,0,$position);
            //remove slash from image link

            $ext = explode('/',$sub)[1];

            //image naming //

            $name = time().".".$ext;

            //image making & resizing with intervention //
            $image = Image::make($request->image)->resize(240,200);

            //upload path//
            $upload_path = 'ims/customer/';
            $image_url = $upload_path.$name;
            $image->save($image_url);

            $customer = new Customer();

            $customer->customer_name = $request->customer_name;
            $customer->customer_email = $request->customer_email;
            $customer->phone_number = $request->phone_number;
            $customer->address = $request->address;

            $customer->image = $image_url;


            $customer->save();
        }else{
            $customer = new Customer();

            $customer->customer_name = $request->customer_name;
            $customer->customer_email = $request->customer_email;
            $customer->phone_number = $request->phone_number;
            $customer->address = $request->address;

            $customer->save();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $find = Customer::find($id);
        return response()->json($find);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $data = array();
        $data['customer_name'] = $request->customer_name;
        $data['customer_email'] = $request->customer_email;
        $data['phone_number'] = $request->phone_number;
        $data['address'] = $request->address;
        $image = $request->newimage;

        if($image){
            //first select position from where to start
            $position = strpos($image,';');

            //which index to take
            $sub = substr($image,0,$position);
            //remove slash from image link

            $ext = explode('/',$sub)[1];

            //image naming //

            $name = time().".".$ext;

            //image making & resizing with intervention //
            $image = Image::make($image)->resize(240,200);

            //upload path//
            $upload_path = 'ims/customer/';
            $image_url = $upload_path.$name;
            $img = $image->save($image_url);

            if($img){
                $data['image'] = $image_url;
                $oldImage= Customer::where('id',$id)->first();
                $oldImagePath = $oldImage->image;
                $unbind = unlink($oldImagePath);

                $update = Customer::where('id',$id)->update($data);
                return response()->json('updated');
            }
        }else{
            $oldphoto = $request->image;
            $data['image'] = $oldphoto;
            $update = Customer::where('id',$id)->update($data);

            return response()->json('updated');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $find = Customer::find($id);
        $photo = $find->image;

        if($photo){
            unlink($photo);
           $delete = Customer::where('id',$id)->delete();
        }else{
            $delete = Customer::where('id',$id)->delete();
        }
    }
}
