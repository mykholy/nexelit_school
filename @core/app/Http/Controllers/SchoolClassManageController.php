<?php

namespace App\Http\Controllers;


use App\SchoolClass;
use Illuminate\Http\Request;

class SchoolClassManageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function all_class()
    {
        $all_class = SchoolClass::all();
        return view('backend.school.class.all-class')->with(['all_class' => $all_class]);
    }

    public function class_update(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|string|max:191',
            'description' => 'required|string|max:191',
            'status' => 'required|in:publish,draft',
            'stage_id' => 'required',
        ],[
            'name.required' => __('Name is required'),
            'description.required' => __('Description is required'),
            'status.required' => __('Status is required'),
            'stage_id.required' => __('Stage is required'),
        ]);

        SchoolClass::find($request->class_id)->update($request->all('name','description','stage_id','status'));

        return redirect()->back()->with(['msg' => __('Class Update Success..'), 'type' => 'success']);
    }

    public function new_class_delete(Request $request, $id)
    {
        SchoolClass::find($id)->delete();

        return redirect()->back()->with(['msg' => __('Class Deleted..'), 'type' => 'danger']);
    }

    public function new_class()
    {
        return view('backend.school.class.add-new-class');
    }

    public function new_class_add(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:191',
            'description' => 'required|string|max:191',
            'status' => 'required|in:publish,draft',
            'stage_id' => 'required',
        ],[
            'name.required' => __('Name is required'),
            'description.required' => __('Description is required'),
            'status.required' => __('Status is required'),
            'stage_id.required' => __('Stage is required'),
        ]);

        SchoolClass::create($request->all());

        return redirect()->back()->with(['msg' => __('Class Created..'), 'type' => 'success']);
    }

    public function bulk_action(Request $request){
        SchoolClass::whereIn('id',$request->ids)->delete();
        return response()->json(['status' => 'ok']);
    }


}
