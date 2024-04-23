<?php

namespace App\Http\Controllers;

use App\Models\Accomodation;
use App\Models\Agent;
use App\Models\Airport;
use App\Models\Application;
use App\Models\Booking;
use App\Models\Company;
use App\Models\CompanyBookingOffice;
use App\Models\CustomPackage;
use App\Models\FoodType;
use App\Models\MaktabCategory;
use App\Models\Package;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
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
        if (auth()->user()->role == 'ADMIN') {
            $bookings = Booking::filter()->leftJoin('companies', 'companies.id', 'bookings.company_id')->leftJoin(
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
            )->select(
                'bookings.id',
                'booking_number',
                'company_name',
                'contact_name',
                'contact_surname',
                'package_type',
                'custom_packages.package_name as custom_package_name',
                'packages.package_name',
            )->get();
        } else {
            $bookings = Booking::filter()->leftJoin('companies', 'companies.id', 'bookings.company_id')->leftJoin(
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
            )->where('bookings.company_id', auth()->user()->company_id)->select(
                'bookings.id',
                'bookings.company_id',
                'booking_number',
                'company_name',
                'contact_name',
                'contact_surname',
                'package_type',
                'custom_packages.package_name as custom_package_name',
                'packages.package_name',
            )->get();
        }
        return view('admin.booking.index', compact(
            'bookings',
            'maktab_categories',
            'makkah_accomodations',
            'madinah_accomodations',
            'airports'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_step_1(Request $request)
    {
        $companies = Company::where('company_status', 'ACTIVE')->select('id', 'company_name')->get();
        $booking_offices = CompanyBookingOffice::select('id', 'booking_office_name', 'company_id')->where('company_id', auth()->user()->company_id)->get();
        $agents = Agent::select('id', 'agent_name')->get();
        $request->session()->forget('booking');
        $request->session()->forget('applications');

        return view('admin.booking.create', compact('booking_offices', 'agents', 'companies'));
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
        $booking->company_id = $request->company_id ?? auth()->user()->company_id;
        $booking->booking_office_id = $request->booking_office_id;
        $booking->client_country = $request->client_country;
        $booking->booking_nature = $request->booking_nature;
        $booking->agent_name = $request->agent_name ?? "";
        $booking->agent_commission = $request->agent_commission ?? 0;
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

        if ($booking->package_type == 'CUSTOM') {
            $custom_package = new CustomPackage();
            $custom_package->maktab_category_id = $request->maktab_category_id;
            $custom_package->duration_of_stay = $request->duration_of_stay;
            $custom_package->nature = $request->nature;
            $custom_package->aziziya_accommodation_id = $request->aziziya_accommodation_id;
            $custom_package->makkah_accommodation_id = $request->makkah_accommodation_id;
            $custom_package->madinah_accommodation_id = $request->madinah_accommodation_id;
            $custom_package->aziziya_room_sharing = "SHARING";
            $custom_package->makkah_room_sharing = $request->makkah_room_sharing ?? "SHARING";
            $custom_package->madinah_room_sharing = $request->madinah_room_sharing ?? "SHARING";
            $custom_package->food_type_id = $request->food_type_id;
            $custom_package->special_transport = $request->special_transport;
            $custom_package->cost_per_person = $request->cost_per_person;
            $custom_package->created_by = auth()->user()->id;
            $custom_package->save();
            $booking->package_id = $custom_package->id;
        } else {
            $booking->package_id = $request->package_id;
        }
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

        // dd($request->all());

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
        $application->ticket = $request->ticket;
        $application->departure_airport_pk_id = $request->departure_airport_pk_id;
        $application->arrival_airport_pk_id = $request->arrival_airport_pk_id;
        $application->departure_airport_ksa_id = $request->departure_airport_ksa_id;
        $application->arrival_airport_ksa_id = $request->arrival_airport_ksa_id;
        $application->arrival_date_ksa = $request->arrival_date_ksa;
        $application->departure_date_ksa = $request->departure_date_ksa;


        // if ($request->room_sharing == 'TRIPLE') {
        //     $madinah_accommodation_cost = $madinah_accommodation->triple_room_cost;
        // } else if ($madinah_room_sharing == 'QUAD') {
        //     $madinah_accommodation_cost = $madinah_accommodation->quad_double_cost;
        // } else {
        //     $madinah_accommodation_cost = $madinah_accommodation->sharing_room_cost ?? 0;
        // }

        $qurbani_fee = 0;
        $ticket_cost = 0;

        if ($request->qurbani == 'INCLUDED') {
            $qurbani_fee = 800;
        }
        if ($request->ticket != 0) {
            $ticket = Ticket::where('id', $request->ticket)->select('ticket_cost')->first();
            $ticket_cost = $ticket->ticket_cost;
        }
        if ($booking->package_type == 'CUSTOM') {
            $package = CustomPackage::where('id', $booking->package_id)->first();
        } else {
            $package = Package::where('id', $booking->package_id)->first();
        }


        if ($request->room_sharing == '') {
            $application->aziziya_room_sharing = $package->aziziya_room_sharing;
            $application->makkah_room_sharing = $package->makkah_room_sharing;
            $application->madinah_room_sharing = $package->madinah_room_sharing;

            $cost_per_person = $package->cost_per_person;
        } else {
            $application->room_sharing = $request->room_sharing;

            $makkah_accommodation = Accomodation::where('id', $package->makkah_accommodation_id)->first();
            $madinah_accommodation = Accomodation::where('id', $package->madinah_accommodation_id)->first();

            // dd($package->makkah_accomodation_id);

            if ($package->makkah_room_sharing == 'TRIPLE') {
                $old_makkah_accommodation_cost = $makkah_accommodation->triple_room_cost;
            } else if ($package->makkah_room_sharing == 'DOUBLE') {
                $old_makkah_accommodation_cost = $makkah_accommodation->quad_double_cost;
            } else {
                $old_makkah_accommodation_cost = $makkah_accommodation->sharing_room_cost ?? 0;
            }

            if ($package->madinah_room_sharing == 'TRIPLE') {
                $old_madinah_accommodation_cost = $madinah_accommodation->triple_room_cost;
            } else if ($package->madinah_room_sharing == 'DOUBLE') {
                $old_madinah_accommodation_cost = $madinah_accommodation->quad_double_cost;
            } else {
                $old_madinah_accommodation_cost = $madinah_accommodation->sharing_room_cost ?? 0;
            }

            $cost_with_accomodation = $package->cost_per_person - $old_madinah_accommodation_cost - $old_makkah_accommodation_cost;

            if ($application->madinah_room_sharing == 'TRIPLE') {
                $makkah_accommodation_cost = $makkah_accommodation->triple_room_cost;
                $madinah_accommodation_cost = $madinah_accommodation->triple_room_cost;
            } else if ($package->madinah_room_sharing == 'DOUBLE') {
                $makkah_accommodation_cost = $makkah_accommodation->quad_double_cost;
                $madinah_accommodation_cost = $madinah_accommodation->quad_double_cost;
            } else {
                $makkah_accommodation_cost = $makkah_accommodation->sharing_room_cost ?? 0;
                $madinah_accommodation_cost = $madinah_accommodation->sharing_room_cost ?? 0;
            }

            $cost_per_person = $cost_with_accomodation + $makkah_accommodation_cost + $madinah_accommodation_cost;
        }


        $final_cost_per_person = $cost_per_person + $qurbani_fee + $ticket_cost;
        $application->cost_per_person = $final_cost_per_person;

        if ($application->is_contact_person) {
            $booking->contact_name = $application->given_name;
            $booking->contact_surname = $application->surname;
            $booking->contact_mobile = $request->mobile_number;
        }


        if ($request->hasfile('attachment_passport')) {
            $application->attachment_passport = '/storage/' . $request->attachment_passport->storeAs('application/' . $request->application_number, 'passport-' . $request->application_number . '.png', 'public');
        }
        if ($request->hasfile('attachment_cnic')) {
            $application->attachment_cnic = '/storage/' . $request->attachment_cnic->storeAs('application/' . $request->application_number, 'cnic-' . $request->application_number . '.png', 'public');
        }
        if ($request->hasfile('attachment_picture')) {
            $application->attachment_picture = '/storage/' . $request->attachment_picture->storeAs('application/' . $request->application_number, 'picture-' . $request->application_number . '.png', 'public');
        }
        if ($request->hasfile('attachment_medical')) {
            $extension = $request->file('attachment_medical')->extension();
            $application->attachment_medical = '/storage/' . $request->attachment_medical->storeAs('application/' . $request->application_number, 'medical-' . $request->application_number . "." . $extension, 'public');
        }
        if ($request->hasfile('attachment_other')) {
            $extension = $request->file('attachment_other')->extension();
            $application->attachment_other = '/storage/' . $request->attachment_other->storeAs('application/' . $request->application_number, 'other-' . $request->application_number . "." . $extension, 'public');
        }

        $applications[] = $application;



        $request->session()->put('applications', $applications);
        $request->session()->put('booking', $booking);

        if (count($applications) < $booking->num_of_hujjaj) {
            return redirect()->route('create-booking-step-3');
        } else {
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
    public function store_step_4(Request $request)
    {
        $booking = $request->session()->get('booking');
        $applications = $request->session()->get('applications', []);

        DB::transaction(function () use ($booking, $applications, $request) {
            $booking->discount = $request->discount ?? 0;
            $booking->net_total = $request->net_total;
            $booking->commission = $request->commission ?? 0;
            $booking->grand_total = $request->grand_total;
            $booking->created_by = auth()->user()->id;

            unset($booking->contact_person);



            if ($booking->save()) {
                foreach ($applications as $application) {
                    $application->mehram_name = $application->mehram_name ?? "";
                    $application->mehram_relation = $application->mehram_relation ?? "";
                    if ($application->room_sharing == '') {
                        $application->aziziya_room_sharing = '';
                        $application->makkah_room_sharing = '';
                        $application->madinah_room_sharing = '';
                    } else {
                        $application->aziziya_room_sharing = $application->room_sharing;
                        $application->makkah_room_sharing = $application->room_sharing;
                        $application->madinah_room_sharing = $application->room_sharing;
                    }
                    $application->room_sharing = $application->room_sharing ?? "";
                    $application->booking_id = $booking->id;



                    unset($application->is_contact_person);
                    unset($application->room_sharing);
                    $application->created_by = auth()->user()->id;

                    $application->save();
                }
            }
        });
        return redirect()->route('complete-list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function complete_list()
    {
        $maktab_categories = MaktabCategory::where('maktab_status', 'ACTIVE')->select('id', 'maktab_name')->get();
        $accomodations = Accomodation::where('hotel_status', 'ACTIVE')->select('id', 'hotel_name', 'accomodation_type', 'sharing_room_cost', 'triple_room_cost', 'quad_double_cost')->get();
        $makkah_accomodations = $accomodations->where('accomodation_type', 'MAKKAH');
        $madinah_accomodations = $accomodations->where('accomodation_type', 'MADINAH');
        $airports = Airport::all();
        $bookings = Booking::leftJoin('companies', 'companies.id', 'bookings.company_id')->leftJoin('packages', 'packages.id', 'bookings.package_id')->select('bookings.id', 'booking_number', 'company_name', 'contact_name', 'contact_surname', 'package_name')->get();
        return view('admin.booking.complete-list', compact(
            'bookings',
            'maktab_categories',
            'makkah_accomodations',
            'madinah_accomodations',
            'airports'
        ));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function view_details($id)
    {
        $initial_info = Booking::where('bookings.id', $id)->select(
            'companies.company_name',
            'company_booking_offices.booking_office_name',
            'bookings.package_type',
            'bookings.package_id',
            'bookings.client_country',
            'bookings.booking_nature',
            'bookings.agent_name',
            'bookings.agent_commission',
            'bookings.num_of_hujjaj',
            'bookings.companion',
            'bookings.contact_name',
            'bookings.contact_surname',
            'bookings.contact_mobile',
            'agents.agent_name',
            'bookings.discount',
            'bookings.net_total',
            'bookings.commission',
            'bookings.grand_total',
        )
            ->leftJoin('companies', 'bookings.company_id', 'companies.id')
            ->leftJoin('agents', 'agents.id', 'bookings.agent_name')
            ->leftJoin('company_booking_offices', 'company_booking_offices.company_id', 'companies.id')
            ->first();

        if ($initial_info->package_type == 'CUSTOM') {
            $package = CustomPackage::where('custom_packages.id', $initial_info->package_id)
                ->leftJoin('maktab_categories', 'custom_packages.maktab_category_id', 'maktab_categories.id')
                ->leftJoin('accomodations as aziziyah_accomodations', 'custom_packages.aziziya_accommodation_id', 'aziziyah_accomodations.id')
                ->leftJoin('accomodations as makkah_accomodations', 'custom_packages.makkah_accommodation_id', 'makkah_accomodations.id')
                ->leftJoin('accomodations as madinah_accomodations', 'custom_packages.madinah_accommodation_id', 'madinah_accomodations.id')
                ->leftJoin('food_types', 'custom_packages.food_type_id', 'food_types.id')
                ->select(
                    'maktab_categories.maktab_name',
                    'custom_packages.duration_of_stay',
                    'custom_packages.nature',
                    'custom_packages.aziziya_room_sharing',
                    'custom_packages.aziziya_room_sharing',
                    'custom_packages.makkah_room_sharing',
                    'custom_packages.madinah_room_sharing',
                    'aziziyah_accomodations.hotel_name as aziziyah_accomodation',
                    'makkah_accomodations.hotel_name as makkah_accomodation',
                    'madinah_accomodations.hotel_name as madinah_accomodation',
                    'food_types.food_type_name',
                    'custom_packages.special_transport',

                )
                ->first();
        } else {
            $package = Package::where('packages.id', $initial_info->package_id)
                ->leftJoin('maktab_categories', 'packages.maktab_category_id', 'maktab_categories.id')
                ->leftJoin('accomodations as aziziyah_accomodations', 'packages.aziziya_accommodation_id', 'aziziyah_accomodations.id')
                ->leftJoin('accomodations as makkah_accomodations', 'packages.makkah_accommodation_id', 'makkah_accomodations.id')
                ->leftJoin('accomodations as madinah_accomodations', 'packages.madinah_accommodation_id', 'madinah_accomodations.id')
                ->leftJoin('food_types', 'packages.food_type_id', 'food_types.id')
                ->select(
                    'maktab_categories.maktab_name',
                    'packages.duration_of_stay',
                    'packages.nature',
                    'packages.aziziya_room_sharing',
                    'packages.aziziya_room_sharing',
                    'packages.makkah_room_sharing',
                    'packages.madinah_room_sharing',
                    'aziziyah_accomodations.hotel_name as aziziyah_accomodation',
                    'makkah_accomodations.hotel_name as makkah_accomodation',
                    'madinah_accomodations.hotel_name as madinah_accomodation',
                    'food_types.food_type_name',
                    'packages.special_transport',

                )
                ->first();
        }

        $package->package_type= $initial_info->package_type;



        // $package_info = Booking::where('bookings.id', $id)->select(
        //     'bookings.package_type',
        //     'maktab_categories.maktab_name',
        //     'packages.duration_of_stay',
        //     'packages.duration_of_stay',
        //     'packages.nature',
        //     'packages.special_transport',
        //     'packages.cost_per_person',
        // )
        // ->leftJoin('packages', function ($join) {
        //     $join->on('bookings.package_id', '=', 'packages.id')
        //     ->where('bookings.package_type', '=', 'STANDARD');
        // })
        // ->leftJoin('custom_packages as packages', function ($join) {
        //         $join->on('bookings.package_id', '=', 'custom_packages.id')
        //             ->where('bookings.package_type', '=', 'CUSTOM');
        //     })
        // ->leftJoin('maktab_categories', 'agents.id', 'bookings.agent_name')
        // ->leftJoin('company_booking_offices', 'company_booking_offices.company_id', 'companies.id')
        // ->first();

        $applications = Application::select('booking_number', 'application_number', 'given_name', 'surname', 'gender', 'passport', 'cost_per_person')->leftJoin('bookings', 'bookings.id', 'applications.booking_id')->where('applications.booking_id', $id)->get();
        return view('admin.booking.view-details', compact('initial_info', 'applications', 'package'));
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
