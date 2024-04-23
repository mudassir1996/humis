<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Accomodation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AzziahAccomodationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accomodations = Accomodation::where('accomodation_type','AZIZIYAH')->get();
        return view('admin.aziziah-accomodation.index', compact('accomodations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.aziziah-accomodation.create');

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
            'hotel_name' => 'required',
            'sharing_room_cost' => 'required',
            'triple_room_cost' => 'required',
            'quad_double_cost' => 'required',
        ]);

        $accomodation = new Accomodation();
        $accomodation->hotel_name = $request->hotel_name;
        $accomodation->accomodation_type = "AZIZIYAH";
        $accomodation->sharing_room_cost = $request->sharing_room_cost;
        $accomodation->triple_room_cost = $request->triple_room_cost;
        $accomodation->quad_double_cost = $request->quad_double_cost;

        $accomodation->created_by = auth()->user()->id;


        if ($accomodation->save()) {
            $notification = array(
                'message' => 'Accomodation Created Successfully!',
                'alert-type' => 'success'
            );
        } else {
            $notification = array(
                'message' => 'Something Went Wrong!',
                'alert-type' => 'error'
            );
        }
        return redirect()->route('aziziah-accomodations.index')->with($notification);
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
        $accomodation = Accomodation::find($id);
        return view('admin.aziziah-accomodation.edit',compact('accomodation'));

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
            'hotel_name' => 'required',
            'sharing_room_cost' => 'required',
            'triple_room_cost' => 'required',
            'quad_double_cost' => 'required',
        ]);

        $accomodation = Accomodation::find($id);
        $accomodation->hotel_name = $request->hotel_name;
        $accomodation->sharing_room_cost = $request->sharing_room_cost;
        $accomodation->triple_room_cost = $request->triple_room_cost;
        $accomodation->quad_double_cost = $request->quad_double_cost;

        if ($accomodation->save()) {
            $notification = array(
                'message' => 'Accomodation Updated Successfully!',
                'alert-type' => 'success'
            );
        } else {
            $notification = array(
                'message' => 'Something Went Wrong!',
                'alert-type' => 'error'
            );
        }
        return redirect()->route('aziziah-accomodations.index')->with($notification);
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
        $accomodation = Accomodation::where('id', $id)
            ->firstOrFail();

        if ($accomodation->delete()) {
            $notification = array(
                'message' => 'Accomodation Deleted Successfully!',
                'alert-type' => 'success'
            );
        } else {
            $notification = array(
                'message' => 'Something Went Wrong!',
                'alert-type' => 'error'
            );
        }
        return redirect()->route('aziziah-accomodations.index')->with($notification);
    }
}
