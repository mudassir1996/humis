<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookingReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function maktab_report()
    {
        return view('admin.booking.report');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function airport_report()
    {
        return view('admin.booking.report');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function gender_report()
    {
        return view('admin.booking.report');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function room_report()
    {
        return view('admin.booking.report');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function duration_report()
    {
        return view('admin.booking.report');
    }
}
