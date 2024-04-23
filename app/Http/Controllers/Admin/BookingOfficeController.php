<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\CompanyBookingOffice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class BookingOfficeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $booking_offices = CompanyBookingOffice::select('company_booking_offices.*','companies.company_name')->orderByDesc('id')->leftJoin('companies', 'company_booking_offices.company_id','companies.id')->where('company_booking_offices.company_id',auth()->user()->company_id)->get();
        return view('admin.booking-offices.index', compact('booking_offices'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->role=='ADMIN'){
            $companies = Company::all();
        }else{
            $companies = Company::where('id',auth()->user()->company_id)->get();
        }
        return view('admin.booking-offices.create',compact('companies'));
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
            'company_id' => 'required',
            'booking_office_name' => 'required',
            'booking_office_number' => 'required',
            'booking_office_address' => 'required',
        ]);

        $booking_office = new CompanyBookingOffice();
        $booking_office->company_id = $request->company_id;
        $booking_office->booking_office_name = $request->booking_office_name;
        $booking_office->booking_office_number = $request->booking_office_number;
        $booking_office->booking_office_address = $request->booking_office_address;
        $booking_office->created_by = auth()->user()->id;

        
        if ($booking_office->save()) {
            $notification = array(
                'message' => 'Booking Office Created Successfully!',
                'alert-type' => 'success'
            );
        } else {
            $notification = array(
                'message' => 'Something Went Wrong!',
                'alert-type' => 'error'
            );
        }
        return redirect()->route('booking-offices.index')->with($notification);
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
        $companies = Company::where('id', auth()->user()->company_id)->get();
        $booking_office = CompanyBookingOffice::select('company_booking_offices.*', 'companies.company_name')->orderByDesc('company_booking_offices.id')->leftJoin('companies', 'company_booking_offices.company_id', 'companies.id')->where('company_booking_offices.id',$id)->first();

        return view('admin.booking-offices.edit', compact('companies', 'booking_office'));
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
            'company_id' => 'required',
            'booking_office_name' => 'required',
            'booking_office_number' => 'required',
            'booking_office_address' => 'required',
        ]);

        $booking_office = CompanyBookingOffice::find($id);
        $booking_office->company_id = $request->company_id;
        $booking_office->booking_office_name = $request->booking_office_name;
        $booking_office->booking_office_number = $request->booking_office_number;
        $booking_office->booking_office_address = $request->booking_office_address;
        $booking_office->created_by = auth()->user()->id;


        if ($booking_office->save()) {
            $notification = array(
                'message' => 'Booking Office Updated Successfully!',
                'alert-type' => 'success'
            );
        } else {
            $notification = array(
                'message' => 'Something Went Wrong!',
                'alert-type' => 'error'
            );
        }
        return redirect()->route('booking-offices.index')->with($notification);
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
        $booking_office = CompanyBookingOffice::where('id', $id)
            ->firstOrFail();

        if ($booking_office->delete()) {
            $notification = array(
                'message' => 'Booking Office Deleted Successfully!',
                'alert-type' => 'success'
            );
        } else {
            $notification = array(
                'message' => 'Something Went Wrong!',
                'alert-type' => 'error'
            );
        }
        return redirect()->route('booking-offices.index')->with($notification);
    }
}
