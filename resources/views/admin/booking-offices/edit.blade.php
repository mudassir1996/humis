@extends('layouts.app')
@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/vendors/select2/select2.min.css') }}">
@endsection
@section('content')
    <div class="d-flex justify-content-center align-items-center flex-wrap grid-margin">
        <h4>Add New Booking Office</h4>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card">
                <div class="card-body">
                    <form class="step-2" method="post"  id="booking-office-form" action="{{ route('booking-offices.update',$booking_office->id) }}">
                        @csrf
                        @method('PATCH')
                        <div id="standard_package">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="control-label">Company <span class="text-danger">*</span></label>
                                        <select class="select2-single" id="company_id" name="company_id">
                                            <option></option>
                                            @foreach ($companies as $company)
                                                <option value="{{ $company->id }}" {{$booking_office->company_id==$company->id?"selected":""}}>
                                                    {{ $company->company_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="control-label">Office Name <span class="text-danger">*</span></label>
                                        <input id="booking_office_name" name="booking_office_name" value="{{$booking_office->booking_office_name}}" class="form-control"
                                            placeholder="Enter Office Name" type="text">
                                       
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="control-label">Office Number <span class="text-danger">*</span></label>
                                        <input id="booking_office_number" class="form-control" value="{{$booking_office->booking_office_number}}" placeholder="Enter Contact Number"
                                            name="booking_office_number" type="text" data-inputmask-alias="+999999999999">
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="control-label">Office Address <span class="text-danger">*</span></label>
                                        <textarea class="form-control" name="booking_office_address"  placeholder="Enter Office Address" rows="2">{{$booking_office->booking_office_address}}</textarea>
                                    </div>
                                </div>
                                

                            </div>

                        </div>

                        <div class="row">
                            <div class="col-lg-12 text-right">

                                <button type="submit" class="btn btn-primary">
                                    Save
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
    <script src="{{ asset('assets/vendors/inputmask/jquery.inputmask.min.js') }}"></script>
    <script src="{{ asset('assets/js/inputmask.js') }}"></script>
    <script src="{{ asset('assets/vendors/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('assets/js/form-validation.js') }}"></script>
@endsection

