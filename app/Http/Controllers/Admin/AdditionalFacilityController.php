<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdditionalFacility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdditionalFacilityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $additional_facilities = AdditionalFacility::all();
        return view('admin.additional-facilities.index', compact('additional_facilities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.additional-facilities.create');

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
            'facility_title' => 'required',
            'facility_cost' => 'required',

        ]);

        $additional_facility = new AdditionalFacility();
        $additional_facility->facility_title = $request->facility_title;
        $additional_facility->facility_cost = $request->facility_cost;
        $additional_facility->created_by = auth()->user()->id;


        if ($additional_facility->save()) {
            $notification = array(
                'message' => 'Additional Facility Added Successfully!',
                'alert-type' => 'success'
            );
        } else {
            $notification = array(
                'message' => 'Something Went Wrong!',
                'alert-type' => 'error'
            );
        }
        return redirect()->route('additional-facilities.index')->with($notification);
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
        $additional_facility = AdditionalFacility::find($id);
        return view('admin.additional-facilities.edit', compact('additional_facility'));
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
            'facility_title' => 'required',
            'facility_cost' => 'required',

        ]);

        $additional_facility = AdditionalFacility::find($id);
        $additional_facility->facility_title = $request->facility_title;
        $additional_facility->facility_cost = $request->facility_cost;


        if ($additional_facility->save()) {
            $notification = array(
                'message' => 'Additional Facility Updated Successfully!',
                'alert-type' => 'success'
            );
        } else {
            $notification = array(
                'message' => 'Something Went Wrong!',
                'alert-type' => 'error'
            );
        }
        return redirect()->route('additional-facilities.index')->with($notification);
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
        $additional_facility = AdditionalFacility::where('id', $id)
            ->firstOrFail();

        if ($additional_facility->delete()) {
            $notification = array(
                'message' => 'Additional Facility Deleted Successfully!',
                'alert-type' => 'success'
            );
        } else {
            $notification = array(
                'message' => 'Something Went Wrong!',
                'alert-type' => 'error'
            );
        }
        return redirect()->route('additional-facilities.index')->with($notification);
    }
}
