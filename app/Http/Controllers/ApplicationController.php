<?php

namespace App\Http\Controllers;

use App\Models\Accomodation;
use App\Models\AdditionalFacility;
use App\Models\Agent;
use App\Models\Airport;
use App\Models\ApplicaionAdditionalFacility;
use App\Models\Application;
use App\Models\Booking;
use App\Models\Company;
use App\Models\CustomPackage;
use App\Models\MaktabCategory;
use App\Models\OtherCost;
use App\Models\Package;
use App\Models\StayDuration;
use App\Models\Ticket;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        $companies = Company::all();
        $agents = Agent::all();
        $stay_durations = StayDuration::all();

        $applications = Application::filter()->select(
            'company_name',
            'applications.id',
            'bookings.company_id',
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
        return view('admin.application.index', compact(
            'applications',
            'maktab_categories',
            'makkah_accomodations',
            'madinah_accomodations',
            'airports',
            'stay_durations',
            'agents',
            'companies'

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
        $booking = Booking::select('booking_number', 'company_id')->where('id', $application->booking_id)->first();

        return view('admin.application.view-details', compact('application', 'booking'));
    }


    public function edit($id)
    {
        $application = Application::find($id);
        $booking = Booking::select('booking_number', 'company_id')->where('id', $application->booking_id)->first();
        if (auth()->user()->role != "ADMIN" && $booking->company_id != auth()->user()->company_id) {
            $notification = array(
                'message' => 'You do not have access to this record!',
                'alert-type' => 'success'
            );
            return redirect()->route('applications')->with($notification);
        }
        $tickets = Ticket::select('id', 'ticket_type', 'ticket_cost')->get();
        $airports = Airport::select('id', 'airport_name', 'airport_country_code')->get();
        $pk_airports = $airports->where('airport_country_code', 'PK');
        $ksa_airports = $airports->where('airport_country_code', 'KSA');
        $application_additional_facility = ApplicaionAdditionalFacility::where('application_id', $application->id)->first();
        $additional_facilities = AdditionalFacility::all();
        $relationships = app('relationships');

        return view('admin.application.edit', compact(
            'application',
            'tickets',
            'pk_airports',
            'ksa_airports',
            'additional_facilities',
            'relationships',
            'booking',
            'application_additional_facility'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        DB::transaction(function () use ($id, $request) {
            $application = Application::find($id);
            $booking = Booking::where('id', $application->booking_id)->first();
            if (auth()->user()->role != "ADMIN" && $booking->company_id != auth()->user()->company_id) {
                $notification = array(
                    'message' => 'You do not have access to this record!',
                    'alert-type' => 'success'
                );
                return redirect()->route('applications')->with($notification);
            }
            $application->surname = $request->surname ?? "";
            $application->given_name = $request->given_name ?? "";
            $application->father_husband_name = $request->father_husband_name ?? "";
            $application->passport = $request->passport ?? "";
            $application->date_issue = $request->date_issue ?? "";
            $application->date_expiry = $request->date_expiry ?? "";
            $application->date_birth = $request->date_birth ?? "";
            $application->cnic = $request->cnic ?? "";
            $application->blood_group = $request->blood_group ?? "";
            $application->gender = $request->gender;
            $application->fiqah = $request->fiqah ?? "";
            $application->marital_status = $request->marital_status;
            $application->address = $request->address ?? "";
            $application->mobile_number = $request->mobile_number ?? "";
            $application->whatsapp_number = $request->whatsapp_number ?? "";
            $application->mehram_name = $request->mehram_name ?? "";
            $application->mehram_relation = $request->mehram_relation ?? "";
            $application->nominee_name = $request->nominee_name ?? "";
            $application->nominee_relation = $request->nominee_relation ?? "";
            $application->nominee_cnic = $request->nominee_cnic ?? "";
            $application->nominee_mobile = $request->nominee_mobile ?? "";
            $application->qurbani = $request->qurbani ?? "NOT_INCLUDED";
            $application->ticket = $request->ticket ?? "INCLUDED";
            $application->departure_airport_pk_id = $request->departure_airport_pk_id;
            $application->arrival_airport_pk_id = $request->arrival_airport_pk_id;
            $application->departure_airport_ksa_id = $request->departure_airport_ksa_id;
            $application->arrival_airport_ksa_id = $request->arrival_airport_ksa_id;
            $application->arrival_date_ksa = $request->arrival_date_ksa ?? "";
            $application->departure_date_ksa = $request->departure_date_ksa ?? "";


            if ($request->hasfile('attachment_passport')) {
                if ($application->attachment_passport != '') {
                    $old_attachment_passport = explode('/', $application->attachment_passport);
                    unlink(base_path() . "/public/storage/application/" . $application->application_number . "/" . end($old_attachment_passport));
                }
                $application->attachment_passport = '/storage/' . $request->attachment_passport->storeAs('application/' . $request->application_number, 'passport-' . $request->application_number . '.png', 'public');
            }
            if ($request->hasfile('attachment_cnic')) {
                if ($application->attachment_cnic != '') {
                    $old_attachment_cnic = explode('/', $application->attachment_cnic);
                    unlink(base_path() . "/public/storage/application/" . $application->application_number . "/" . end($old_attachment_cnic));
                }
                $application->attachment_cnic = '/storage/' . $request->attachment_cnic->storeAs('application/' . $request->application_number, 'cnic-' . $request->application_number . '.png', 'public');
            }
            if ($request->hasfile('attachment_picture')) {
                if ($application->attachment_picture != '') {
                    $old_attachment_picture = explode('/', $application->attachment_picture);
                    unlink(base_path() . "/public/storage/application/" . $application->application_number . "/" . end($old_attachment_picture));
                }
                $application->attachment_picture = '/storage/' . $request->attachment_picture->storeAs('application/' . $request->application_number, 'picture-' . $request->application_number . '.png', 'public');
            }
            if ($request->hasfile('attachment_medical')) {
                if ($application->attachment_medical != '') {
                    $old_attachment_medical = explode('/', $application->attachment_medical);
                    unlink(base_path() . "/public/storage/application/" . $application->application_number . "/" . end($old_attachment_medical));
                }
                $extension = $request->file('attachment_medical')->extension();
                $application->attachment_medical = '/storage/application/' . $request->attachment_medical->storeAs('application/' . $request->application_number, 'medical-' . $request->application_number . "." . $extension, 'public');
            }
            if ($request->hasfile('attachment_other')) {
                if ($application->attachment_other != '') {
                    $old_attachment_other = explode('/', $application->attachment_other);
                    unlink(base_path() . "/public/storage/application/" . $application->application_number . "/" . end($old_attachment_other));
                }
                $extension = $request->file('attachment_other')->extension();
                $application->attachment_other = '/storage/' . $request->attachment_other->storeAs('application/' . $request->application_number, 'other-' . $request->application_number . "." . $extension, 'public');
            }

            $qurbani_fee = 0;
            $ticket_cost = 0;
            if ($request->qurbani == 'INCLUDED') {
                $other_cost = OtherCost::where('cost_key', 'qurbani_cost')->select('cost')->first();
                $qurbani_fee = $other_cost->cost ?? 0;
            }

            if ($request->ticket == 'NOT_INCLUDED') {
                $ticket_cost = 0;
            }

            if ($booking->package_type == 'CUSTOM') {
                $package = CustomPackage::where('id', $booking->package_id)->first();
            } else {
                $package = Package::where('id', $booking->package_id)->first();
            }


            if ($request->room_sharing == '') {
                $application->makkah_room_sharing = $package->makkah_room_sharing;
                $application->madinah_room_sharing = $package->madinah_room_sharing;

                $cost_per_person = $package->cost_per_person;
            } else {
                $application->makkah_room_sharing = $request->room_sharing;
                $application->madinah_room_sharing = $request->room_sharing;

                $makkah_accommodation = Accomodation::where('id', $package->makkah_accommodation_id)->first();
                $madinah_accommodation = Accomodation::where('id', $package->madinah_accommodation_id)->first();


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

                $cost_with_accomodation = $package->cost_per_person - ($old_madinah_accommodation_cost + $old_makkah_accommodation_cost);
                if ($request->room_sharing == 'TRIPLE') {
                    $makkah_accommodation_cost = $makkah_accommodation->triple_room_cost;
                    $madinah_accommodation_cost = $madinah_accommodation->triple_room_cost;
                } else if ($request->room_sharing == 'DOUBLE') {
                    $makkah_accommodation_cost = $makkah_accommodation->quad_double_cost;
                    $madinah_accommodation_cost = $madinah_accommodation->quad_double_cost;
                } else {
                    $makkah_accommodation_cost = $makkah_accommodation->sharing_room_cost ?? 0;
                    $madinah_accommodation_cost = $madinah_accommodation->sharing_room_cost ?? 0;
                }


                $cost_per_person = $cost_with_accomodation + $makkah_accommodation_cost + $madinah_accommodation_cost;
            }


            $final_cost_per_person = $cost_per_person + $qurbani_fee + $ticket_cost;
            $old_application_cost_per_person = $application->cost_per_person;
            $application->cost_per_person = $final_cost_per_person;

            if ($application->save()) {
                $booking_net_total = $booking->net_total;

                $booking_net_total = $booking_net_total - $old_application_cost_per_person;
                $booking_net_total = $booking_net_total + $final_cost_per_person;

                $booking->net_total = $booking_net_total;
                $booking->grand_total = $booking_net_total;

                $booking->save();
            }
        });

        //setting up success message
        if (DB::transactionLevel() == 0) {
            $notification = array(
                'message' => 'Application data updated successfully!',
                'alert-type' => 'success'
            );
        }
        //setting up error message
        else {
            $notification = array(
                'message' => 'Something went wrong!',
                'alert-type' => 'error'
            );
        }

        //redirecting to the page with notification message
        return redirect()->route('applications')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Application  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Application $application)
    {
        DB::transaction(
            function () use ($application) {
                $old_application_cost_per_person = $application->cost_per_person;
                if ($application->delete()) {
                    $booking = Booking::find($application->booking_id);
                    $booking_net_total = $booking->net_total;
                    $booking_net_total = $booking_net_total - $old_application_cost_per_person;
                    $booking->net_total = $booking_net_total;
                    $booking->grand_total = $booking_net_total;
                    $booking->num_of_hujjaj = $booking->num_of_hujjaj - 1;
                    $booking->save();
                }
            }
        );
        //setting up success message
        if (DB::transactionLevel() == 0) {
            $notification = array(
                'message' => 'Application deleted successfully!',
                'alert-type' => 'success'
            );
        }
        //setting up error message
        else {
            $notification = array(
                'message' => 'Something went wrong!',
                'alert-type' => 'error'
            );
        }

        //redirecting to the page with notification message
        return redirect()->back()->with($notification);
    }
}
