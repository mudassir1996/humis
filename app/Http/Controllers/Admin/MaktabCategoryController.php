<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MaktabCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class MaktabCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $maktab_categories = MaktabCategory::all();
        return view('admin.maktab-categories.index', compact('maktab_categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.maktab-categories.create');

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
            'maktab_name' => 'required',
            'maktab_cost' => 'required',
            'profit' => 'required',
            'ksa_expense' => 'required',
            'pk_expense' => 'required',
            'special_transport' => 'required',
            'agent_commission' => 'required',
        ]);

        $maktab_category = new MaktabCategory();
        $maktab_category->maktab_name = $request->maktab_name;
        $maktab_category->maktab_cost = $request->maktab_cost;
        $maktab_category->profit = $request->profit;
        $maktab_category->ksa_expense = $request->ksa_expense;
        $maktab_category->pk_expense = $request->pk_expense;
        $maktab_category->special_transport = $request->special_transport;
        $maktab_category->agent_commission = $request->agent_commission;

        $maktab_category->created_by = auth()->user()->id;


        if ($maktab_category->save()) {
            $notification = array(
                'message' => 'Maktab Created Successfully!',
                'alert-type' => 'success'
            );
        } else {
            $notification = array(
                'message' => 'Something Went Wrong!',
                'alert-type' => 'error'
            );
        }
        return redirect()->route('maktab-categories.index')->with($notification);
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
        $maktab_category = MaktabCategory::find($id);

        return view('admin.maktab-categories.edit',compact('maktab_category'));

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
            'maktab_name' => 'required',
            'maktab_cost' => 'required',
            'profit' => 'required',
            'ksa_expense' => 'required',
            'pk_expense' => 'required',
            'special_transport' => 'required',
            'agent_commission' => 'required',
        ]);

        $maktab_category = MaktabCategory::find($id);
        $maktab_category->maktab_name = $request->maktab_name;
        $maktab_category->maktab_cost = $request->maktab_cost;
        $maktab_category->profit = $request->profit;
        $maktab_category->ksa_expense = $request->ksa_expense;
        $maktab_category->pk_expense = $request->pk_expense;
        $maktab_category->special_transport = $request->special_transport;
        $maktab_category->agent_commission = $request->agent_commission;

        if ($maktab_category->save()) {
            $notification = array(
                'message' => 'Maktab Updated Successfully!',
                'alert-type' => 'success'
            );
        } else {
            $notification = array(
                'message' => 'Something Went Wrong!',
                'alert-type' => 'error'
            );
        }
        return redirect()->route('maktab-categories.index')->with($notification);
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
        $maktab_category = MaktabCategory::where('id', $id)
            ->firstOrFail();

        if ($maktab_category->delete()) {
            $notification = array(
                'message' => 'Maktab Deleted Successfully!',
                'alert-type' => 'success'
            );
        } else {
            $notification = array(
                'message' => 'Something Went Wrong!',
                'alert-type' => 'error'
            );
        }
        return redirect()->route('maktab-categories.index')->with($notification);
    }

    public function getSumMaktabApplications(Request $request)
    {
       $maktabBookings = DB::table('maktab_categories AS m')
        ->select(DB::raw('SUM(b.num_of_hujjaj) AS num_of_hujjaj'))
        ->join('packages AS p', 'm.id', '=', 'p.maktab_category_id')
        ->join('bookings AS b', 'p.id', '=', 'b.package_id')
        ->where('b.package_type','STANDARD')
        ->where('p.maktab_category_id', $request->id)
        ->where('b.company_id', auth()->user()->company_id)
        ->groupBy('m.id')
        ->first();


        $maktabCustomBookings = DB::table('maktab_categories AS m')
        ->select(DB::raw('SUM(b.num_of_hujjaj) AS num_of_hujjaj'))
        ->join('custom_packages AS p', 'm.id', '=', 'p.maktab_category_id')
        ->join('bookings AS b', 'p.id', '=', 'b.package_id')
        ->where('b.package_type', 'CUSTOM')
        ->where('p.maktab_category_id', $request->id)
        ->where('b.company_id', auth()->user()->company_id)
        ->groupBy('m.id')
        ->first();

        // return response()->json(!empty($maktabBookings));

        $final_number = array(
            "num_of_hujjaj"=> (!empty($maktabBookings)? $maktabBookings->num_of_hujjaj:0) +  (!empty($maktabCustomBookings) ? $maktabCustomBookings->num_of_hujjaj : 0)
        );


        return response()->json($final_number);
    }
    
}
