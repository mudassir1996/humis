<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\CompanyBookingOffice;
use App\Models\User;
use Illuminate\Http\Request;
use Validator;


class CompanyController extends Controller
{
    public function index(){
        $companies = Company::where('company_status','ACTIVE')->orderByDesc('id')->get();
        return view('admin.companies.index',compact('companies'));
    }

    public function create(){
        return view('admin.companies.create');
    }

    public function store(Request $request){
        Validator::make($request->all(), [
            'company_name' => 'required',
            'company_contact' => 'required',
            'login_email' => 'required',
            'login_password' => 'required',
        ]);

        $company = new Company();
        $company->company_name = $request->company_name;
        $company->company_contact = $request->company_contact;
        $company->company_status = 'ACTIVE';
        $company->created_by = auth()->user()->id;
        $company->company_name = $request->company_name;

        if($company->save()){
            User::create([
                'name' => $company->company_name,
                'email' => $request->login_email,
                'password' => bcrypt($request->login_password),
                'role' => 'COMPANY',
                'company_id' => $company->id,
            ]);
            return redirect()->route('companies.index');
        }

        
        
    }

    public function getBookingOffices($id)
    {
        $booking_offices = CompanyBookingOffice::where('company_id', $id)->pluck('booking_office_name', 'id');
        return response()->json($booking_offices);
    }
}
