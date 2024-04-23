<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FoodType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $food_types = FoodType::all();
        return view('admin.food-types.index', compact('food_types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.food-types.create');
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
            'food_type_name' => 'required',
            'food_type_cost' => 'required',
           
        ]);

        $food_type = new FoodType();
        $food_type->food_type_name = $request->food_type_name;
        $food_type->food_type_cost = $request->food_type_cost;
        $food_type->created_by = auth()->user()->id;


        if ($food_type->save()) {
            $notification = array(
                'message' => 'Food Type Created Successfully!',
                'alert-type' => 'success'
            );
        } else {
            $notification = array(
                'message' => 'Something Went Wrong!',
                'alert-type' => 'error'
            );
        }
        return redirect()->route('food-types.index')->with($notification);
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
        $food_type = FoodType::find($id);

        return view('admin.food-types.edit', compact('food_type'));

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
            'food_type_name' => 'required',
            'food_type_cost' => 'required',

        ]);

        $food_type = FoodType::find($id);
        $food_type->food_type_name = $request->food_type_name;
        $food_type->food_type_cost = $request->food_type_cost;


        if ($food_type->save()) {
            $notification = array(
                'message' => 'Food Type Updated Successfully!',
                'alert-type' => 'success'
            );
        } else {
            $notification = array(
                'message' => 'Something Went Wrong!',
                'alert-type' => 'error'
            );
        }
        return redirect()->route('food-types.index')->with($notification);
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
        $food_type = FoodType::where('id', $id)
            ->firstOrFail();

        if ($food_type->delete()) {
            $notification = array(
                'message' => 'Food Type Deleted Successfully!',
                'alert-type' => 'success'
            );
        } else {
            $notification = array(
                'message' => 'Something Went Wrong!',
                'alert-type' => 'error'
            );
        }
        return redirect()->route('food-types.index')->with($notification);
    }
}
