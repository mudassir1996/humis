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
        $companies = Company::orderByDesc('id')->get();
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

            $notification = array(
                'message' => 'Company Created Successfully!',
                'alert-type' => 'success'
            );
        } else {
            $notification = array(
                'message' => 'Something Went Wrong!',
                'alert-type' => 'error'
            );
        }
        return redirect()->route('companies.index')->with($notification);

        
        
    }

    public function edit($id)
    {
        $company = Company::select('companies.*','users.email')->where('companies.id',$id)->leftJoin('users', 'users.company_id','companies.id')->first();
        return view('admin.companies.edit', compact('company'));
    }

    public function update(Request $request, Company $company)
    {
        Validator::make($request->all(), [
            'company_name' => 'required',
            'company_contact' => 'required',
            'company_status' => 'required',
        ]);

        $company->company_name = $request->company_name;
        $company->company_contact = $request->company_contact;
        $company->company_status = $request->company_status;
        
        if ($company->save()) {
            $notification = array(
                'message' => 'Company Updated Successfully!',
                'alert-type' => 'success'
            );
        }else{
            $notification = array(
                'message' => 'Something Went Wrong!',
                'alert-type' => 'error'
            );
        }
        return redirect()->route('companies.index')->with($notification);
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
        $company = Company::where('companies.id', $id)
            ->firstOrFail();

        if ($company->delete()) {
            $notification = array(
                'message' => 'Company Updated Successfully!',
                'alert-type' => 'success'
            );
        } else {
            $notification = array(
                'message' => 'Something Went Wrong!',
                'alert-type' => 'error'
            );
        }
        return redirect()->route('companies.index')->with($notification);
    }

    public function getBookingOffices($id)
    {
        $booking_offices = CompanyBookingOffice::where('company_id', $id)->pluck('booking_office_name', 'id');
        return response()->json($booking_offices);
    }
}
