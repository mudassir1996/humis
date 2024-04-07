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
                    <form class="step-2" action="{{route('packages.store')}}" method="POST">
                        @csrf

                        <div id="standard_package">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="control-label">Package Name</label>
                                        <input class="form-control" name="package_name" 
                                            type="text">

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label">Maktab Category</label>
                                        <select class="select2-single" id="maktab_category" name="maktab_category_id"
                                            onchange="getPackagePricing()">
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
                                        <select class="select2-single" id="nature" name="nature">
                                            <option></option>
                                            <option value="FIX">Fix</option>
                                            <option value="SHIFTING">Shifting</option>
                                        </select>
                                    </div>
                                </div>




                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label">Aziziah Accomodation</label>
                                        <select class="select2-single" name="aziziya_accommodation_id"
                                            id="aziziya_accommodation_id" onchange="getPackagePricing()">
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
                                        <select class="select2-single" name="makkah_accommodation_id"
                                            id="makkah_accommodation_id" onchange="getPackagePricing()">
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
                                        <select class="select2-single" name="makkah_room_sharing" id="makkah_room_sharing"
                                            onchange="getPackagePricing()">
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
                                        <select class="select2-single" name="madinah_accommodation_id"
                                            id="madinah_accommodation_id" onchange="getPackagePricing()">
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
                                        <select class="select2-single" name="madinah_room_sharing" id="madinah_room_sharing"
                                            onchange="getPackagePricing()">
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
                                        <select class="select2-single" name="food_type_id" id="food_type_id"
                                            onchange="getPackagePricing()">
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
                                        <select class="select2-single" name="special_transport" id="special_transport"
                                            onchange="getPackagePricing()">
                                            <option></option>
                                            <option value="INCLUDED">Included</option>
                                            <option value="NOT_INCLUDED">Not Included</option>
                                        </select>
                                    </div>
                                </div>


                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="control-label">Cost Per Person</label>
                                        <input id="cost_per_person" class="form-control" name="cost_per_person" readonly
                                            type="text">

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
    <script>
        function getPackagePricing() {
            const postData = {
                "_token": "{{ csrf_token() }}",
                "maktab_category_id": $('#maktab_category').val(),
                "aziziya_accommodation_id": $('#aziziya_accommodation_id').val(),
                "madinah_accommodation_id": $('#madinah_accommodation_id').val(),
                "makkah_accommodation_id": $('#makkah_accommodation_id').val(),
                "madinah_room_sharing": $('#madinah_room_sharing').val(),
                "makkah_room_sharing": $('#makkah_room_sharing').val(),
                "food_type_id": $('#food_type_id').val(),
                "special_transport": $('#special_transport').val(),
            }
            $.ajax({
                url: '/packages/calculate-pricing',
                type: 'POST',
                data: postData,
                dataType: 'json',
                success: function(data) {
                    $('#cost_per_person').val(data.package_cost);

                },
                error: function(xhr, status, error) {
                    console.error('Error fetching booking offices:', error);

                }
            });

        }
    </script>
@endsection
