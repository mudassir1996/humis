@extends('layouts.app')
@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/vendors/select2/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/dropify/dist/dropify.min.css') }}">
@endsection
@section('content')
    <div class="row justify-content-center" id="reciept-voucher">
        <div class="col-lg-10">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('reciepts.store')}}" method="post">
                        @csrf
                        <div class="row mb-5 justify-content-center align-items-center">
                            <div class="col-lg-12 text-center">
                                <h4>{{env('COMPANY_NAME')}}</h4>
                            </div>
                            <div class="col-lg-12 text-center">
                                <p>Reciept Voucher</p>
                            </div>
                        </div>
                        <div class="form-group row align-items-center justify-content-between">
                            <label for="exampleInputUsername2" class="col-sm-7 col-4">Booking No.</label>
                            <div class="col-sm-5 col-8">
                                <input type="number" readonly class="form-control" id="exampleInputUsername2"
                                    value="{{ $booking->booking_number }}">
                                <input type="hidden" name="booking_id" value="{{ $booking_id }}">
                            </div>
                        </div>
                        <div class="form-group row align-items-center justify-content-between">
                            <label for="exampleInputUsername2" class="col-sm-7 col-4">Reciept No.</label>
                            <div class="col-sm-5 col-8">
                                <input type="number" readonly class="form-control" name="reciept_number"
                                    id="exampleInputUsername2" value="{{ time() }}">
                            </div>
                        </div>
                        <div class="form-group row align-items-center justify-content-between">
                            <label for="exampleInputUsername2" class="col-sm-7 col-4">Date</label>
                            <div class="col-sm-5 col-8">
                                <div class="input-group date datepicker" id="datePickerIssueDate">
                                    <input type="text" name="reciept_date" class="form-control"><span
                                        class="input-group-addon"><i data-feather="calendar"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row align-items-center justify-content-between">
                            <label for="exampleInputUsername2" class="col-sm-7 col-4">Contact Name</label>
                            <div class="col-sm-5 col-8">
                                <input type="text" class="form-control" readonly id="exampleInputUsername2"
                                    value="{{ $booking->contact_name . ' ' . $booking->contact_surname }}">
                            </div>
                        </div>


                        <div class="row py-3">
                            <div class="col-lg-12">
                                <table class="table table-bordered">
                                    <thead>
                                        <th>Application No.</th>
                                        <th>Haji Name</th>
                                        <th>Passport No.</th>
                                        <th>Package Amount</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($applications as $application)
                                            <tr>
                                                <td>{{ $application->application_number }}</td>
                                                <td>{{ $application->given_name . ' ' . $application->surname }}</td>
                                                <td>{{ $application->passport }}</td>
                                                <td>{{$booking->currency}} {{ number_format($application->cost_per_person) }}</td>
                                            </tr>
                                        @endforeach
                                        <tr class="bg-light">
                                            <td colspan="3">Total Package Amount</td>
                                            <td>{{$booking->currency}} {{ number_format($total_bill) }}</td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="row pb-4 justify-content-center">
                            <div class="col-md-12">


                                <h4 class="my-3">Payment Details</h4>
                                <div class="form-group row align-items-center justify-content-between">
                                    <label for="exampleInputUsername2" class="col-sm-7 col-4">Payment
                                        Mode</label>
                                    <div class="col-sm-5 col-8">
                                        <select class="select2-single" name="payment_mode">
                                            <option></option>
                                            <option value="online">Online</option>
                                            <option value="cash">Cash</option>
                                            <option value="deposit">Deposit</option>
                                            <option value="cheque">Cheque</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row align-items-center justify-content-between">
                                    <label for="exampleInputUsername2" class="col-sm-7 col-4">Bank Account</label>
                                    <div class="col-sm-5 col-8">
                                        <input type="text" class="form-control" name="bank_account"
                                            placeholder="Enter Bank Account" id="exampleInputUsername2">
                                    </div>
                                </div>
                                <div class="form-group row align-items-center justify-content-between">
                                    <label for="exampleInputUsername2" class="col-sm-7 col-4">Check No.</label>
                                    <div class="col-sm-5 col-8">
                                        <input type="number" name="check_num" class="form-control"
                                            id="exampleInputUsername2" placeholder="Enter Check No.">
                                    </div>
                                </div>
                                <div class="form-group row align-items-center justify-content-between">
                                    <label for="exampleInputUsername2" class="col-sm-7 col-4">Amount</label>
                                    <div class="col-sm-5 col-8">
                                        <input type="number" name="amount" class="form-control" id="amount"
                                            placeholder="Enter Amount">
                                    </div>
                                </div>

                                <h5 class="pb-4">Amount In words: <span id="amount_in_words"
                                        style="text-transform: capitalize"></span></h5>

                                <div class="form-group row align-items-center justify-content-between">
                                    <label for="exampleInputUsername2" class="col-sm-7 col-4">Trasaction Charges</label>
                                    <div class="col-sm-5 col-8">
                                        <input type="number" name="transaction_charges" class="form-control" id="transaction_charges"
                                            placeholder="Enter Trasaction Charges">
                                    </div>
                                </div>
                                <div class="form-group row align-items-center justify-content-between">
                                    <label for="exampleInputUsername2" class="col-sm-7 col-4">Balance Amount</label>
                                    <div class="col-sm-5 col-8 text-right">
                                        <h6 >{{$booking->currency}} <span id="balance_amount">{{ $balance_amount }}</span></h6>
                                        {{-- <input type="number" class="form-control" id="exampleInputUsername2"
                                            placeholder="Enter Discount"> --}}

                                    </div>
                                </div>
                                <div class="form-group row align-items-center justify-content-between">
                                    <label for="exampleInputUsername2" class="col-sm-7 col-4">Recieving Officer</label>
                                    <div class="col-sm-5 col-8 ">
                                        <input type="text" class="form-control" name="reciever_name"
                                            id="exampleInputUsername2" placeholder="Enter Name">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="control-label">Attachment</label>
                                            <input type="file" id="passportDropify" name="attachment" class="border"
                                                data-max-file-size="500K" />
                                            {{-- data-default-file="https://png.pngtree.com/png-vector/20220709/ourmid/pngtree-businessman-user-avatar-wearing-suit-with-red-tie-png-image_5809521.png" --}}
                                            {{-- data-allowed-file-extensions="png jpg" --}}
                                        </div>
                                    </div>

                                </div>


                                {{-- <div class="table-responsive">
                                    <table class="table total-table">
                                        <tbody>
                                            <tr class="bg-light">
                                                <td class="text-bold-800">
                                                    <h5>Total</h5>
                                                </td>
                                                <td class="text-bold-800 text-right">
                                                    <h5>PKR 12,000.00</h5>
                                                    <input type="hidden" id="total" />
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div> --}}
                            </div>
                        </div>



                        <div class="row">
                            <div class="col-lg-12 text-right">

                                <button type="submit" class="btn btn-primary">
                                    Proceed
                                </button>
                                <button type="button" onclick="window.print()" class="btn btn-primary">
                                    Print
                                </button>

                            </div>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/vendors/select2/select2.min.js') }}"></script>
    <script src="{{ asset('assets/js/select2.js') }}"></script>
    <script src="{{ asset('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/inputmask/jquery.inputmask.min.js') }}"></script>
    <script src="{{ asset('assets/js/datepicker.js') }}"></script>
    <script src="{{ asset('assets/js/inputmask.js') }}"></script>
    <script src="{{ asset('assets/vendors/dropify/dist/dropify.min.js') }}"></script>

    <script src="{{ asset('assets/js/dropify.js') }}"></script>
    <script src="{{ asset('assets/js/num2word.js') }}"></script>

    <script>
        $('#amount').on('keyup', function() {
            let amount = $(this).val();
            let total_bill = parseInt("{{ $total_bill }}");
            if (amount == '') {
                $("#amount_in_words").text("");
            } else {

                if (amount <= total_bill) {
                    $("#amount_in_words").text(toWords(amount));
                    $("#balance_amount").text(total_bill - amount);
                }else{
                    alert("Invalid Amount");
                    $(this).val("");
                    $(this).trigger('keyup');
                    return;
                
                }

            }
        })
    </script>
@endsection
