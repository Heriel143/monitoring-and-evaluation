<?php

namespace App\Http\Controllers;

use App\Models\IndicatorTarget;
use App\Models\Project;
use App\Models\Target;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TargetController extends Controller
{
    public function add()
    {
        $projects = Project::all();
        // $indicators = Indicator::all();
        return view('admin.target.addTarget', compact('projects'));
    }
    public function store(Request $request)
    {
        // $target = new Target();
        // $target->indicator_id = $request->indicator_id;
        // $target->name = $request->title;
        // $target->description = $request->description;
        // $target->unit = $request->unit;
        // $target->start_date = date('Y-m-d', strtotime($request->start_date));
        // $target->end_date = date('Y-m-d', strtotime($request->end_date));
        // $target->created_at = Carbon::now();

        // $notification = null;
        // if (($target->save())) {
        //     // dd($project_indicators);
        //     $indicator_target = new IndicatorTarget();
        //     $indicator_target->target_id = $target->id;
        //     $indicator_target->indicator_id = $request->indicator_id;
        //     $indicator_target->save();

        //     $notification = array(
        //         'message' => 'Inicator Inserted successfully',
        //         'alert-type' => 'success'
        //     );
        // } else {
        //     $notification = array(
        //         'message' => 'Failed to Insert Indicator.',
        //         'alert-type' => 'danger'
        //     );
        // }

        // return redirect()->back()->with($notification);

        Target::insert([
            'indicator_id' => $request->indicator_id,
            'name' => $request->title,
            'description' => $request->description,
            'unit' => $request->unit,
            'start_date' => date('Y-m-d', strtotime($request->start_date)),
            'end_date' => date('Y-m-d', strtotime($request->end_date)),
            'created_at' => Carbon::now(),

        ]);
        $notification = array(
            'message' => 'Target Inserted successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
