<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectIndicator;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class ProjectController extends Controller
{
    //
    public function new()
    {
        return view('admin.project.newProject');
    }

    public function edit($id)
    {
        $project = Project::findOrFail($id);
        return view('admin.project.editProject', compact('project'));
    }
    public function update(Request $request)
    {
        $project = Project::findOrFail($request->id);
        $project->title = $request->title;
        $project->description = $request->description;
        $project->location = $request->location;
        $project->budget = $request->budget;
        $project->implementing_mechanism = $request->implementing_mechanism;
        $project->start_date = date('Y-m-d', strtotime($request->start_date));
        $project->end_date = date('Y-m-d', strtotime($request->end_date));
        $project->save();

        $notification = array(
            'message' => 'Project Updated successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('project.all')->with($notification);
    }

    public function destroy($id)
    {
        $isThere = ProjectIndicator::where('project_id', $id)->get();
        // dd($isThere);
        if (count($isThere) > 0) {
            $notification = array(
                'message' => 'First delete all indicators',
                'alert-type' => 'warning'
            );
            return redirect()->back()->with($notification);
        } else {
            Project::findOrFail($id)->delete();
            $notification = array(
                'message' => 'Project deleted Successfully',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }
    }

    public function allProjects()
    {
        $projects = Project::all();
        return view('admin.project.allProjects', compact('projects'));
    }

    public function add(Request $request)
    {
        $input = $request->all();
        Project::create($input);

        $notification = array(
            'message' => 'Project Inserted successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('project.all')->with($notification);
    }
}
