<?php

namespace App\Http\Controllers;

use App\Models\Accomodation;
use App\Models\Airport;
use App\Models\Application;
use App\Models\MaktabCategory;
use App\Models\StayDuration;
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
        $maktab_categories = MaktabCategory::where('maktab_status', 'ACTIVE')->select('id', 'maktab_name')->get();
        $accomodations = Accomodation::where('hotel_status', 'ACTIVE')->select('id', 'hotel_name', 'accomodation_type', 'sharing_room_cost', 'triple_room_cost', 'quad_double_cost')->get();
        $makkah_accomodations = $accomodations->where('accomodation_type', 'MAKKAH');
        $madinah_accomodations = $accomodations->where('accomodation_type', 'MADINAH');
        $airports = Airport::all();
        $stay_durations = StayDuration::all();

        if (Auth::user()->role == "ADMIN") {
            $applications = Application::filter()->select(
                'company_name',
                'applications.id',
                'booking_number',
                'application_number',
                'given_name',
                'surname',
                'gender',
                'passport',
                'applications.document_ticket',
                'applications.document_visa'
            )->leftJoin('bookings', 'bookings.id', 'applications.booking_id')
                ->leftJoin(
                    'packages',
                    function ($join) {
                        $join->on('bookings.package_id', '=', 'packages.id')
                            ->where('bookings.package_type', '=', 'STANDARD');
                    }
                )->leftJoin(
                    'custom_packages',
                    function ($join) {
                        $join->on('bookings.package_id', '=', 'custom_packages.id')
                            ->where('bookings.package_type', '=', 'CUSTOM');
                    }
                )
                ->leftJoin('companies', 'companies.id', 'bookings.company_id')
                ->get();
        } else {
            $applications = Application::filter()->select(
                'company_name',
                'applications.id',
                'booking_number',
                'application_number',
                'given_name',
                'surname',
                'gender',
                'passport',
                'applications.document_ticket',
                'applications.document_visa'
            )->leftJoin('bookings', 'bookings.id', 'applications.booking_id')
                ->leftJoin(
                    'packages',
                    function ($join) {
                        $join->on('bookings.package_id', '=', 'packages.id')
                            ->where('bookings.package_type', '=', 'STANDARD');
                    }
                )->leftJoin(
                    'custom_packages',
                    function ($join) {
                        $join->on('bookings.package_id', '=', 'custom_packages.id')
                            ->where('bookings.package_type', '=', 'CUSTOM');
                    }
                )
                ->leftJoin('companies', 'companies.id', 'bookings.company_id')
                ->where('bookings.company_id', auth()->user()->company_id)->get();
        }
        return view('admin.application.index', compact(
            'applications',
            'maktab_categories',
            'makkah_accomodations',
            'madinah_accomodations',
            'airports',
            'stay_durations'

        ));
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
        )
            ->leftJoin('airports as dep_pk', 'applications.departure_airport_pk_id', 'dep_pk.id')
            ->leftJoin('airports as dep_ksa', 'applications.departure_airport_ksa_id', 'dep_ksa.id')
            ->leftJoin('airports as arr_ksa', 'applications.arrival_airport_ksa_id', 'arr_ksa.id')
            ->leftJoin('airports as arr_pk', 'applications.arrival_airport_pk_id', 'arr_pk.id')
            ->first();
        return view('admin.application.view-details', compact('application'));
    }
}
