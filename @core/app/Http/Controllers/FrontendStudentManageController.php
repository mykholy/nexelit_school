<?php

namespace App\Http\Controllers;

use App\EventAttendance;
use App\ProductOrder;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class FrontendStudentManageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function all_student()
    {
        $all_student = Student::all();
        return view('backend.frontend-student.all-student')->with(['all_student' => $all_student]);
    }

    public function student_update(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|string|max:191',
            'phone' => 'required|string|max:191',
            'class_room' => 'required|string|max:191',
        ],[
            'name.required' => __('Name is required'),
            'phone.required' => __('Phone is required'),
            'class_room.required' => __('Class room is required'),
        ]);

        Student::find($request->student_id)->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'class_room' => $request->class_room,
        ]);

        return redirect()->back()->with(['msg' => __('Student Profile Update Success..'), 'type' => 'success']);
    }

    public function new_student_delete(Request $request, $id)
    {
        Student::find($id)->delete();

        return redirect()->back()->with(['msg' => __('Student Profile Deleted..'), 'type' => 'danger']);
    }

    public function new_student()
    {
        return view('backend.frontend-student.add-new-student');
    }

    public function new_student_add(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:191',
            'phone' => 'required|string|max:191',
            'class_room' => 'required|string|max:191',
        ]);

        Student::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'class_room' => $request->class_room,
        ]);

        return redirect()->back()->with(['msg' => __('New Student Created..'), 'type' => 'success']);
    }

    public function bulk_action(Request $request){
        Student::whereIn('id',$request->ids)->delete();
        return response()->json(['status' => 'ok']);
    }


}
