<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\CommonController;
use Validator;
use App\Models\User;
use App\Models\UserNtkDetail;
use Auth;

class UserNtkDetailController extends Controller
{
    public function __construct()
    {
        $this->common = new CommonController();
    }

    public function get_ntk_details()
    {
        try {
            $user_id = Auth::user()->id;
            $user_ntk_details = UserNtkDetail::where('user_id', $user_id)->orderBy('priority','asc')->get();

            if(count($user_ntk_details)>0){
                return $this->common->ResponseHandler('success', 'Record Found', $user_ntk_details);
            }else{
                return $this->common->ResponseHandler('fail', 'Record not found');
            }
        } catch (Exception $e) {
            return $this->common->ResponseHandler('fail', $e->getMessage());
        }
    }
    public function update_ntk_details(Request $request)
    {

        $validation = Validator::make($request->all(), [
            '0.full_name' => 'required',
            '0.phone_number' => 'required',
            '0.relationship' => 'required',
            '0.priority' => 'required',
        ]);


        if ($validation->fails()) {
            return $this->common->Validation_Error_Response($validation->errors());
        }

        try {
            $user_id= Auth::user()->id;
            foreach ($request->all() as $item) {
                UserNtkDetail::updateOrCreate(
                    ['user_id' => $user_id, 'priority' => $item['priority']],
                    [
                        'full_name' => $item['full_name'],
                        'phone_number' => $item['phone_number'],
                        'relationship' => $item['relationship'],
                        'priority' => $item['priority'],
                        'user_id' => $user_id,                   
                    ]
                );
            }
            $user_ntk_details = UserNtkDetail::where('user_id', $user_id)->orderBy('priority', 'asc')->get();


            return $this->common->ResponseHandler('success', 'Next to Kin Updated Successfully', $user_ntk_details);
        } catch (Exception $e) {
            return $this->common->ResponseHandler('fail', $e->getMessage());
        }
    }
}
