<?php

namespace App\Http\Controllers;


use App\Stage;
use Illuminate\Http\Request;

class SchoolStageManageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function all_stage()
    {
        $all_stage = Stage::all();
        return view('backend.school.stage.all-stage')->with(['all_stage' => $all_stage]);
    }

    public function stage_update(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|string|max:191',
            'description' => 'required|string|max:191',
            'status' => 'required|in:publish,draft',
            'admin_id' => 'required',
        ],[
            'name.required' => __('Name is required'),
            'description.required' => __('Description is required'),
            'status.required' => __('Status is required'),
            'admin_id.required' => __('Admin is required'),
        ]);

        Stage::find($request->stage_id)->update($request->all('name','description','admin_id','status'));

        return redirect()->back()->with(['msg' => __('Stage Update Success..'), 'type' => 'success']);
    }

    public function new_stage_delete(Request $request, $id)
    {
        Stage::find($id)->delete();

        return redirect()->back()->with(['msg' => __('Stage Deleted..'), 'type' => 'danger']);
    }

    public function new_stage()
    {
        return view('backend.school.stage.add-new-stage');
    }

    public function new_stage_add(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:191',
            'description' => 'required|string|max:191',
            'status' => 'required|in:publish,draft',
            'admin_id' => 'required',
        ],[
            'name.required' => __('Name is required'),
            'description.required' => __('Description is required'),
            'status.required' => __('Status is required'),
            'admin_id.required' => __('Admin is required'),
        ]);

        Stage::create($request->all());

        return redirect()->back()->with(['msg' => __('Stage Created..'), 'type' => 'success']);
    }

    public function bulk_action(Request $request){
        Stage::whereIn('id',$request->ids)->delete();
        return response()->json(['status' => 'ok']);
    }


}
