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
                    <form action="{{route('madinah-hotel-documents-store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-5 justify-content-center align-items-center">
                            <div class="col-lg-12 text-center">
                                <h4>Madinah Hotel Document/Agreement</h4>
                            </div>
                            {{-- <div class="col-lg-12 text-center">
                                <p>Payment Voucher</p>
                            </div> --}}
                        </div>
                        <div class="row" id="agent-fields">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="control-label">Madinah Hotel</label>
                                    <select class="select2-single" id="accomodation_id" name="accomodation_id">
                                        <option></option>
                                        @foreach ($madinah_accommodations as $madinah_accommodation)
                                                <option value="{{ $madinah_accommodation->id }}">
                                                    {{ $madinah_accommodation->hotel_name }}</option>
                                            @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="control-label">Seperate Double</label>
                                    <input id="double_capacity" class="form-control" name="double_capacity"
                                        type="number" value="0" placeholder="Enter seperate double capacity">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="control-label">Seperate Triple</label>
                                    <input id="triple_capacity" class="form-control" name="triple_capacity"
                                        type="number" value="0" placeholder="Enter seperate triple capacity">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="control-label">Seperate Quad</label>
                                    <input id="quad_capacity" class="form-control" name="quad_capacity"
                                        type="number" value="0" placeholder="Enter seperate quad capacity">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="control-label">Five Bed</label>
                                    <input id="five_capacity" class="form-control" name="five_capacity"
                                        type="number" value="0" placeholder="Enter five bed capacity">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="control-label">Six Bed</label>
                                    <input id="six_capacity" class="form-control" name="six_capacity"
                                        type="number" value="0" placeholder="Enter six bed capacity">
                                </div>
                            </div>
                        </div>
                        <div class="row" id="agent-fields">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="control-label">Attachment</label>
                                    <input type="file" id="passportDropify" class="border" data-max-file-size="500K" name="attachment"/>

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
