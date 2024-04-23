<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MaktabCategory;
use App\Models\SpecialTransport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SpecialTransportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $special_transports = SpecialTransport::select('special_transports.*', 'maktab_categories.maktab_name')->orderByDesc('special_transports.id')->leftJoin('maktab_categories', 'special_transports.maktab_category_id', 'maktab_categories.id')->get();
        return view('admin.special-transports.index', compact('special_transports'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $maktab_categories = MaktabCategory::all();
        return view('admin.special-transports.create', compact('maktab_categories'));
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
            'maktab_category_id' => 'required',
            'transport_cost' => 'required',
        ]);

        $special_transport = new SpecialTransport();
        $special_transport->maktab_category_id = $request->maktab_category_id;
        $special_transport->transport_cost = $request->transport_cost;
        $special_transport->created_by = Auth::user()->id;



        if ($special_transport->save()) {
            $notification = array(
                'message' => 'Special Transport Cost Added Successfully!',
                'alert-type' => 'success'
            );
        } else {
            $notification = array(
                'message' => 'Something Went Wrong!',
                'alert-type' => 'error'
            );
        }
        return redirect()->route('special-transports.index')->with($notification);
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
        $maktab_categories = MaktabCategory::all();
        $special_transport = SpecialTransport::select('special_transports.*', 'maktab_categories.maktab_name')->orderByDesc('special_transports.id')->leftJoin('maktab_categories', 'special_transports.maktab_category_id', 'maktab_categories.id')->where('special_transports.id',$id)->first();
        return view('admin.special-transports.edit', compact('maktab_categories', 'special_transport'));
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
            'maktab_category_id' => 'required',
            'transport_cost' => 'required',
        ]);

        $special_transport = SpecialTransport::find($id);
        $special_transport->maktab_category_id = $request->maktab_category_id;
        $special_transport->transport_cost = $request->transport_cost;
        


        if ($special_transport->save()) {
            $notification = array(
                'message' => 'Special Transport Cost Updated Successfully!',
                'alert-type' => 'success'
            );
        } else {
            $notification = array(
                'message' => 'Something Went Wrong!',
                'alert-type' => 'error'
            );
        }
        return redirect()->route('special-transports.index')->with($notification);
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
        $special_transport = SpecialTransport::where('id', $id)
            ->firstOrFail();

        if ($special_transport->delete()) {
            $notification = array(
                'message' => 'Special Transport Deleted Successfully!',
                'alert-type' => 'success'
            );
        } else {
            $notification = array(
                'message' => 'Something Went Wrong!',
                'alert-type' => 'error'
            );
        }
        return redirect()->route('special-transports.index')->with($notification);
    }
}
