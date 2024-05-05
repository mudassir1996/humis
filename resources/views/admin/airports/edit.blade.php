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
                    <form class="step-2" id="airport-form" method="post" action="{{ route('airports.update', $airport->id) }}">
                        @csrf
                        @method('PATCH')
                        <div id="standard_package">
                            <div class="row">

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label">Airport Name <span class="text-danger">*</span></label>
                                        <input id="airport_name" name="airport_name" value="{{ $airport->airport_name }}"
                                            class="form-control" placeholder="Enter Airport Name" type="text">

                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label">Country Code <span class="text-danger">*</span></label>
                                        <select class="select2-single" name="airport_country_code"
                                            id="airport_country_code">
                                            <option></option>
                                            @foreach ($countries as $key => $value)
                                                <option value="{{ $key }}" {{ $airport->airport_country_code == $key ? 'selected' : '' }}>{{ $value }}</option>
                                            @endforeach
                                            
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
        <script src="{{ asset('assets/vendors/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('assets/js/form-validation.js') }}"></script>
@endsection
