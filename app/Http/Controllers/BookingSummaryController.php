<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookingSummaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function maktab_summary()
    {
        return view('admin.booking.summary');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function airport_summary()
    {
        return view('admin.booking.summary');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function gender_summary()
    {
        return view('admin.booking.summary');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function room_summary()
    {
        return view('admin.booking.summary');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function duration_summary()
    {
        return view('admin.booking.summary');
    }

}
