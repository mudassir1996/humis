@extends('layouts.app')
@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/vendors/select2/select2.min.css') }}">
@endsection
@section('content')
    <div class="d-flex justify-content-center align-items-center flex-wrap grid-margin">
        <h4>Edit Madinah Accomodation</h4>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card">
                <div class="card-body">
                    <form class="step-2" id="accomodation-form" method="post" action="{{ route('madinah-accomodations.update',$accomodation->id) }}">
                        @csrf
                        @method('PATCH')
                        <div id="standard_package">
                            <div class="row">
                                
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="control-label">Accomodation Name <span class="text-danger">*</span></label>
                                        <input id="hotel_name" name="hotel_name" value="{{$accomodation->hotel_name}}" class="form-control"
                                            placeholder="Enter Accomodation Name" type="text">
                                       
                                    </div>
                                </div>
                                

                            </div>
                            <div class="row">
                                
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="control-label">Quad/Sharing Cost <span class="text-danger">*</span></label>
                                        <input id="sharing_room_cost" value="{{$accomodation->sharing_room_cost}}" class="form-control" placeholder="Enter Cost"
                                            name="sharing_room_cost" type="number" data-inputmask-alias="999999999999">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="control-label">Triple Cost <span class="text-danger">*</span></label>
                                        <input id="triple_room_cost" value="{{$accomodation->triple_room_cost}}" class="form-control" placeholder="Enter Cost"
                                            name="triple_room_cost" type="number" data-inputmask-alias="999999999999">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="control-label">Double Cost <span class="text-danger">*</span></label>
                                        <input id="quad_double_cost" value="{{$accomodation->quad_double_cost}}" class="form-control" placeholder="Enter Cost"
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
    <script src="{{ asset('assets/vendors/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('assets/js/form-validation.js') }}"></script>
@endsection