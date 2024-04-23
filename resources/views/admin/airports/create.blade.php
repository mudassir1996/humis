@extends('layouts.app')
@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/vendors/select2/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/dropify/dist/dropify.min.css') }}">
@endsection
@section('content')
    <div class="d-flex justify-content-center align-items-center flex-wrap grid-margin">
        <h4>Add New Airport</h4>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card">
                <div class="card-body">
                    <form class="step-2" method="post" action="{{ route('airports.store') }}">
                        @csrf

                        <div id="standard_package">
                            <div class="row">
                                
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label">Airport Name</label>
                                        <input id="airport_name" name="airport_name" class="form-control"
                                            placeholder="Enter Airport Name" type="text">
                                       
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label">Country Code</label>
                                        <select class="select2-single" name="airport_country_code" id="airport_country_code">
                                            <option></option>
                                            <option value="PK">PK</option>
                                            <option value="KSA">KSA</option>
                                        </select>
                                       
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
    <script src="{{ asset('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/inputmask/jquery.inputmask.min.js') }}"></script>
    <script src="{{ asset('assets/js/datepicker.js') }}"></script>
    <script src="{{ asset('assets/js/inputmask.js') }}"></script>
    <script src="{{ asset('assets/vendors/dropify/dist/dropify.min.js') }}"></script>

    <script src="{{ asset('assets/js/dropify.js') }}"></script>
@endsection