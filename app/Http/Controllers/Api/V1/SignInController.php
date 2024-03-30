<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\CommonController;
use Validator;
use App\Models\User;
use Auth;

class SignInController extends Controller
{
    public function __construct()
    {
        $this->common = new CommonController();
    }
    public function login(Request $request)
    {

        $validation = Validator::make($request->all(), [
            'device_type' => 'required|in:android,ios',
            'device_token' => 'required',
            // 'language' => 'required',
            'device_id' => 'required',
            'email' => 'email|max:255',
            'password' => 'required|min:6',
        ]);

        if ($validation->fails()) {

            return $this->common->Validation_Error_Response($validation->errors());
        }
        try {
            $user=User::where('email', $request->email)->first();
            if (!empty($user)) {
                if (password_verify($request->password, $user->password)) {
                    $user->device_type = $request->device_type;
                    $user->device_id = $request->device_id;
                    $user->device_token = $request->device_token;
                    $user->save();
                    
                    $token =  $user->createToken('Api Login', ['*'], now()->addWeek())->plainTextToken;
                    $data['access_token'] = $token;
                    return $this->common->ResponseHandler('success', 'Successfull Login', $data);
                }else{
                    return $this->common->ResponseHandler('fail', 'Invalid Credentials');
                }
            } else {
                return $this->common->ResponseHandler('fail', 'User does not exist');
            }
        } catch (Exception $e) {
            return $this->common->ResponseHandler('fail', $e->getMessage());
        }
    }
    
    public function logout(Request $request){
        
        try {
            $user = User::where('id', Auth::User()->id)->first();
            if (!empty($user)) {
                $user->device_token = '';
                $user->device_id = '';
                $user->save();

                $request->user()->currentAccessToken()->delete();

                return $this->common->ResponseHandler('success', 'Logout Successfull');
            } else {
                return $this->common->ResponseHandler('fail', 'User does not exist');
            }
        } catch (Exception $e) {
            return $this->common->ResponseHandler('fail', $e->getMessage());
        }
    }
}
