@extends('layouts.app')
@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/vendors/select2/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/dropify/dist/dropify.min.css') }}">
@endsection
@section('content')
    <div class="d-flex justify-content-center align-items-center flex-wrap grid-margin">
        <h4>Add New Madinah Accomodation</h4>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card">
                <div class="card-body">
                    <form class="step-2" method="post" action="{{ route('madinah-accomodations.store') }}">
                        @csrf

                        <div id="standard_package">
                            <div class="row">
                                
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="control-label">Accomodation Name</label>
                                        <input id="hotel_name" name="hotel_name" class="form-control"
                                            placeholder="Enter Accomodation Name" type="text">
                                       
                                    </div>
                                </div>
                                

                            </div>
                            <div class="row">
                                
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="control-label">Quad/Sharing Cost</label>
                                        <input id="sharing_room_cost" class="form-control" placeholder="Enter Cost"
                                            name="sharing_room_cost" type="number" data-inputmask-alias="999999999999">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="control-label">Triple Cost</label>
                                        <input id="triple_room_cost" class="form-control" placeholder="Enter Cost"
                                            name="triple_room_cost" type="number" data-inputmask-alias="999999999999">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="control-label">Double Cost</label>
                                        <input id="quad_double_cost" class="form-control" placeholder="Enter Cost"
                                            name="quad_double_cost" type="number" data-inputmask-alias="999999999999">
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
