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
                                <h4>Visa/Ticket</h4>
                            </div>
                            {{-- <div class="col-lg-12 text-center">
                                <p>Payment Voucher</p>
                            </div> --}}
                        </div>
                        <div class="row" id="agent-fields">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="control-label">Application No.</label>
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

                        </div>

                        <div class="row my-4">
                            <div class="col-lg-6">
                                <ul class="list-group">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Booking No.
                                        <span>545445</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Surname
                                        <span>ABC</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Given Name
                                        <span>32323323</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-6">
                                <ul class="list-group">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Gender
                                        <span>Male</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Father/Husband Name
                                        <span>ABC</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Passport No.
                                        <span>32323323</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="row" id="agent-fields">

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="control-label">Attachment Ticket</label>
                                    <input type="file" id="otherDropify" class="border" data-max-file-size="500K" />

                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="control-label">Attachment Visa</label>
                                    <input type="file" id="passportDropify" class="border" data-max-file-size="500K" />

                                </div>
                            </div>

                        </div>





                        <div class="row">
                            <div class="col-lg-12 text-right">

                                <button type="submit" class="btn btn-primary">
                                    Submit
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
