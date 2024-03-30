<?php

namespace App\Http\Controllers;

use App\Models\Accomodation;
use App\Models\Agent;
use App\Models\Airport;
use App\Models\Application;
use App\Models\Booking;
use App\Models\Company;
use App\Models\CompanyBookingOffice;
use App\Models\FoodType;
use App\Models\MaktabCategory;
use App\Models\Package;
use App\Models\Ticket;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.booking.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_step_1(Request $request)
    {
        $companies = Company::where('company_status', 'ACTIVE')->select('id', 'company_name')->get();
        $booking_offices = CompanyBookingOffice::select('id', 'booking_office_name', 'company_id')->get();
        $agents = Agent::select('id', 'agent_name')->get();
        $request->session()->forget('booking');
        $request->session()->forget('applications');

        return view('admin.booking.create', compact('companies', 'booking_offices', 'agents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store_step_1(Request $request)
    {
        // dd($request->agent_name);
        $booking = new Booking();
        $booking->booking_number = time();
        $booking->company_id = $request->company_id;
        $booking->booking_office_id = $request->booking_office_id;
        $booking->client_country = $request->client_country;
        $booking->booking_nature = $request->booking_nature;
        $booking->agent_name = $request->agent_name;
        $booking->agent_commission = $request->agent_commission;
        $booking->num_of_hujjaj = $request->num_of_hujjaj;
        $booking->companion = $request->companion;
        $booking->contact_person = $request->contact_person ?? 1;
        $booking->contact_name = $request->contact_name;
        $booking->contact_surname = $request->contact_surname;
        $booking->contact_mobile = $request->contact_mobile;

        $request->session()->put('booking', $booking);

        return redirect()->route('create-booking-step-2');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_step_2(Request $request)
    {
        $packages = Package::where('package_status', 'ACTIVE')->get();
        $maktab_categories = MaktabCategory::where('maktab_status', 'ACTIVE')->select('id', 'maktab_name')->get();
        $accomodations = Accomodation::where('hotel_status', 'ACTIVE')->select('id', 'hotel_name', 'accomodation_type', 'sharing_room_cost', 'triple_room_cost', 'quad_double_cost')->get();
        $aziziyah_accomodations = $accomodations->where('accomodation_type', 'AZIZIYAH');
        $makkah_accomodations = $accomodations->where('accomodation_type', 'MAKKAH');
        $madinah_accomodations = $accomodations->where('accomodation_type', 'MADINAH');
        $food_types = FoodType::where('food_type_status', 'ACTIVE')->select('id', 'food_type_name', 'food_type_cost')->get();
        $booking = $request->session()->get('booking');
        return view('admin.booking.create', compact('booking', 'packages', 'maktab_categories', 'aziziyah_accomodations', 'makkah_accomodations', 'madinah_accomodations', 'food_types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store_step_2(Request $request)
    {

        $booking = $request->session()->get('booking');

        $booking->package_type = $request->package_type;
        $booking->package_id = $request->package_id;
        // dd($booking->package_type);

        $request->session()->put('booking', $booking);

        return redirect()->route('create-booking-step-3');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_step_3(Request $request)
    {
        $booking = $request->session()->get('booking');
        // dd($applications);
        $tickets = Ticket::select('id', 'ticket_type', 'ticket_cost')->get();
        $airports = Airport::select('id', 'airport_name', 'airport_country_code')->get();

        $pk_airports = $airports->where('airport_country_code', 'PK');
        $ksa_airports = $airports->where('airport_country_code', 'KSA');
        return view('admin.booking.create', compact('booking', 'tickets', 'pk_airports', 'ksa_airports'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store_step_3(Request $request)
    {

        $booking = $request->session()->get('booking');
        $applications = $request->session()->get('applications', []);

        $application = $application = new Application();
        $application->application_number = $request->application_number;
        $application->surname = $request->surname;
        $application->given_name = $request->given_name;
        $application->father_husband_name = $request->father_husband_name;
        $application->passport = $request->passport;
        $application->date_issue = $request->date_issue;
        $application->date_expiry = $request->date_expiry;
        $application->date_birth = $request->date_birth;
        $application->cnic = $request->cnic;
        $application->blood_group = $request->blood_group;
        $application->gender = $request->gender;
        $application->fiqah = $request->fiqah;
        $application->marital_status = $request->marital_status;
        $application->address = $request->address;
        $application->mobile_number = $request->mobile_number;
        $application->whatsapp_number = $request->whatsapp_number;
        $application->is_contact_person = $request->is_contact_person;
        $application->mehram_name = $request->mehram_name;
        $application->mehram_relation = $request->mehram_relation;
        $application->nominee_name = $request->nominee_name;
        $application->nominee_relation = $request->nominee_relation;
        $application->nominee_cnic = $request->nominee_cnic;
        $application->nominee_mobile = $request->nominee_mobile;
        $application->qurbani = $request->qurbani;
        $application->room_sharing = $request->room_sharing;
        $application->ticket = $request->ticket;
        $application->departure_airport_pk_id = $request->departure_airport_pk_id;
        $application->arrival_airport_pk_id = $request->arrival_airport_pk_id;
        $application->departure_airport_ksa_id = $request->departure_airport_ksa_id;
        $application->arrival_airport_ksa_id = $request->arrival_airport_ksa_id;
        $application->arrival_date_ksa = $request->arrival_date_ksa;


        if($application->is_contact_person){
            $booking->contact_name = $application->given_name;
            $booking->contact_surname = $application->surname;
            $booking->contact_mobile = $request->mobile_number;
        }


        // if ($request->hasfile('attachment_passport')) {
        //     $application->attachment_passport = '/storage/' . $request->attachment_passport->storeAs('application', 'passport-' . $request->application_number .'.png', 'public');
        // }
        // if ($request->hasfile('attachment_cnic')) {
        //     $application->attachment_cnic = '/storage/' . $request->attachment_cnic->storeAs('application', 'cnic-' . $request->application_number .'.png', 'public');
        // }
        // if ($request->hasfile('attachment_picture')) {
        //     $application->attachment_picture = '/storage/' . $request->attachment_picture->storeAs('application', 'picture-' . $request->application_number .'.png', 'public');
        // }
        // if ($request->hasfile('attachment_medical')) {
        //     $application->attachment_medical = '/storage/' . $request->attachment_medical->storeAs('application', 'medical-' . $request->application_number .'.png', 'public');
        // }
        // if ($request->hasfile('attachment_other')) {
        //     $application->attachment_other = '/storage/' . $request->attachment_other->storeAs('application', 'other-' . $request->application_number .'.png', 'public');
        // }

        $applications[]=$application;



        $request->session()->put('applications', $applications);
        $request->session()->put('booking', $booking);

        if(count($applications) < $booking->num_of_hujjaj){
            return redirect()->route('create-booking-step-3');
        }else{
            return redirect()->route('create-booking-step-4');
        }

    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_step_4()
    {
        return view('admin.booking.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function complete_list()
    {
        return view('admin.booking.complete-list');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function view_details()
    {
        return view('admin.booking.view-details');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {
        //
    }
}
