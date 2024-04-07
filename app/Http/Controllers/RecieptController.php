<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Booking;
use App\Models\RecieptVoucher;
use Illuminate\Http\Request;

class RecieptController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookings = Booking::select('id', 'booking_number', 'contact_name', 'contact_mobile', 'grand_total as total_receivable','num_of_hujjaj')->get();
        $total_paid = 0;
        foreach ($bookings as $booking) {
            $total_paid = RecieptVoucher::where("booking_id", $booking->id)->sum('amount');
            $booking->amount_received = $total_paid;
            $booking->balance_receivable = $booking->total_receivable - $total_paid;
        }

        return view('admin.reciept.index', compact('bookings'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function view_details(Request $request)
    {
        $booking = Booking::select('id', 'booking_number', 'contact_name', 'contact_mobile', 'grand_total as total_receivable')->where('id', $request->booking_id)->first();
        $total_paid = RecieptVoucher::where("booking_id", $booking->id)->sum('amount');
        $booking->amount_received = $total_paid;
        $booking->balance_receivable = $booking->total_receivable - $total_paid;
        $reciept_vouchers = RecieptVoucher::where("booking_id", $booking->id)->get();


        return view('admin.reciept.view-details',compact('booking', 'reciept_vouchers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $booking_id = $request->booking_id;

        $booking = Booking::where("bookings.id", $booking_id)->select('bookings.booking_number', 'bookings.contact_name', 'bookings.contact_surname', 'grand_total')->first();
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
        $reciept_voucher->amount_in_words = "";
        $reciept_voucher->transaction_charges = $request->transaction_charges ?? 0;
        $reciept_voucher->reciever_name = $request->reciever_name;

        if ($request->hasfile('attachment')) {
            $extension = $request->file('attachment')->extension();
            $reciept_voucher->attachment = '/storage/' . $request->attachment->storeAs('reciept/' . $request->reciept_number, 'reciept-' . $request->reciept_number .  $extension, 'public');
        } else {
            $reciept_voucher->attachment = '';
        }
        $reciept_voucher->created_by = auth()->user()->id;


        if ($reciept_voucher->save()) {
            return redirect()->route('reciepts.index');
        }
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
