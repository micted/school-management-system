<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmployeeSalaryLog;
use DB;

class SalarylogController extends Controller
{

//public function showChart()
  //  {

        
        //$increment = EmployeeSalaryLog::select(
            //DB::raw("year(effected_salary) as year"),
           // DB::raw("SUM(previous_salary) as previous_salary"),
           // DB::raw("SUM(increment_salary) as increment_salary")) 
        //->orderBy(DB::raw("YEAR(effected_salary)"))
        //->groupBy(DB::raw("YEAR(effected_salary)"))
       // ->get(); 

        //$res[] = ['Year', 'increment_salary', 'previous_salary'];

        
      //  foreach ($increment as $key => $val) {
            //$res[++$key] = [$val->year, (int)$val->increment_salary, (int)$val->previous_salary];
      //  }

      //  return view('home')
         //   ->with('increment', json_encode($res));

	//}

}

