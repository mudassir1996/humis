<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\SignUpController;
use App\Http\Controllers\Api\V1\SignInController;
use App\Http\Controllers\Api\V1\UserNtkDetailController;
use App\Http\Controllers\Api\V1\VehicleDetailController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('v1')->group(function(){
    Route::post('/signup', [SignUpController::class, 'register']);
    Route::post('/signin', [SignInController::class, 'login']);
    Route::middleware('auth:sanctum')->group(function () {
        Route::post('/signout', [SignInController::class, 'logout']);
        Route::get('/user', function (Request $request) {
            return $request->user();
        });
    });
    Route::prefix('user')->middleware('auth:sanctum')->group(function () {
        //Next to Kin
        Route::get('/get-ntk-details', [UserNtkDetailController::class, 'get_ntk_details']);
        Route::post('/update-ntk-details', [UserNtkDetailController::class, 'update_ntk_details']);
        
        //Driver Vehicle
        Route::get('/get-vehicle-details', [VehicleDetailController::class, 'get_vehicle_details']);
        Route::post('/update-vehicle-details', [VehicleDetailController::class, 'update_vehicle_details']);
    });
});

Route::get('/user', function (Request $request) {
    return $request->user();
});
