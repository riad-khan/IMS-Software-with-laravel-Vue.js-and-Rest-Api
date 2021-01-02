<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Employee;
use DB;
use Image;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $employee = Employee::all();
       return response()->json($employee);
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
           'name' => 'required|unique:employees|max:255',
           'email' => 'required',
           'phone' => 'required'
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
            $upload_path = 'ims/employee/';
            $image_url = $upload_path.$name;
            $image->save($image_url);

          $employee = new Employee;

          $employee->name = $request->name;
            $employee->email = $request->email;
            $employee->phone = $request->phone;
            $employee->nid = $request->nid;
            $employee->salary = $request->salary;
            $employee->date = $request->date;
            $employee->photo = $image_url;

            $employee->save();


        }else{
            $employee = new Employee;
            $employee->name = $request->name;
            $employee->email = $request->email;
            $employee->phone = $request->phone;
            $employee->nid = $request->nid;
            $employee->salary = $request->salary;
            $employee->date = $request->date;

            $employee->save();
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
