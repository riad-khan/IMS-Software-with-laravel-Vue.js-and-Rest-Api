<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Product;
use App\Model\Category;
use DB;
use Image;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = DB::table('products')
                    ->join('categories','products.category_id','categories.id')
                    ->join('suppliers','products.supplier_id','suppliers.id')
                    ->select('categories.name','suppliers.sname','products.*')
                    ->orderBy('products.id','DESC')
                    ->get();

        return response()->json($product);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $validate = $request->validate([
           'product_name' => 'required',
           'product_description' =>'required',
           'product_code' => 'required|unique:products',
           'selling_price' => 'required',
           'product_quantity' => 'required',
           'photo' => 'required',
       ]);

        if($request->photo){
            //first select position from where to start
            $position = strpos($request->photo,';');

            //which index to take
            $sub = substr($request->photo,0,$position);
            //remove slash from image link

            $ext = explode('/',$sub)[1];

            //image naming //

            $name = time().".".$ext;

            //image making & resizing with intervention //
            $image = Image::make($request->photo)->resize(240,200);

            //upload path//
            $upload_path = 'ims/products/';
            $image_url = $upload_path.$name;
            $image->save($image_url);

            $products = new Product;

            $products->product_name = $request->product_name;
            $products->product_description = $request->product_description;
            $products->product_code = $request->product_code;
            $products->selling_price = $request->selling_price;
            $products->root = $request->root;
            $products->buying_price = $request->buying_price;
            $products->category_id = $request->category_id;
            $products->supplier_id = $request->supplier_id;
            $products->product_quantity = $request->product_quantity;
            $products->product_image = $image_url;

            $products->save();


        }else{

            $products = new Product();

            $products->product_name = $request->product_name;
            $products->product_description = $request->product_description;
            $products->product_code = $request->product_code;
            $products->selling_price = $request->selling_price;
            $products->root = $request->root;
            $products->buying_price = $request->buying_price;
            $products->category_id = $request->category_id;
            $products->supplier_id = $request->supplier_id;
            $products->product_quantity = $request->product_quantity;


            $products->save();
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
        $edit = Product::find($id);

        return response()->json($edit);
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

        $data['product_name'] = $request->product_name;
        $data['product_description'] = $request->product_description;
        $data['product_code'] = $request->product_code;
        $data['selling_price'] = $request->selling_price;
        $data['root'] = $request->root;
        $data['buying_price'] = $request->buying_price;
        $data['category_id'] = $request->category_id;
        $data['supplier_id'] = $request->supplier_id;
        $data['product_quantity'] = $request->product_quantity;
        $image = $request->newphoto;

        if($image){
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
            $upload_path = 'ims/products/';
            $image_url = $upload_path.$name;
            $img = $image->save($image_url);

            if($img){
                $data['product_image'] = $image_url;
                $findphoto = Product::where('id',$id)->first();
                $oldImagePath = $findphoto->product_image;
                $unbind = unlink($oldImagePath);



                $update = Product::where('id',$id)->update($data);
            }
        }else{
            $oldPhoto = $request->photo;
            $data['product_image'] = $oldPhoto;
            $update = Product::where('id',$id)->update($data);
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
        $delete = Product::where('id',$id)->delete();
    }
}
