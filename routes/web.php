<?php

use App\Http\Controllers\Admin\AdditionalFacilityController;
use App\Http\Controllers\Admin\AirportController;
use App\Http\Controllers\Admin\AzziahAccomodationController;
use App\Http\Controllers\Admin\BookingOfficeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FoodController;
use App\Http\Controllers\Admin\MadinahAccomodationController;
use App\Http\Controllers\Admin\MakkahAccomodationController;
use App\Http\Controllers\Admin\MaktabCategoryController;
use App\Http\Controllers\Admin\OtherCostController;
use App\Http\Controllers\Admin\SpecialTransportController;
use App\Http\Controllers\Admin\StayDurationController;
use App\Http\Controllers\Admin\TicketController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\RecieptController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\BankCashController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\PackageController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/login');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    
    Route::get('/applications', [ApplicationController::class, 'index'])->name('applications');
    Route::get('/applications/{id}/edit', [ApplicationController::class, 'edit'])->name('applications.edit');
    Route::put('/applications/{id}/update', [ApplicationController::class, 'update'])->name('applications.update');
    Route::get('/applications/{id}/view-details', [ApplicationController::class, 'view_details'])->name('view-application-details');

    
    Route::get('/reciepts/view-details', [RecieptController::class, 'view_details'])->name('view-reciept-details');
    Route::resource('/reciepts', RecieptController::class);
    Route::resource('/payments', PaymentController::class);
    Route::resource('/bank-cash', BankCashController::class);
    
    Route::get('/documents/maktab', [DocumentController::class, 'maktab_documents'])->name('maktab-documents');
    Route::post('/documents/maktab', [DocumentController::class, 'maktab_documents_store'])->name('maktab-documents-store');
    Route::get('/documents/makkah-hotel', [DocumentController::class, 'makkah_hotel_documents'])->name('makkah-hotel-documents');
    Route::post('/documents/makkah-hotel', [DocumentController::class, 'makkah_hotel_document_store'])->name('makkah-hotel-documents-store');
    Route::get('/documents/madinah-hotel', [DocumentController::class, 'madinah_hotel_documents'])->name('madinah-hotel-documents');
    Route::post('/documents/madinah-hotel', [DocumentController::class, 'madinah_hotel_document_store'])->name('madinah-hotel-documents-store');
    Route::get('/documents/aziziyah-hotel', [DocumentController::class, 'aziziyah_hotel_documents'])->name('aziziyah-hotel-documents');
    Route::post('/documents/aziziyah-hotel', [DocumentController::class, 'aziziyah_hotel_document_store'])->name('aziziyah-hotel-documents-store');
    Route::get('/documents/visa-ticket', [DocumentController::class, 'visa_ticket'])->name('visa-ticket');
    Route::post('/documents/visa-ticket/store', [DocumentController::class, 'visa_ticket_store'])->name('visa-ticket-store');
    Route::get('/bookings/complete-list', [BookingController::class, 'complete_list'])->name('complete-list');

    Route::get('/packages/{id}/get-details', [PackageController::class, 'getPackageDetails']);
    Route::post('/packages/calculate-pricing', [PackageController::class, 'calculatePackagePricing']);
    Route::post('/maktab-categories/calculate-sum-application', [MaktabCategoryController::class, 'getSumMaktabApplications']);

    Route::get('/bookings', [BookingController::class, 'index'])->name('bookings');
    Route::get('/bookings/create-booking-step-1', [BookingController::class, 'create_step_1'])->name('create-booking-step-1');
    Route::post('/bookings/store-booking-step-1', [BookingController::class, 'store_step_1'])->name('store-booking-step-1');
    Route::get('/bookings/create-booking-step-2', [BookingController::class, 'create_step_2'])->name('create-booking-step-2');
    Route::post('/bookings/store-booking-step-2', [BookingController::class, 'store_step_2'])->name('store-booking-step-2');
    Route::get('/bookings/create-booking-step-3', [BookingController::class, 'create_step_3'])->name('create-booking-step-3');
    Route::post('/bookings/store-booking-step-3', [BookingController::class, 'store_step_3'])->name('store-booking-step-3');
    Route::get('/bookings/create-booking-step-4', [BookingController::class, 'create_step_4'])->name('create-booking-step-4');
    Route::post('/bookings/store-booking-step-4', [BookingController::class, 'store_step_4'])->name('store-booking-step-4');
    Route::get('/bookings/{id}/view-details', [BookingController::class, 'view_details'])->name('view-booking-details');
    Route::resource('/booking-offices', BookingOfficeController::class);

    Route::middleware(['company'])->group(function () {
        Route::resource('/agents', AgentController::class);
    });
    Route::middleware(['admin'])->group(function () {
        Route::get('/companies/{id}/booking-offices', [CompanyController::class, 'getBookingOffices']);
        Route::get('/companies/{id}/agents', [CompanyController::class, 'getAgents']);
        Route::resource('/other-costs', OtherCostController::class)->except(['create','store','edit','destroy']);
        Route::resource('/companies', CompanyController::class);
        Route::resource('/additional-facilities', AdditionalFacilityController::class);
        Route::resource('/stay-durations', StayDurationController::class);
        Route::resource('/packages', PackageController::class);
        Route::resource('/maktab-categories', MaktabCategoryController::class);
        Route::resource('/aziziah-accomodations', AzziahAccomodationController::class);
        Route::resource('/makkah-accomodations', MakkahAccomodationController::class);
        Route::resource('/madinah-accomodations', MadinahAccomodationController::class);
        Route::resource('/food-types', FoodController::class);
        Route::resource('/special-transports', SpecialTransportController::class);
      
        Route::resource('/airports', AirportController::class);
        Route::resource('/tickets', TicketController::class);

    });


    // Route::get('/booking-summary/maktab', [BookingSummaryController::class, 'maktab_summary'])->name('booking-maktab-summary');
    // Route::get('/booking-summary/airport', [BookingSummaryController::class, 'airport_summary'])->name('booking-airport-summary');
    // Route::get('/booking-summary/gender', [BookingSummaryController::class, 'gender_summary'])->name('booking-gender-summary');
    // Route::get('/booking-summary/room', [BookingSummaryController::class, 'room_summary'])->name('booking-room-summary');
    // Route::get('/booking-summary/duration', [BookingSummaryController::class, 'duration_summary'])->name('booking-duration-summary');
    
    // Route::get('/booking-report/maktab', [BookingReportController::class, 'maktab_report'])->name('booking-maktab-report');
    // Route::get('/booking-report/airport', [BookingReportController::class, 'airport_report'])->name('booking-airport-report');
    // Route::get('/booking-report/gender', [BookingReportController::class, 'gender_report'])->name('booking-gender-report');
    // Route::get('/booking-report/room', [BookingReportController::class, 'room_report'])->name('booking-room-report');
    // Route::get('/booking-report/duration', [BookingReportController::class, 'duration_report'])->name('booking-duration-report');
});
// Route::resource('user', UserController::class);
