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
                                <h4>Aziziyah Hotel Document/Agreement</h4>
                            </div>
                            {{-- <div class="col-lg-12 text-center">
                                <p>Payment Voucher</p>
                            </div> --}}
                        </div>
                        <div class="row" id="agent-fields">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="control-label">Aziziyah Hotel</label>
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
                                    <label class="control-label">Total Number of Hajji</label>
                                    <input id="agent-name" class="form-control" value="200" readonly name="agent-name"
                                        type="text">
                                </div>
                            </div>
                        </div>
                        <div class="row" id="agent-fields">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="control-label">Total Seats Booked</label>
                                    <input id="agent-name" class="form-control" value="200" name="agent-name"
                                        type="text">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="control-label">Attachment</label>
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
