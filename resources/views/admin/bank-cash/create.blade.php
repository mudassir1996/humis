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
                    <form>
                        <div class="row mb-5 justify-content-center align-items-center">
                            <div class="col-lg-12 text-center">
                                <h4>Islamabad Hajj Organizers</h4>
                            </div>
                            <div class="col-lg-12 text-center">
                                <p>Payment Voucher</p>
                            </div>
                        </div>


                        <div class="form-group row align-items-center justify-content-between">
                            <label for="exampleInputUsername2" class="col-sm-7 col-4">Payment Voucher No.</label>
                            <div class="col-sm-5 col-8">
                                <input type="number"   class="form-control" id="exampleInputUsername2"
                                    value="3323">
                            </div>
                        </div>
                        <div class="form-group row align-items-center justify-content-between">
                            <label for="exampleInputUsername2" class="col-sm-7 col-4">Date</label>
                            <div class="col-sm-5 col-8">
                                <div class="input-group date datepicker" id="datePickerIssueDate">
                                    <input type="text" class="form-control"><span class="input-group-addon"><i
                                            data-feather="calendar"></i></span>
                                </div>
                            </div>
                        </div>



                        <div class="row pb-4 justify-content-center">
                            <div class="col-md-12">
                               
                                <div class="form-group row align-items-center justify-content-between">
                                    <label for="exampleInputUsername2" class="col-sm-7 col-4">Payment Nature</label>
                                    <div class="col-sm-5 col-8">
                                        <input type="number"   class="form-control" id="exampleInputUsername2"
                                            value="3323">
                                    </div>
                                </div>
                                <div class="form-group row align-items-center justify-content-between">
                                    <label for="exampleInputUsername2" class="col-sm-7 col-4">Service/Product</label>
                                    <div class="col-sm-5 col-8">
                                        <input type="number"   class="form-control" id="exampleInputUsername2"
                                            value="3323">
                                    </div>
                                </div>
                                <div class="form-group row align-items-center justify-content-between">
                                    <label for="exampleInputUsername2" class="col-sm-7 col-4">Vendor</label>
                                    <div class="col-sm-5 col-8">
                                        <input type="number"   class="form-control" id="exampleInputUsername2"
                                            value="3323">
                                    </div>
                                </div>
                                <div class="form-group row align-items-center justify-content-between">
                                    <label for="exampleInputUsername2" class="col-sm-7 col-4">Payment Mode</label>
                                    <div class="col-sm-5 col-8">
                                        <input type="number"   class="form-control" id="exampleInputUsername2"
                                            value="3323">
                                    </div>
                                </div>
                                <div class="form-group row align-items-center justify-content-between">
                                    <label for="exampleInputUsername2" class="col-sm-7 col-4">Bank Details</label>
                                    <div class="col-sm-5 col-8">
                                        <input type="number"   class="form-control" id="exampleInputUsername2"
                                            value="3323">
                                    </div>
                                </div>
                                <div class="form-group row align-items-center justify-content-between">
                                    <label for="exampleInputUsername2" class="col-sm-7 col-4">Amount</label>
                                    <div class="col-sm-5 col-8">
                                        <input type="number"   class="form-control" id="exampleInputUsername2"
                                            value="3323">
                                    </div>
                                </div>
                                <h5 class="pb-4">Amount In words here</h5>

                                  <div class="form-group row align-items-center justify-content-between">
                                    <label for="exampleInputUsername2" class="col-sm-7 col-4">Paying Officer</label>
                                    <div class="col-sm-5 col-8">
                                        <input type="number"   class="form-control" id="exampleInputUsername2"
                                            value="3323">
                                    </div>
                                </div>

                                <div class="form-group row align-items-center justify-content-between">
                                   <div class="col-lg-12">
                                     <label for="exampleInputUsername2" >Other Detail</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                   </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="control-label">Attachment</label>
                                            <input type="file" id="passportDropify" class="border"
                                                data-max-file-size="500K" />

                                        </div>
                                    </div>

                                </div>


                                {{-- <h4 class="mb-3">Payment Details</h4>
                                <div class="form-group row align-items-center justify-content-between">
                                    <label for="exampleInputUsername2" class="col-sm-7 col-4">Payment Mode</label>
                                    <div class="col-sm-5 col-8">
                                        <select class="select2-single">
                                            <option></option>
                                            <option value="TX">Texas</option>
                                            <option value="NY">New York</option>
                                            <option value="FL">Florida</option>
                                            <option value="KN">Kansas</option>
                                            <option value="HW">Hawaii</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row align-items-center justify-content-between">
                                    <label for="exampleInputUsername2" class="col-sm-7 col-4">Bank Account</label>
                                    <div class="col-sm-5 col-8">
                                        <select class="select2-single">
                                            <option></option>
                                            <option value="TX">Texas</option>
                                            <option value="NY">New York</option>
                                            <option value="FL">Florida</option>
                                            <option value="KN">Kansas</option>
                                            <option value="HW">Hawaii</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row align-items-center justify-content-between">
                                    <label for="exampleInputUsername2" class="col-sm-7 col-4">Check No.</label>
                                    <div class="col-sm-5 col-8">
                                        <input type="number" class="form-control" id="exampleInputUsername2"
                                            placeholder="Enter Check No.">
                                    </div>
                                </div>
                                <div class="form-group row align-items-center justify-content-between">
                                    <label for="exampleInputUsername2" class="col-sm-7 col-4">Amount</label>
                                    <div class="col-sm-5 col-8">
                                        <input type="number" class="form-control" id="exampleInputUsername2"
                                            placeholder="Enter Amount">
                                    </div>
                                </div> --}}
                                {{-- <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="control-label">Payment Mode</label>
                                            <select class="select2-single">
                                                <option></option>
                                                <option value="TX">Texas</option>
                                                <option value="NY">New York</option>
                                                <option value="FL">Florida</option>
                                                <option value="KN">Kansas</option>
                                                <option value="HW">Hawaii</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="control-label">Bank Account</label>
                                            <select class="select2-single">
                                                <option></option>
                                                <option value="TX">Texas</option>
                                                <option value="NY">New York</option>
                                                <option value="FL">Florida</option>
                                                <option value="KN">Kansas</option>
                                                <option value="HW">Hawaii</option>
                                            </select>
                                        </div>
                                    </div>
                                </div> --}}
                                {{-- <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="control-label">Check No.</label>
                                            <input type="number" class="form-control" id="exampleInputUsername2"
                                                placeholder="Enter Check No.">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="control-label">Amount</label>
                                            <input type="number" class="form-control" id="exampleInputUsername2"
                                                placeholder="Enter Amount">
                                        </div>
                                    </div>
                                </div> --}}
                                {{-- <h5 class="pb-4">Amount In words here</h5>

                                <div class="form-group row align-items-center justify-content-between">
                                    <label for="exampleInputUsername2" class="col-sm-7 col-4">Balance Amount</label>
                                    <div class="col-sm-5 col-8 text-right">
                                        <h6>12,000,000</h6>


                                    </div>
                                </div>
                                <div class="form-group row align-items-center justify-content-between">
                                    <label for="exampleInputUsername2" class="col-sm-7 col-4">Recieving Officer</label>
                                    <div class="col-sm-5 col-8 ">
                                        <input type="text" class="form-control" id="exampleInputUsername2"
                                            placeholder="Enter Name">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="control-label">Attachment</label>
                                            <input type="file" id="passportDropify" class="border"
                                                data-max-file-size="500K" />

                                        </div>
                                    </div>

                                </div> --}}


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
@endsection
