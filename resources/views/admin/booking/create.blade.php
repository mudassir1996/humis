@extends('layouts.app')
@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/vendors/select2/select2.min.css') }}">

    @if (Route::currentRouteName() == 'create-booking-step-3')
        <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/vendors/dropify/dist/dropify.min.css') }}">
    @endif


    <style>
        .total-table td {
            border: none !important;
        }
    </style>
@endsection
@section('content')
    <div class="d-flex justify-content-center align-items-center flex-wrap grid-margin">
        <h4>Create New Booking</h4>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card">
                <div class="card-header bg-light">
                    <ul class="nav nav-tabs card-header-tabs">
                        <li class="nav-item"><a
                                class="nav-link {{ Route::currentRouteName() == 'create-booking-step-1' ? 'active text-primary' : '' }}">Initial
                                Information</a></li>
                        <li class="nav-item"><a
                                class="nav-link {{ Route::currentRouteName() == 'create-booking-step-2' ? 'active text-primary' : '' }}">Package
                                Selection</a></li>
                        <li class="nav-item"><a
                                class="nav-link {{ Route::currentRouteName() == 'create-booking-step-3' ? 'active text-primary' : '' }}">Hujjaj
                                Information</a></li>
                        <li class="nav-item"><a
                                class="nav-link {{ Route::currentRouteName() == 'create-booking-step-4' ? 'active text-primary' : '' }}">Final
                                Cost</a></li>
                    </ul>
                </div>
                <div class="card-body">
                    @if (Route::currentRouteName() == 'create-booking-step-1')
                        @include('admin.booking.wizard.step-1')
                    @elseif (Route::currentRouteName() == 'create-booking-step-2')
                        @include('admin.booking.wizard.step-2')
                    @elseif (Route::currentRouteName() == 'create-booking-step-3')
                        @include('admin.booking.wizard.step-3')
                    @elseif (Route::currentRouteName() == 'create-booking-step-4')
                        @include('admin.booking.wizard.step-4')
                    @endif

                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/vendors/select2/select2.min.js') }}"></script>
    <script src="{{ asset('assets/js/select2.js') }}"></script>
    @if (Route::currentRouteName() == 'create-booking-step-1')
        <!-- plugin js for this page -->
        <script>
            function contactPersonDetailToggle() {
                if ($("#contact-person").is(':checked')) {
                    $(".contact-person-details").hide();
                } else {
                    $(".contact-person-details").show();
                }
            }
            $("#booking-nature").on('change', () => {
                if ($("#booking-nature").val() == 'WOA') {
                    $("#agent-fields").hide();
                } else {
                    $("#agent-fields").show();
                }
            });

            $("#contact-person").on('click', () => {
                contactPersonDetailToggle();
            });

            $(document).ready(() => {
                contactPersonDetailToggle();
            });
        </script>

        <script>
            $('#companyDropdown').on('change', function() {
                var companyId = $(this).val();
                var bookingOfficeDropdown = $('#bookingOfficeDropdown');
                bookingOfficeDropdown.html('<option value="">Loading...</option>');

                if (companyId) {
                    $.ajax({
                        url: '/companies/' + companyId + '/booking-offices',
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            bookingOfficeDropdown.html('<option value=""></option>');
                            $.each(data, function(id, name) {
                                console.log(id);
                                bookingOfficeDropdown.append('<option value="' + id + '">' + name +
                                    '</option>');
                            });
                        },
                        error: function(xhr, status, error) {
                            console.error('Error fetching booking offices:', error);
                            bookingOfficeDropdown.html(
                                '<option value="">Failed to load booking offices</option>');
                        }
                    });
                } else {
                    bookingOfficeDropdown.html('<option value=""></option>');
                }
            });
        </script>
        <!-- end plugin js for this page -->
    @elseif (Route::currentRouteName() == 'create-booking-step-2')
        <script>
            function disableFields(disable = true){
                $('#cost_per_person').prop('disabled', disable);
                $('#maktab_category').prop('disabled', disable);
                $('#duration_of_stay').prop('disabled', disable);
                $('#nature').prop('disabled', disable);
                $('#aziziya_accommodation_id').prop('disabled', disable);
                $('#makkah_accommodation_id').prop('disabled', disable);
                $('#madinah_accommodation_id').prop('disabled', disable);
                $('#makkah_room_sharing').prop('disabled', disable);
                $('#madinah_room_sharing').prop('disabled', disable);
                $('#food_type_id').prop('disabled', disable);
                $('#special_transport').prop('disabled', disable);
            }

            $(document).ready(()=>{
                disableFields(true);
                $('#packageDropdown').prop('disabled', true);
            })

            $("#package_type").on('change', function() {
                var package_type = $(this).val();
                if (package_type=='STANDARD') {
                    disableFields(true);
                    $('#package_name_field').show();
                    $('#packageDropdown').val("");
                    $('#packageDropdown').trigger("change");
                    $('#packageDropdown').prop('disabled', false);


                } else if (package_type=='CUSTOM') {
                    $('#packageDropdown').val("");
                    $('#packageDropdown').trigger("change");
                    $('#package_name_field').hide();
                    disableFields(false);
                }
            });

            $('#packageDropdown').on('change', function() {
                var package_id = $(this).val();
                
                if (package_id) {
                    $.ajax({
                        url: '/packages/' + package_id + '/get-details',
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            console.log(data);
                            $('#cost_per_person').val(data.cost_per_person);
                            $('#maktab_category').val(data.maktab_category_id);
                            $('#duration_of_stay').val(data.duration_of_stay);
                            $('#nature').val(data.nature);
                            $('#aziziya_accommodation_id').val(data.aziziya_accommodation_id);
                            $('#makkah_accommodation_id').val(data.makkah_accommodation_id);
                            $('#madinah_accommodation_id').val(data.madinah_accommodation_id);
                            $('#makkah_room_sharing').val(data.makkah_room_sharing);
                            $('#madinah_room_sharing').val(data.madinah_room_sharing);
                            $('#food_type_id').val(data.food_type_id);
                            $('#special_transport').val(data.special_transport);


                            $('#maktab_category').trigger("change");
                            $('#duration_of_stay').trigger("change");
                            $('#nature').trigger("change");
                            $('#aziziya_accommodation_id').trigger("change");
                            $('#makkah_accommodation_id').trigger("change");
                            $('#madinah_accommodation_id').trigger("change");
                            $('#makkah_room_sharing').trigger("change");
                            $('#madinah_room_sharing').trigger("change");
                            $('#food_type_id').trigger("change");
                            $('#special_transport').trigger("change");
                        },
                        error: function(xhr, status, error) {
                            console.error('Error fetching booking offices:', error);
                            
                        }
                    });
                }
            });
        </script>
    @elseif (Route::currentRouteName() == 'create-booking-step-3')
        <!-- plugin js for this page -->
        <script src="{{ asset('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
        <script src="{{ asset('assets/vendors/inputmask/jquery.inputmask.min.js') }}"></script>
        <script src="{{ asset('assets/vendors/dropify/dist/dropify.min.js') }}"></script>



        <script src="{{ asset('assets/js/datepicker.js') }}"></script>
        <script src="{{ asset('assets/js/inputmask.js') }}"></script>
        <script src="{{ asset('assets/js/dropify.js') }}"></script>

        <script>
            $(document).ready(()=>{
                $("#mehram_details").hide();
            })
             $('#gender').on('change', function() {
                var gender = $(this).val();
                if (gender == 'Female') {
                    $("#mehram_details").show();
                    
                }else{
                    $("#mehram_details").hide();

                }

            })

        </script>


        <!-- end plugin js for this page -->
    @endif
@endsection
