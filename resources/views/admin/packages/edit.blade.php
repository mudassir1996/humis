@extends('layouts.app')
@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/vendors/select2/select2.min.css') }}">
@endsection
@section('content')
    <div class="d-flex justify-content-center align-items-center flex-wrap grid-margin">
        <h4>Edit Package</h4>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card">
                <div class="card-body">
                    <form class="step-2" id="bookingStep2" action="{{ route('packages.update', $package->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div id="standard_package">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label">Package Name <span class="text-danger">*</span></label>
                                        <input class="form-control" value="{{ $package->package_name }}" name="package_name"
                                            type="text">

                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label">Qurbani Cost <span class="text-danger">*</span></label>
                                        <select class="select2-single" name="qurbani_cost_id" id="qurbani_cost_id">
                                            <option></option>
                                            @foreach ($qurbani_costs as $qurbani_cost)
                                                <option value="{{ $qurbani_cost->id }}"
                                                    {{ $package->qurbani_cost_id == $qurbani_cost->id ? 'selected' : '' }}>
                                                    {{ $qurbani_cost->cost_title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label">Maktab Category <span class="text-danger">*</span></label>
                                        <select class="select2-single" id="maktab_category" name="maktab_category_id"
                                            onchange="getPackagePricing()">
                                            <option></option>
                                            @foreach ($maktab_categories as $maktab_category)
                                                <option value="{{ $maktab_category->id }}"
                                                    {{ $package->maktab_category_id == $maktab_category->id ? 'selected' : '' }}>
                                                    {{ $maktab_category->maktab_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label">Duration of Stay <span class="text-danger">*</span></label>
                                        <select class="select2-single" id="duration_of_stay" name="duration_of_stay">
                                            <option></option>
                                            @foreach ($stay_durations as $stay_duration)
                                                <option value="{{ $stay_duration->duration_of_stay }}"
                                                    {{ $package->duration_of_stay == $stay_duration->duration_of_stay ? 'selected' : '' }}>
                                                    {{ $stay_duration->duration_of_stay }}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>


                            </div>
                            <div class="row">

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label">Nature <span class="text-danger">*</span></label>
                                        <select class="select2-single" id="nature" name="nature">
                                            <option></option>
                                            <option value="FIX" {{ $package->nature == 'FIX' ? 'selected' : '' }}>Fix
                                            </option>
                                            <option value="SHIFTING"
                                                {{ $package->nature == 'SHIFTING' ? 'selected' : '' }}>
                                                Shifting</option>
                                        </select>
                                    </div>
                                </div>


                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label">Aziziah Accomodation <span class="text-danger">*</span></label>
                                        <select class="select2-single" name="aziziya_accommodation_id"
                                            id="aziziya_accommodation_id" onchange="getPackagePricing()">
                                            <option></option>
                                            @foreach ($aziziyah_accomodations as $aziziyah_accomodation)
                                                <option value="{{ $aziziyah_accomodation->id }}"
                                                    {{ $package->aziziya_accommodation_id == $aziziyah_accomodation->id ? 'selected' : '' }}>
                                                    {{ $aziziyah_accomodation->hotel_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label">Makkah Accomodation <span class="text-danger">*</span></label>
                                        <select class="select2-single" name="makkah_accommodation_id"
                                            id="makkah_accommodation_id" onchange="getPackagePricing()">
                                            <option></option>
                                            @foreach ($makkah_accomodations as $makkah_accomodation)
                                                <option value="{{ $makkah_accomodation->id }}"
                                                    {{ $package->makkah_accommodation_id == $makkah_accomodation->id ? 'selected' : '' }}>
                                                    {{ $makkah_accomodation->hotel_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label">Madinah Accomodation <span class="text-danger">*</span></label>
                                        <select class="select2-single" name="madinah_accommodation_id"
                                            id="madinah_accommodation_id" onchange="getPackagePricing()">
                                            <option></option>
                                            @foreach ($madinah_accomodations as $madinah_accomodation)
                                                <option value="{{ $madinah_accomodation->id }}"
                                                    {{ $package->madinah_accommodation_id == $madinah_accomodation->id ? 'selected' : '' }}>
                                                    {{ $madinah_accomodation->hotel_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>






                            </div>
                            <div class="row">

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label">Makkah Room Sharing Capacity <span class="text-danger">*</span></label>
                                        <select class="select2-single" name="makkah_room_sharing" id="makkah_room_sharing"
                                            onchange="getPackagePricing()">
                                            <option></option>
                                            <option value="SHARING"
                                                {{ $package->makkah_room_sharing == 'SHARING' ? 'selected' : '' }}>Sharing
                                            </option>
                                            <option value="TRIPLE"
                                                {{ $package->makkah_room_sharing == 'TRIPLE' ? 'selected' : '' }}>Triple
                                            </option>
                                            <option value="DOUBLE"
                                                {{ $package->makkah_room_sharing == 'DOUBLE' ? 'selected' : '' }}>Double
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label">Madinah Room Sharing Capacity <span class="text-danger">*</span></label>
                                        <select class="select2-single" name="madinah_room_sharing" id="madinah_room_sharing"
                                            onchange="getPackagePricing()">
                                            <option></option>
                                            <option value="SHARING"
                                                {{ $package->madinah_room_sharing == 'SHARING' ? 'selected' : '' }}>Sharing
                                            </option>
                                            <option value="TRIPLE"
                                                {{ $package->madinah_room_sharing == 'TRIPLE' ? 'selected' : '' }}>Triple
                                            </option>
                                            <option value="DOUBLE"
                                                {{ $package->madinah_room_sharing == 'DOUBLE' ? 'selected' : '' }}>Double
                                            </option>
                                        </select>
                                    </div>
                                </div>



                            </div>


                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label">Ticket <span class="text-danger">*</span></label>
                                        <select class="select2-single" name="ticket_id" id="ticket"
                                            onchange="getPackagePricing()">
                                            <option></option>
                                            @foreach ($tickets as $ticket)
                                                <option value="{{ $ticket->id }}"
                                                    {{ $package->ticket_id == $ticket->id ? 'selected' : '' }}>
                                                    {{ $ticket->ticket_type }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label">Food <span class="text-danger">*</span></label>
                                        <select class="select2-single" name="food_type_id" id="food_type_id"
                                            onchange="getPackagePricing()">
                                            <option></option>
                                            @foreach ($food_types as $food_type)
                                                <option value="{{ $food_type->id }}"
                                                    {{ $package->food_type_id == $food_type->id ? 'selected' : '' }}>
                                                    {{ $food_type->food_type_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>




                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="control-label">Cost Per Person</label>
                                        <input id="cost_per_person" class="form-control"
                                            value="{{ $package->cost_per_person }}" name="cost_per_person" readonly
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
    <script src="{{ asset('assets/vendors/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('assets/js/form-validation.js') }}"></script>
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
                "ticket_id": $('#ticket').val(),
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
