<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $applications = Application::select('booking_number','application_number', 'given_name','surname', 'gender','passport')->leftJoin('bookings','bookings.id','applications.booking_id')->get();
        return view('admin.application.index',compact('applications'));
    }
}
