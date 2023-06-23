<?php

namespace App\Http\Controllers;

use App\Models\Disaggretion\Disaggreation;
use App\Models\Indicator;
use App\Models\IndicatorData;
use App\Models\Project;
use App\Models\ProjectIndicator;
use App\Models\SupportingIndicator;
use Carbon\Carbon;
use Illuminate\Http\Request;

class IndicatorController extends Controller
{
    public function add()
    {
        $projects = Project::all();
        $indicators = Indicator::all();
        $disagretions = Disaggreation::all();
        return view('admin.indicator.addIndicator', compact('projects', 'disagretions', 'indicators'));
    }
    public function edit($id)
    {
        // $projects = Project::all();
        $indicator = Indicator::findOrFail($id);
        $disagretions = Disaggreation::all();
        return view('admin.indicator.editIndicator', compact('disagretions', 'indicator'));
    }

    public function update(Request $request)
    {
        // $projects = Project::all();
        $indicator = Indicator::findOrFail($request->id);
        $indicator->indicator_number = $request->indicator_number;
        $indicator->title = $request->title;
        $indicator->disagretion = $request->disagretion;
        $indicator->unit = $request->unit;
        $indicator->save();


        // $disagretions = Disaggreation::all();
        $notification = array(
            'message' => 'Inicator updated successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('indicator.add')->with($notification);
    }

    public function destroy($id)
    {
        // $projects = Project::all();
        IndicatorData::where('indicator_id', $id)->delete();
        ProjectIndicator::where('indicator_id', $id)->delete();
        Indicator::where('id', $id)->delete();
        // $indicators = Indicator::all();
        // $disagretions = Disaggreation::all();

        $notification = array(
            'message' => 'Inicator deleted successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
    public function getIndicator(Request $request)
    {
        // $indicators = Indicator::findOrFail($request->project_id);
        $project_indicators = ProjectIndicator::where('project_id', $request->project_id)->get();
        // dd($project_indicators);
        // $project_indicators->indicator_id;
        $indicator_ids = [];
        foreach ($project_indicators as $key => $value) {
            $indicator_ids[$key] = $value->indicator_id;
        }

        $indicators = Indicator::whereIn('id', $indicator_ids)->get();
        return response()->json($indicators);
    }
    public function store(Request $request)
    {
        // $projects = Project::all();
        // Indicator::insert([
        //     'project_id' => $request->project_id,
        //     'name' => $request->title,
        //     'description' => $request->description,
        //     'unit' => $request->unit,
        //     'created_at' => Carbon::now(),
        // ]);
        $indicator = new Indicator();
        $indicator->title = $request->title;
        $indicator->indicator_number = $request->indicator_number;
        $indicator->disagretion = $request->disagretion;
        // $indicator->indicator_number = $request->indicator_number;
        $indicator->unit = $request->unit;
        $indicator->created_at = Carbon::now();



        $notification = null;
        if (($indicator->save())) {
            // dd($indicator->id);
            $project_indicators = new ProjectIndicator();
            $project_indicators->project_id = $request->project_id;
            $project_indicators->indicator_id = $indicator->id;
            $project_indicators->save();

            // SupportingIndicator::insert([
            //     'indicator_id' => $indicator->id,
            //     'title' => $request->disagretion,
            //     // 'description' => $request->description,
            //     // 'unit' => $request->unit,
            //     'created_at' => Carbon::now(),

            // ]);
            $notification = array(
                'message' => 'Inicator Inserted successfully',
                'alert-type' => 'success'
            );
        } else {
            $notification = array(
                'message' => 'Failed to Insert Indicator.',
                'alert-type' => 'danger'
            );
        }

        $indicators = Indicator::all();




        return redirect()->back()->with($notification, $indicators);
    }
}
