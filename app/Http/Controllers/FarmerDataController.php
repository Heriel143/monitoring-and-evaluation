<?php

namespace App\Http\Controllers;

use App\Models\FarmerData;
use App\Models\Indicator;
use App\Models\IndicatorData;
use App\Models\SupportingIndicator;
use App\Models\Target;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FarmerDataController extends Controller
{
    public function add()
    {
        // $date = new  DateTime();
        // // $date = Carbon::now()->toDateTimeString();
        // // $date->format('Y-m-d');
        // $date2 = $date->format('Y-m-d');
        // // dd($date2);
        // $target = Target::where('end_date', '>=', $date2)->get();
        // // dd($target);

        // $supports = SupportingIndicator::where('indicator_id', $target[0]->indicator_id)->get();
        // dd($supports);
        $indicators = Indicator::all();
        return view('admin.farmer.addData', compact('indicators'));
    }
    public function store(Request $request)
    {
        // $two = IndicatorData::all();
        // dd($two);
        // implode(null, $request->actual) == null;
        // dd(is_null($request->actual[0]));
        global $is_target;
        global $is_actual;
        for ($i = 0; $i < count($request->actual); $i++) {
            if (is_null($request->target[$i])) {
                $is_target = 1;
            }
            if (is_null($request->actual[$i])) {
                $is_actual = 1;
            }
        }
        if ($is_actual) {

            for ($i = 0; $i < count($request->target); $i++) {
                IndicatorData::insert([
                    'indicator_id' => $request->indicator_id,
                    'disaggretion_id' => $request->id[$i],
                    'target' => $request->target[$i],
                    // 'indicator_id'=>$request->indicator_id,
                ]);
                // $data1 = new IndicatorData();
                // $data1->indicator_id = $request->indicator_id;
                // $data1->disaggretion_id = $request->id[$i];
                // $data1->target = $request->target[$i];
                // // $data1->actual = $request->actual[$i];
                // $data1->save();
            }
        } else {
            for ($i = 0; $i < count($request->actual); $i++) {
                // $data1 = new IndicatorData();
                $data1 = IndicatorData::where('indicator_id', $request->indicator_id)->where('disaggretion_id', $request->id[$i])->update(['actual' => $request->actual[$i]]);

                // $data1->indicator_id = $request->indicator_id;
                // $data1->disaggretion_id = $request->id[$i];
                // $data1->target = $request->target[$i];
                // $data1->actual = $request->actual[$i];
                // $data1->save();
            }
        }

        // if ($request->target == null) {
        //     $notification = array(
        //         'message' => 'Sorry you do not fill any field',
        //         'alert-type' => 'error'
        //     );

        //     return redirect()->back()->with($notification);
        // } else {
        //     $count = count($request->name);
        //     for ($i = 0; $i < $count; $i++) {
        //         $farmer = new FarmerData();
        //         $farmer->supporting_indicators_id = $request->support_id[$i];
        //         $farmer->achieved = $request->name[$i];

        //         $farmer->user_id = Auth::user()->id;
        //         $farmer->created_at = Carbon::now();
        //         // $farmer->status = '0';
        //         $farmer->save();
        //     }
        // }

        $notification = array(
            'message' => 'Data saved successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
