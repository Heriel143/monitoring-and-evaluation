<?php

namespace App\Http\Controllers;

use App\Models\Disaggretion\Disaggreation;
use App\Models\Project;
use App\Models\SupportingIndicator;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SupportingIndicatorController extends Controller
{
    public function addSub()
    {
        $projects = Project::all();
        $disagretions = Disaggreation::all();

        // $indicators = Indicator::all();
        return view('admin.indicator.addSubIndicator', compact('projects', 'disagretions'));
    }
    public function storeSup(Request $request)
    {
        // $projects = Project::all();
        // $indicators = Indicator::all();
        SupportingIndicator::insert([
            'indicator_id' => $request->indicator_id,
            'title' => $request->disagretion,
            // 'description' => $request->description,
            // 'unit' => $request->unit,
            'created_at' => Carbon::now(),

        ]);
        $notification = array(
            'message' => 'Supporting Inicator Inserted successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
