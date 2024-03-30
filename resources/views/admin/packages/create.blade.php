@extends('layouts.app')
@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/vendors/select2/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/dropify/dist/dropify.min.css') }}">
@endsection
@section('content')
<div class="d-flex justify-content-center align-items-center flex-wrap grid-margin">
        <h4>Create New Package</h4>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card">
                <div class="card-body">
                    <form class="step-2">
                        @csrf
                       
                        <div id="standard_package">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label">Maktab Category</label>
                                        <select class="select2-single" id="maktab_category">
                                            <option></option>
                                            @foreach ($maktab_categories as $maktab_category)
                                                <option value="{{ $maktab_category->id }}">
                                                    {{ $maktab_category->maktab_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label">Duration of Stay</label>
                                        <select class="select2-single" id="duration_of_stay" name="duration_of_stay">
                                            <option></option>
                                            <option value="10 Days">10 Days</option>
                                            <option value="12 Days">12 Days</option>
                                            <option value="14-16 Days">14-16 Days</option>
                                            <option value="14-18 Days">14-18 Days</option>
                                            <option value="18-22 Days">18-22 Days</option>
                                            <option value="22-25 Days">22-25 Days</option>
                                            <option value="28-32 Days">28-32 Days</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label">Nature</label>
                                        <select class="select2-single" id="nature">
                                            <option></option>
                                            <option value="FIX">Fix</option>
                                            <option value="SHIFTING">Shifting</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label">Aziziah Accomodation</label>
                                        <select class="select2-single" id="aziziya_accommodation_id">
                                            <option></option>
                                            @foreach ($aziziyah_accomodations as $aziziyah_accomodation)
                                                <option value="{{ $aziziyah_accomodation->id }}">
                                                    {{ $aziziyah_accomodation->hotel_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label">Makkah Accomodation</label>
                                        <select class="select2-single" id="makkah_accommodation_id">
                                            <option></option>
                                            @foreach ($makkah_accomodations as $makkah_accomodation)
                                                <option value="{{ $makkah_accomodation->id }}">
                                                    {{ $makkah_accomodation->hotel_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label">Makkah Room Sharing Capacity</label>
                                        <select class="select2-single" id="makkah_room_sharing">
                                            <option></option>
                                            <option value="SHARING">Sharing</option>
                                            <option value="TRIPLE">Triple</option>
                                            <option value="QUAD">Quad Double</option>
                                        </select>
                                    </div>
                                </div>


                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label">Madinah Accomodation</label>
                                        <select class="select2-single" id="madinah_accommodation_id">
                                            <option></option>
                                            @foreach ($madinah_accomodations as $madinah_accomodation)
                                                <option value="{{ $madinah_accomodation->id }}">
                                                    {{ $madinah_accomodation->hotel_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label">Madinah Room Sharing Capacity</label>
                                        <select class="select2-single" id="madinah_room_sharing">
                                            <option></option>
                                            <option value="SHARING">Sharing</option>
                                            <option value="TRIPLE">Triple</option>
                                            <option value="QUAD">Quad Double</option>

                                        </select>
                                    </div>
                                </div>


                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label">Food</label>
                                        <select class="select2-single" id="food_type_id">
                                            <option></option>
                                            @foreach ($food_types as $food_type)
                                                <option value="{{ $food_type->id }}">{{ $food_type->food_type_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label">Special Transport</label>
                                        <select class="select2-single" id="special_transport">
                                            <option></option>
                                            <option value="INCLUDED">Included</option>
                                            <option value="NOT_INCLUDED">Not Included</option>
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