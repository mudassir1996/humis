<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OtherCost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OtherCostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $other_cost = OtherCost::where('cost_key','qurbani_cost')->first();
        return view('admin.other-costs.edit', compact('other_cost'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
            'cost' => 'required',

        ]);

        $other_cost = OtherCost::find($id);
        $other_cost->cost = $request->cost;
       


        if ($other_cost->save()) {
            $notification = array(
                'message' => 'Cost Updated Successfully!',
                'alert-type' => 'success'
            );
        } else {
            $notification = array(
                'message' => 'Something Went Wrong!',
                'alert-type' => 'error'
            );
        }
        return redirect()->route('other-costs.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
