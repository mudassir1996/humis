<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\CompanyBookingOffice;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index(){
        $companies = Company::where('company_status','ACTIVE')->get();
        return view('admin.companies.index',compact('companies'));
    }
    public function getBookingOffices($id)
    {
        $booking_offices = CompanyBookingOffice::where('company_id', $id)->pluck('booking_office_name', 'id');
        return response()->json($booking_offices);
    }
}
