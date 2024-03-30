<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\CommonController;
use Validator;
use App\Models\User;
use App\Models\Vehicle;
use Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File; 



class VehicleDetailController extends Controller
{
    public function __construct()
    {
        $this->common = new CommonController();
    }

    public function get_vehicle_details()
    {
        try {
            $user_id = Auth::user()->id;
            $user_vehicle_details = Vehicle::where('user_id', $user_id)->first();

            if ($user_vehicle_details) {
                return $this->common->ResponseHandler('success', 'Record Found', $user_vehicle_details);
            } else {
                return $this->common->ResponseHandler('fail', 'Record not found');
            }
        } catch (Exception $e) {
            return $this->common->ResponseHandler('fail', $e->getMessage());
        }
    }

    public function update_vehicle_details(Request $request)
    {

        $validation = Validator::make($request->all(), [
            'plate_number' => 'required',
            'car_name' => 'required',
            'car_model' => 'required',
            'car_year' => 'required',
        ]);


        if ($validation->fails()) {
            return $this->common->Validation_Error_Response($validation->errors());
        }

        try {
            $user_id = Auth::user()->id;
            $user_vehicle = Vehicle::where('user_id', $user_id)->first();

            $action = 'add';

            if (!$user_vehicle) {
                $user_vehicle = new Vehicle();
            } else {
                $action = 'update';
            }

            $user_vehicle->plate_number = $request->plate_number;
            $user_vehicle->car_name = $request->car_name;
            $user_vehicle->car_model = $request->car_model;
            $user_vehicle->car_year = $request->car_year;
            $user_vehicle->user_id = $user_id;

            if ($request->hasfile('driver_license')) {
                if ($action == 'update') {
                    $old_driver_license = explode('/', $user_vehicle->driver_license);
                    unlink(base_path() ."/storage/app/public/vehicle/". end($old_driver_license));
                }

                $user_vehicle->driver_license = url('/') . '/storage/' . $request->driver_license->storeAs('vehicle', 'driver_license-' . $user_id . "-" . time() . '.png','public');
            }
            if ($request->hasfile('particulars')) {
                if ($action == 'update') {
                    $old_particulars = explode('/', $user_vehicle->particulars);
                    unlink(base_path() ."/storage/app/public/vehicle/". end($old_particulars));
                }

                $user_vehicle->particulars = url('/') . '/storage/' . $request->particulars->storeAs('vehicle', 'particulars-' . $user_id . "-" . time() . '.png','public');
            }
            if ($request->hasfile('insurance_paper')) {
                if ($action == 'update') {
                    $old_insurance_paper = explode('/', $user_vehicle->insurance_paper);
                    unlink(base_path() ."/storage/app/public/vehicle/". end($old_insurance_paper));

                   
                }

                $user_vehicle->insurance_paper = url('/') . '/storage/' . $request->insurance_paper->storeAs('vehicle', 'insurance_paper-' . $user_id . "-" . time() . '.png','public');
            }
            if ($request->hasfile('police_clearance')) {
                if ($action == 'update') {
                    $old_police_clearance = explode('/', $user_vehicle->police_clearance);
                    unlink(base_path() ."/storage/app/public/vehicle/". end($old_police_clearance));
                }

                $user_vehicle->police_clearance = url('/') . '/storage/' . $request->police_clearance->storeAs('vehicle', 'police_clearance-' . $user_id . "-" . time() . '.png','public');
            }
            if ($request->hasfile('car_image')) {
                if ($action == 'update') {
                    $old_car_image = explode('/', $user_vehicle->car_image);
                    unlink(base_path() ."/storage/app/public/vehicle/". end($old_car_image));

                }

                $user_vehicle->car_image = url('/') . '/storage/' . $request->car_image->storeAs('vehicle', 'car_image-' . $user_id . "-" . time() . '.png','public');
            }
            $user_vehicle->save();


            return $this->common->ResponseHandler('success', 'Vehicle Updated Successfully', $user_vehicle);
        } catch (Exception $e) {
            return $this->common->ResponseHandler('fail', $e->getMessage());
        }
    }
}
