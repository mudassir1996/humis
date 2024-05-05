<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Application;
use App\Models\Booking;
use App\Models\Company;
use App\Models\RecieptVoucher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecieptController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->role=="ADMIN"){
            $bookings = Booking::filterReciept()->select('bookings.id', 'companies.company_name','booking_number', 'contact_name', 'contact_surname','contact_mobile', 'grand_total as total_receivable', 'num_of_hujjaj','agents.agent_name','bookings.currency')->leftJoin('companies', 'companies.id', 'bookings.company_id')->leftJoin('agents', 'bookings.agent_id', 'agents.id')->get();
            $companies=Company::all();
            $agents=Agent::all();
        }else{
            $agents=Agent::where('company_id', auth()->user()->company_id)->get();
            $companies = Company::where('id', auth()->user()->company_id)->get();
            $bookings = Booking::filterReciept()->select('bookings.id', 'companies.company_name','booking_number', 'contact_name', 'contact_surname','contact_mobile', 'grand_total as total_receivable', 'num_of_hujjaj','agents.agent_name','bookings.currency')->leftJoin('companies', 'companies.id', 'bookings.company_id')->where('company_id', auth()->user()->company_id)->leftJoin('agents', 'bookings.agent_id', 'agents.id')->get();

        }
        $booking_ids = $bookings->pluck('id');
        $reciept_vouchers=RecieptVoucher::whereIn("booking_id", $booking_ids)->get();

        $pkr_booking_ids = $bookings->where('currency','PKR')->pluck('id');
        $usd_booking_ids = $bookings->where('currency','$')->pluck('id');
        $aed_booking_ids = $bookings->where('currency','AED')->pluck('id');
   
        $pkr_total_receivable = $bookings->where('currency', 'PKR')->sum('total_receivable');
        $usd_total_receivable = $bookings->where('currency', '$')->sum('total_receivable');
        $aed_total_receivable = $bookings->where('currency', 'AED')->sum('total_receivable');

        $pkr_total_received = $reciept_vouchers->whereIn("booking_id", $pkr_booking_ids)->sum('amount');
        $usd_total_received = $reciept_vouchers->whereIn("booking_id", $usd_booking_ids)->sum('amount');
        $aed_total_received = $reciept_vouchers->whereIn("booking_id", $aed_booking_ids)->sum('amount');

        $pkr_total_balance_receivable = $pkr_total_receivable - $pkr_total_received;
        $usd_total_balance_receivable = $usd_total_receivable - $usd_total_received;
        $aed_total_balance_receivable = $aed_total_receivable - $aed_total_received;

        $total_calculations=[
            "pkr_total_receivable"=> $pkr_total_receivable,
            "usd_total_receivable"=> $usd_total_receivable,
            "aed_total_receivable"=> $aed_total_receivable,

            "pkr_total_received"=> $pkr_total_received,
            "usd_total_received"=> $usd_total_received,
            "aed_total_received"=> $aed_total_receivable,

            "pkr_total_balance_receivable"=> $pkr_total_balance_receivable,
            "usd_total_balance_receivable"=> $usd_total_balance_receivable,
            "aed_total_balance_receivable"=> $aed_total_balance_receivable,
        ];

        foreach ($bookings as $booking) {
            $total_paid = 0;

            $total_paid = $reciept_vouchers->where("booking_id", $booking->id)->sum('amount');
            $booking->amount_received = $total_paid;
            $booking->balance_receivable = $booking->total_receivable - $total_paid;
        }

        return view('admin.reciept.index', compact('bookings', 'companies','agents', 'total_calculations'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function view_details(Request $request)
    {
        $booking = Booking::select('bookings.id', 'booking_number', 'contact_name', 'contact_surname','contact_mobile', 'grand_total as total_receivable', 'agents.agent_name', 'bookings.currency')->where('bookings.id', $request->booking_id)->leftJoin('agents', 'bookings.agent_id', 'agents.id')->first();
        $total_paid = RecieptVoucher::where("booking_id", $booking->id)->sum('amount');
        $booking->amount_received = $total_paid;
        $booking->balance_receivable = $booking->total_receivable - $total_paid;
        $reciept_vouchers = RecieptVoucher::where("booking_id", $booking->id)->get();
        $applications = Application::where('applications.booking_id', $booking->id)->select('applications.application_number', 'applications.given_name', 'applications.surname', 'applications.cost_per_person', 'applications.passport')->get();
        $total_bill = $booking->total_receivable;

        return view('admin.reciept.view-details',compact('booking', 'reciept_vouchers', 'applications', 'total_bill'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $booking_id = $request->booking_id;
        $booking = Booking::where("bookings.id", $booking_id)->select('bookings.booking_number', 'bookings.contact_name', 'bookings.contact_surname', 'grand_total','bookings.currency')->first();
        $applications = Application::where('applications.booking_id', $booking_id)->select('applications.application_number', 'applications.given_name', 'applications.surname', 'applications.cost_per_person', 'applications.passport')->get();
        $total_bill = $booking->grand_total;
        $total_paid = RecieptVoucher::where("booking_id", $booking_id)->sum('amount');
        $balance_amount = $total_bill - $total_paid;
        return view('admin.reciept.create', compact('booking', 'booking_id', 'applications', 'total_bill', 'total_paid', 'balance_amount'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $reciept_voucher = new RecieptVoucher();
        $reciept_voucher->booking_id = $request->booking_id;
        $reciept_voucher->reciept_number = $request->reciept_number;
        $reciept_voucher->reciept_date = $request->reciept_date;
        $reciept_voucher->payment_mode = $request->payment_mode;
        $reciept_voucher->bank_account = $request->bank_account ?? "";
        $reciept_voucher->check_num = $request->check_num ?? "";
        $reciept_voucher->amount = $request->amount;
        $reciept_voucher->amount_in_words = $request->amount_in_words;
        $reciept_voucher->transaction_charges = $request->transaction_charges ?? 0;
        $reciept_voucher->reciever_name = $request->reciever_name;

        if ($request->hasfile('attachment')) {
            $extension = $request->file('attachment')->extension();
            $reciept_voucher->attachment = '/storage/' . $request->attachment->storeAs('reciept/' . $request->reciept_number, 'reciept-' . $request->reciept_number .  $extension, 'public');
        } else {
            $reciept_voucher->attachment = '';
        }
        $reciept_voucher->created_by = auth()->user()->id;

        //setting up success message
        if ($reciept_voucher->save()) {
            $notification = array(
                'message' => 'Reciept Added successfully!',
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
        return redirect()->route('view-reciept-details', ['booking_id' => $request->booking_id])->with($notification);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        dd("dsd");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
