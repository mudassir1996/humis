<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->role=="ADMIN"){
            $applications = Application::select('applications.id', 'booking_number', 'application_number', 'given_name', 'surname', 'gender', 'passport', 'applications.document_ticket', 'applications.document_visa')->leftJoin('bookings', 'bookings.id', 'applications.booking_id')->get();
        }else{
            $applications = Application::select('applications.id', 'booking_number', 'application_number', 'given_name', 'surname', 'gender', 'passport', 'applications.document_ticket', 'applications.document_visa')->leftJoin('bookings', 'bookings.id', 'applications.booking_id')->where('bookings.company_id',auth()->user()->company_id)->get();

        }
        return view('admin.application.index', compact('applications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function view_details($id)
    {
        $application = Application::where('applications.id', $id)->select(
            'applications.*',
            'dep_ksa.airport_name as dep_airport_ksa',
            'dep_pk.airport_name as dep_airport_pk',
            'arr_ksa.airport_name as arr_airport_ksa',
            'arr_pk.airport_name as arr_airport_pk',
            'tickets.ticket_type',
        )
            ->leftJoin('airports as dep_pk', 'applications.departure_airport_pk_id', 'dep_pk.id')
            ->leftJoin('airports as dep_ksa', 'applications.departure_airport_ksa_id', 'dep_ksa.id')
            ->leftJoin('airports as arr_ksa', 'applications.arrival_airport_ksa_id', 'arr_ksa.id')
            ->leftJoin('airports as arr_pk', 'applications.arrival_airport_pk_id', 'arr_pk.id')
            ->leftJoin('tickets', 'applications.ticket', 'tickets.id')
            ->first();
        return view('admin.application.view-details', compact('application'));
    }
}
