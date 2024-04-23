<?php

namespace App\Http\Controllers;

use App\Models\Accomodation;
use App\Models\AccomodationDocument;
use App\Models\Application;
use App\Models\ApplicationDocument;
use App\Models\Booking;
use App\Models\CustomPackage;
use App\Models\MaktabCategory;
use App\Models\MaktabDocument;
use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function maktab_documents()
    {
        $maktab_categories = MaktabCategory::all();
        return view('admin.documents.maktab-documents',compact('maktab_categories'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function maktab_documents_store(Request $request)
    {
        Validator::make($request->all(), [
            'maktab_category_id' => 'required',
            'booked_seats' => 'required',
            'attachment' => 'required',
        ]);

        $maktab_document = new MaktabDocument();
        $maktab_document->maktab_category_id = $request->maktab_category_id;
        $maktab_document->booked_seats = $request->booked_seats;

        if ($request->hasfile('attachment')) {

            $extension = $request->file('attachment')->extension();
            $maktab_document->attachment = '/storage/' . $request->attachment->storeAs('maktab/' . $maktab_document->maktab_category_id, 'maktab-' . $maktab_document->maktab_category_id . "." . $extension, 'public');
        }
        $maktab_document->created_by = auth()->user()->id;


        if ($maktab_document->save()) {
            $notification = array(
                'message' => 'Document Added Successfully!',
                'alert-type' => 'success'
            );
        } else {
            $notification = array(
                'message' => 'Something Went Wrong!',
                'alert-type' => 'error'
            );
        }
        return redirect()->route('maktab-documents')->with($notification);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function makkah_hotel_documents()
    {
        $makkah_accommodation_documents = AccomodationDocument::where('company_id',auth()->user()->company_id)->pluck('accomodation_id');
        $makkah_accommodations = Accomodation::where('accomodation_type','MAKKAH')->whereNotIn('id', $makkah_accommodation_documents)->get();
        return view('admin.documents.makkah-hotel-documents',compact('makkah_accommodations'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function makkah_hotel_document_store(Request $request)
    {
        Validator::make($request->all(), [
            'accomodation_id' => 'required',
            'double_capacity' => 'required',
            'triple_capacity' => 'required',
            'quad_capacity' => 'required',
            'five_capacity' => 'required',
            'six_capacity' => 'required',
        ]);

        $makkah_accommodation_capacity = new AccomodationDocument();
        $makkah_accommodation_capacity->accomodation_id = $request->accomodation_id;
        $makkah_accommodation_capacity->accomodation_type = "MAKKAH";
        $makkah_accommodation_capacity->double_capacity = $request->double_capacity;
        $makkah_accommodation_capacity->triple_capacity = $request->triple_capacity;
        $makkah_accommodation_capacity->quad_capacity = $request->quad_capacity;
        $makkah_accommodation_capacity->five_capacity = $request->five_capacity;
        $makkah_accommodation_capacity->six_capacity = $request->six_capacity;

        if ($request->hasfile('attachment')) {

            $extension = $request->file('attachment')->extension();
            $makkah_accommodation_capacity->attachment = '/storage/' . $request->attachment->storeAs('makkah-hotel/' . $makkah_accommodation_capacity->accomodation_id, 'makkah-hotel' . $makkah_accommodation_capacity->accomodation_id . "." . $extension, 'public');
        }else{
            $makkah_accommodation_capacity->attachment="";
        }
        $makkah_accommodation_capacity->company_id = auth()->user()->company_id;
        $makkah_accommodation_capacity->created_by = auth()->user()->id;


        if ($makkah_accommodation_capacity->save()) {
            $notification = array(
                'message' => 'Makkah Accomodation Capacity Added Successfully!',
                'alert-type' => 'success'
            );
        } else {
            $notification = array(
                'message' => 'Something Went Wrong!',
                'alert-type' => 'error'
            );
        }
        return redirect()->route('makkah-hotel-documents')->with($notification);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function madinah_hotel_documents()
    {
        $madinah_accommodation_documents = AccomodationDocument::where('company_id', auth()->user()->company_id)->pluck('accomodation_id');
        $madinah_accommodations = Accomodation::where('accomodation_type', 'MADINAH')->whereNotIn('id', $madinah_accommodation_documents)->get();
        return view('admin.documents.madinah-hotel-documents', compact('madinah_accommodations'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function madinah_hotel_document_store(Request $request)
    {
        Validator::make($request->all(), [
            'accomodation_id' => 'required',
            'double_capacity' => 'required',
            'triple_capacity' => 'required',
            'quad_capacity' => 'required',
            'five_capacity' => 'required',
            'six_capacity' => 'required',
        ]);

        $madinah_accommodation_capacity = new AccomodationDocument();
        $madinah_accommodation_capacity->accomodation_id = $request->accomodation_id;
        $madinah_accommodation_capacity->accomodation_type = "MADINAH";
        $madinah_accommodation_capacity->double_capacity = $request->double_capacity;
        $madinah_accommodation_capacity->triple_capacity = $request->triple_capacity;
        $madinah_accommodation_capacity->quad_capacity = $request->quad_capacity;
        $madinah_accommodation_capacity->five_capacity = $request->five_capacity;
        $madinah_accommodation_capacity->six_capacity = $request->six_capacity;

        if ($request->hasfile('attachment')) {

            $extension = $request->file('attachment')->extension();
            $madinah_accommodation_capacity->attachment = '/storage/' . $request->attachment->storeAs('madinah-hotel/' . $madinah_accommodation_capacity->accomodation_id, 'madinah-hotel' . $madinah_accommodation_capacity->accomodation_id . "." . $extension, 'public');
        } else {
            $madinah_accommodation_capacity->attachment = "";
        }
        $madinah_accommodation_capacity->company_id = auth()->user()->company_id;
        $madinah_accommodation_capacity->created_by = auth()->user()->id;


        if ($madinah_accommodation_capacity->save()) {
            $notification = array(
                'message' => 'Madinah Accomodation Capacity Added Successfully!',
                'alert-type' => 'success'
            );
        } else {
            $notification = array(
                'message' => 'Something Went Wrong!',
                'alert-type' => 'error'
            );
        }
        return redirect()->route('madinah-hotel-documents')->with($notification);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function aziziyah_hotel_documents()
    {
        $aziziyah_accommodation_documents = AccomodationDocument::where('company_id', auth()->user()->company_id)->pluck('accomodation_id');
        $aziziyah_accommodations = Accomodation::where('accomodation_type', 'AZIZIYAH')->whereNotIn('id', $aziziyah_accommodation_documents)->get();
        return view('admin.documents.aziziyah-hotel-documents', compact('aziziyah_accommodations'));

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function aziziyah_hotel_document_store(Request $request)
    {
        Validator::make($request->all(), [
            'accomodation_id' => 'required',
            'double_capacity' => 'required',
            'triple_capacity' => 'required',
            'quad_capacity' => 'required',
            'five_capacity' => 'required',
            'six_capacity' => 'required',
        ]);

        $aziziyah_accommodation_capacity = new AccomodationDocument();
        $aziziyah_accommodation_capacity->accomodation_id = $request->accomodation_id;
        $aziziyah_accommodation_capacity->accomodation_type = "AZIZIYAH";
        $aziziyah_accommodation_capacity->double_capacity = $request->double_capacity;
        $aziziyah_accommodation_capacity->triple_capacity = $request->triple_capacity;
        $aziziyah_accommodation_capacity->quad_capacity = $request->quad_capacity;
        $aziziyah_accommodation_capacity->five_capacity = $request->five_capacity;
        $aziziyah_accommodation_capacity->six_capacity = $request->six_capacity;

        if ($request->hasfile('attachment')) {

            $extension = $request->file('attachment')->extension();
            $aziziyah_accommodation_capacity->attachment = '/storage/' . $request->attachment->storeAs('aziziyah-hotel/' . $aziziyah_accommodation_capacity->accomodation_id, 'aziziyah-hotel' . $aziziyah_accommodation_capacity->accomodation_id . "." . $extension, 'public');
        } else {
            $aziziyah_accommodation_capacity->attachment = "";
        }
        $aziziyah_accommodation_capacity->company_id = auth()->user()->company_id;
        $aziziyah_accommodation_capacity->created_by = auth()->user()->id;


        if ($aziziyah_accommodation_capacity->save()) {
            $notification = array(
                'message' => 'Aziziyah Accomodation Capacity Added Successfully!',
                'alert-type' => 'success'
            );
        } else {
            $notification = array(
                'message' => 'Something Went Wrong!',
                'alert-type' => 'error'
            );
        }
        return redirect()->route('aziziyah-hotel-documents')->with($notification);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function visa_ticket(Request $request)
    {
        $application = Application::where('applications.id', $request->application_id)->select('applications.application_number', 'applications.given_name', 'applications.surname', 'applications.gender', 'applications.passport', 'applications.father_husband_name','bookings.booking_number','applications.document_ticket', 'applications.document_visa')->leftJoin('bookings', 'bookings.id', 'applications.booking_id')->first();
        // dd($application);
        return view('admin.documents.visa-ticket', compact('application'));
    }
    public function visa_ticket_store(Request $request)
    {
        $application = Application::where('id',$request->application_id)->first();
        if ($request->hasfile('ticket')) {
            if ($application->document_ticket != '') {
                $old_document_ticket = explode('/', $application->document_ticket);
                unlink(base_path() . "/storage/app/public/application/". $application->application_number."/". end($old_document_ticket));
            }
            $extension = $request->file('ticket')->extension();
            $application->document_ticket = '/storage/' . $request->ticket->storeAs('application/' . $application->application_number, 'ticket-' . $application->application_number . "." . $extension, 'public');
        }
        if ($request->hasfile('visa')) {

            if($application->document_visa!=''){
                $old_document_visa = explode('/', $application->document_visa);
                unlink(base_path() . "/storage/app/public/application/". $application->application_number . "/" . end($old_document_visa));
            }
            $extension = $request->file('visa')->extension();
            $application->document_visa = '/storage/' . $request->visa->storeAs('application/' . $application->application_number, 'visa-' . $application->application_number . "." . $extension, 'public');
        }

        $application->save();

        return redirect()->route('applications');
    }
}
