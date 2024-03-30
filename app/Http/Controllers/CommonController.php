<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommonController extends Controller
{
    public function ResponseHandler($type, $message, $data = [])
    {
        if ($type == 'success') {
            return response()->json(['result' => '1', 'status' => $type, 'message' => $message, 'data' => $data]);
        } elseif ($type == 'fail') {
            if (strtoupper(env('APP_ENV')) == 'PRODUCTION') {
                return response()->json(['result' => '0', 'status' => $type, 'message' => $message, 'data' => $data]);
            } else {
                return response()->json(['result' => '0', 'status' => $type, 'message' => $message, 'data' => $data]);
            }
        }
    }

    public function Validation_Error_Response($validation_errors)
    {
        $messages = $validation_errors->messages();
        $keys = array_keys($messages);
        $arr =  "";
        foreach ($keys as $key => $value) {
            $arr .=  ' ' . $value . '||' . $messages[$value][0] . ' ';
        }
        if (strtoupper(env('APP_ENV')) == 'PRODUCTION') {
            return response()->json(['result' => '0', 'status' => 'fail', 'message' => 'Validation Error' . $arr, 'data' => []]);
        } else {
            return response()->json(['result' => '0', 'status' => 'fail', 'message' => 'Validation Error' . $arr, 'data' => []]);
        }
    }
}
