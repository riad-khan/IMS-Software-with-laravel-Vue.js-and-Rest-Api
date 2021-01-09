<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Salary;
use DB;

class SalaryController extends Controller
{
        public function paid(Request $request,$id){
            $validate = $request->validate([
                'month' =>'required',
            ]);
            $month = $request->month;
            $check = DB::table('salaries')->where('employee_id',$id)->where('month',$month)->first();
            if($check){
                return response()->json('already Paid');
            }else{
                $data =array();

                $data['employee_id'] = $id;
                $data['employee_name'] = $request->name;
                $data['employee_email'] = $request->email;
                $data['amount'] = $request->salary;
                $data['month'] = $month;
                $data['year'] = date('Y');

                DB::table('salaries')->insert($data);

            }

        }

}
