<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function maktab_documents()
    {
        return view('admin.documents.maktab-documents');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function makkah_hotel_documents()
    {
        return view('admin.documents.makkah-hotel-documents');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function madinah_hotel_documents()
    {
        return view('admin.documents.madinah-hotel-documents');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function aziziyah_hotel_documents()
    {
        return view('admin.documents.aziziyah-hotel-documents');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function visa_ticket()
    {
        return view('admin.documents.visa-ticket');
    }
}
