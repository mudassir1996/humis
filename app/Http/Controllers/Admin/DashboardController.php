<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.dashboard');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function edit_profile(Request $request)
    {
        if ($request->isMethod('get')) {
            return view('admin.edit-profile');
        }else{
            $name=$request->name;
            $password=$request->password;
            $user = User::find(Auth::user()->id);

            $user->name = $name;
            if ($password != '') {
                $user->password = bcrypt($password);
            }
            if($user->role == 'COMPANY'){
                $company = Company::find($user->company_id);
                $company->company_name = $name;
                $company->save();
            }

            if ($user->save()) {
                $notification = array(
                    'message' => 'Profile Updated Successfully!',
                    'alert-type' => 'success'
                );
            } else {
                $notification = array(
                    'message' => 'Something Went Wrong!',
                    'alert-type' => 'error'
                );
            }
            return redirect()->route('edit-profile')->with($notification);
        }
        
    }
}
