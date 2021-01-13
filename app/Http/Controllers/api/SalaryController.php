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

        public function list_year(){
            $year = DB::table('salaries')
                ->select('year',DB::raw('count(*) as total'))
                ->groupBy('year')
                ->orderBy('year','DESC')
                ->get();

            return response()->json($year);

        }

        public function month_list($id){
            $month_name = $id;
            $month = DB::table('salaries')
                ->select('month')
                ->where('year',$month_name)
                ->groupBy('month')
                ->orderBy('month','DESC')
                ->get();
            return response()->json($month);
        }

        public function salary_list($id){
            $month_name = $id;
            $list = DB::table('salaries')
                ->select('*')
                ->where('month',$id)
                ->get();

            return response()->json($list);
        }
        public  function total_paid($id){
            $month_name = $id;

            $total = DB::table('salaries')
                ->select('amount')
                ->where('month',$month_name)
                ->sum('amount');
            return response()->json($total);
        }

        public function edit($id){

           // $find = DB::table('salaries')->where('id',$id)->first();

            $find = Salary::find($id);

            return response()->json($find);

        }

        public function update( Request $request,$id){
            $data =array();

            $data['month'] = $request->month;

            $update = new Salary();

            $update_salary = Salary::where('id',$id)->update($data);



        }




}
