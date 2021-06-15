<?php

namespace App\Http\Controllers;

use App\Models\AccountEmployeeSalary;
use App\Models\AccountOtherCost;
use App\Models\StudentClass;
use App\Models\User;
use App\Models\SchoolSubject;
use App\Models\DiscountStudent;
use App\Models\EmployeeSalaryLog;
use App\Models\AccountStudentFee;
use Illuminate\Http\Request;
use Auth;
use DB;

class AdminController extends Controller
{
    public function Logout(){
    	Auth::logout();
    	return Redirect()->route('login');

    }

    public function index() {

         
        $increment = EmployeeSalaryLog::select(
            DB::raw("year(effected_salary) as year"),
            DB::raw("SUM(previous_salary) as previous_salary"),
            DB::raw("SUM(increment_salary) as increment_salary")) 
        ->orderBy(DB::raw("YEAR(effected_salary)"))
        ->groupBy(DB::raw("YEAR(effected_salary)"))
        ->get(); 

        $res[] = ['Year', 'increment_salary', 'previous_salary'];

        
        foreach ($increment as $key => $val) {
            $res[++$key] = [$val->year, (int)$val->increment_salary, (int)$val->previous_salary];
        }
        

    	 

        return view('admin.index')->with('salary', AccountEmployeeSalary::max('amount'))
                                ->with('employee_count', User::where('usertype','employee')->count())
                                ->with('student_count', User::where('usertype','Student')->count())
                                ->with('other_cost', AccountOtherCost::sum('amount'))
                                ->with('emp_salary', AccountEmployeeSalary::sum('amount'))
                                ->with('classes',StudentClass::all()->count())
                                ->with('users',User::all()->count())
                                ->with('subjects',SchoolSubject::all()->count())
                                ->with('discount',DiscountStudent::all()->count())
                                ->with('student_fee', AccountStudentFee::sum('amount'))
                                ->with('increment', json_encode($res));
                                
                                
        
    }

    // public function showChart()
    // {

        
    //     $increment = EmployeeSalaryLog::select(
    //         DB::raw("year(effected_salary) as year"),
    //         DB::raw("SUM(previous_salary) as previous_salary"),
    //         DB::raw("SUM(increment_salary) as increment_salary")) 
    //     ->orderBy(DB::raw("YEAR(effected_salary)"))
    //     ->groupBy(DB::raw("YEAR(effected_salary)"))
    //     ->get(); 

    //     $res[] = ['Year', 'increment_salary', 'previous_salary'];

        
    //     foreach ($increment as $key => $val) {
    //         $res[++$key] = [$val->year, (int)$val->increment_salary, (int)$val->previous_salary];
    //     }

    //     return view('dashboard')
    //         ->with('increment', json_encode($res));

	// }
    


}
 