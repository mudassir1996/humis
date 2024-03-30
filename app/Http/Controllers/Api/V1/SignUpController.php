<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\CommonController;
use Validator;
use App\Models\User;
use Illuminate\Support\Facades\Hash;




class SignUpController extends Controller
{
    public function __construct()
    {
        $this->common = new CommonController();
    }
    public function register(Request $request)
    {

        $validation = Validator::make($request->all(), [
            'email' => 'required|string|unique:users',
            'password' => 'required|string',
            'c_password' => 'required|same:password',
            // 'device_type' => 'required|in:android,ios',
            // 'device_token' => 'required',
            // 'device_id' => 'required',
        ]);

        if ($validation->fails()) {

            return $this->common->Validation_Error_Response($validation->errors());
        } 
        try {
            if (empty(User::where('email', $request->email)->first())) {
                $user = new User([
                    'name' => "",
                    'email' => $request->email,
                    'device_type' => $request->device_type??"",
                    'device_token' => $request->device_token??"",
                    'device_id' => $request->device_id??"",
                    'password' => Hash::make($request->password),
                    'profile_img' => "",
                    'bio_description' => "",
                    'avg_rating' => "",
                    'driver_level' => "",
                    'phone' => "",
                    'latitude' => "",
                    'longitude' => "",
                    'bank_account_number' => "",
                    'bank_name' => "",
                    'bank_account_holder' => "",
                ]);

                if ($user->save()) {
                    $token =  $user->createToken('Api Login', ['*'], now()->addWeek())->plainTextToken;
                    $data['access_token'] = $token;

                    return $this->common->ResponseHandler('success', 'Successfull Signup', $data);
                }else{
                    return $this->common->ResponseHandler('fail', 'Something went wrong');
                }
            }else{
                return $this->common->ResponseHandler('fail', 'User Already Exist');
            }
        } catch (Exception $e) {
            return $this->common->ResponseHandler('fail', $e->getMessage());
        }

        
    }
}
