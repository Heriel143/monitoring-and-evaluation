<?php

namespace App\Http\Controllers;

use App\Models\Disaggretion\AgeCategory;
use App\Models\Disaggretion\Sex;
use App\Models\Disaggretion\TypeOfIndividual;
use App\Models\Indicator;
use App\Models\IndicatorData;
use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Intervention\Image\Facades\Image;

class UserController extends Controller
{
    public function allEmployees()
    {
        $employees = User::latest()->get();
        return view('admin.employee.allEmployees', compact('employees'));
    }

    public function addEmployee()
    {
        $roles = Role::all();
        return view('admin.employee.addEmployee', compact('roles'));
    }

    public function storeEmployee(Request $request)
    {

        $image = $request->file('image');
        $image_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(200, 200)->save('upload/employee/' . $image_name);
        $save_url = 'upload/employee/' . $image_name;

        User::insert([
            'name' => $request->name,
            'email' => $request->email,
            'profile_image' => $save_url,
            'role_id' => $request->employee_role,
            'username' => strtolower(trim($request->name)),
            'password' => Hash::make('12345678'),
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Employee Added Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.employees')->with($notification);
        // dd(Hash::make('12345678'));
    }

    public function editEmployee($id)
    {
        $employee = User::findOrFail($id);
        // dd($employee);
        $roles = Role::all();
        return view('admin.employee.editEmployee', compact('employee', 'roles'));
    }
    public function direct()
    {
        $project = [];
        $indicators = Indicator::all()->take(10);
        foreach ($indicators as $key2 => $indicator) {
            // $disaggretion=
            $indicatordata = IndicatorData::where('indicator_id', $indicator->id)->get();
            foreach ($indicatordata as $key => $data) {
                $indicators[$key2]['target'] += $data->target;
                $indicators[$key2]['actual'] += $data->actual;
            }
            $project[$key2] = $indicators[$key2]['actual'] == 0 ? 0 : $indicators[$key2]['actual'] / $indicators[$key2]['target'];
        }

        $projectprog = (array_sum($project) / count($project)) * 100;
        // dd($employee);
        // $roles = Role::all();
        return view('admin.index', compact('indicators', 'projectprog'));
    }
    public function deleteEmployee($id)
    {
        $customer = User::findOrFail($id);
        $img = $customer->profile_image;
        unlink($img);
        User::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Employee deleted successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function updateEmployee(Request $request)
    {
        $employee = User::findOrFail($request->id);
        $employee->name = $request->name;
        // $employee->mobile_no = $request->mobile_no;
        $employee->email = $request->email;
        $employee->role_id = $request->employee_role;
        // $employee->updated_by = Auth::user()->id;
        $employee->updated_at = Carbon::now();

        if ($request->file('image')) {
            $image = $request->file('image');
            $image_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(200, 200)->save('upload/employee/' . $image_name);
            $save_url = 'upload/employee/' . $image_name;
            $employee->profile_image = $save_url;
        }

        $employee->save();

        $notification = array(
            'message' => 'Employee Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.employees')->with($notification);
    }
}
