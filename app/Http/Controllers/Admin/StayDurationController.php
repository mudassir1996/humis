<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StayDuration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StayDurationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stay_durations = StayDuration::all();
        return view('admin.stay-durations.index', compact('stay_durations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.stay-durations.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'duration_of_stay' => 'required',

        ]);

        $stay_duration = new StayDuration();
        $stay_duration->duration_of_stay = $request->duration_of_stay;

        $stay_duration->created_by = auth()->user()->id;


        if ($stay_duration->save()) {
            $notification = array(
                'message' => 'Stay Duration Added Successfully!',
                'alert-type' => 'success'
            );
        } else {
            $notification = array(
                'message' => 'Something Went Wrong!',
                'alert-type' => 'error'
            );
        }
        return redirect()->route('stay-durations.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $stay_duration = StayDuration::find($id);
        return view('admin.stay-durations.edit', compact('stay_duration'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Validator::make($request->all(), [
            'duration_of_stay' => 'required',

        ]);

        $stay_duration = StayDuration::find($id);
        $stay_duration->duration_of_stay = $request->duration_of_stay;

        if ($stay_duration->save()) {
            $notification = array(
                'message' => 'Stay Duration Updated Successfully!',
                'alert-type' => 'success'
            );
        } else {
            $notification = array(
                'message' => 'Something Went Wrong!',
                'alert-type' => 'error'
            );
        }
        return redirect()->route('stay-durations.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //selecting the specific id row for deleting from db
        $stay_duration = StayDuration::where('id', $id)
            ->firstOrFail();

        if ($stay_duration->delete()) {
            $notification = array(
                'message' => 'Stay Duration Deleted Successfully!',
                'alert-type' => 'success'
            );
        } else {
            $notification = array(
                'message' => 'Something Went Wrong!',
                'alert-type' => 'error'
            );
        }
        return redirect()->route('stay-durations.index')->with($notification);
    }
}
