<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\StudentYear;
use Illuminate\Http\Request;

class StudentYearController extends Controller
{
    public function ViewYear() {
        $data['allData'] = StudentYear::all();
        return view('backend.setup.year.view_year',$data); //it is similar to return view()->with($data)
    }

    public function StudentYearAdd() {
        return view('backend.setup.year.add_year');
    }

    public function StudentYearStore(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|unique:student_years,name'//which our student_years table name should be unique no duplicate entry
        ]);

        $data = new StudentYear();
        $data->name = $request->name; // request the field name which is "name"
        $data->save(); 

        $notification = array(
            'message' => 'Student Year Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('student.year.view')->with($notification);
    }

    public function StudentYearEdit($id) {

        $editData = StudentYear::find($id);

        return view('backend.setup.year.edit_year',compact('editData'));

    }

    public function StudentYearUpdate(Request $request,$id) {

        $data = StudentYear::find($id);

        $validatedData = $request->validate([
            'name' => 'required|unique:student_years,name,'.$data->id
        ]);

       
        $data->name = $request->name; // request the field name which is "name"
        $data->save(); 

        $notification = array(
            'message' => 'Student Year Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('student.year.view')->with($notification);

    }

    public function StudentYearDelete($id) {

        $user = StudentYear::find($id);
        $user->delete();

        $notification = array(
            'message' => 'Student Year Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('student.year.view')->with($notification);
    }
}
