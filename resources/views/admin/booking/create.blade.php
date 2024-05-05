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
    <script src="{{ asset('assets/vendors/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('assets/js/form-validation.js') }}"></script>

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
                var agentsDropdown = $('#agentsDropdown');
                bookingOfficeDropdown.html('<option value="">Loading...</option>');
                agentsDropdown.html('<option value="">Loading...</option>');

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

                    $.ajax({
                        url: '/companies/' + companyId + '/agents',
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            agentsDropdown.html('<option value=""></option>');
                            $.each(data, function(id, name) {
                                console.log(id);
                                agentsDropdown.append('<option value="' + id + '">' + name +
                                    '</option>');
                            });
                        },
                        error: function(xhr, status, error) {
                            console.error('Error fetching agents:', error);
                            agentsDropdown.html(
                                '<option value="">Failed to load agents</option>');
                        }
                    });
                } else {
                    bookingOfficeDropdown.html('<option value=""></option>');
                    agentsDropdown.html('<option value=""></option>');
                }
            });
        </script>
        <!-- end plugin js for this page -->
    @elseif (Route::currentRouteName() == 'create-booking-step-2')
        <script>
            function disableFields(disable = true) {
                $('#maktab_category').prop('disabled', disable);
                $('#duration_of_stay').prop('disabled', disable);
                $('#nature').prop('disabled', disable);
                $('#aziziya_accommodation_id').prop('disabled', disable);
                $('#makkah_accommodation_id').prop('disabled', disable);
                $('#madinah_accommodation_id').prop('disabled', disable);
                $('#makkah_room_sharing').prop('disabled', disable);
                $('#madinah_room_sharing').prop('disabled', disable);
                $('#food_type_id').prop('disabled', disable);
                $('#ticket').prop('disabled', disable);
                $('#qurbani_cost_id').prop('disabled', disable);
            }

            $(document).ready(() => {
                disableFields(true);
                $('#packageDropdown').prop('disabled', true);

            })

            $("#package_type").on('change', function() {
                var package_type = $(this).val();
                if (package_type == 'STANDARD') {
                    disableFields(true);
                    $('#package_name_field').show();
                    $('#packageDropdown').val("");
                    $('#packageDropdown').trigger("change");
                    $('#packageDropdown').prop('disabled', false);


                } else if (package_type == 'CUSTOM') {
                    $('#packageDropdown').val("");
                    $('#packageDropdown').trigger("change");
                    $('#package_name_field').hide();
                    disableFields(false);
                    $('#makkah_room_sharing').val("SHARING");
                    $('#madinah_room_sharing').val("SHARING");
                    $('#makkah_room_sharing').trigger("change");
                    $('#madinah_room_sharing').trigger("change");
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
                            $('#ticket').val(data.ticket_id);
                            $('#qurbani_cost_id').val(data.qurbani_cost_id);



                            $('#maktab_category').trigger("change");
                            $('#duration_of_stay').trigger("change");
                            $('#nature').trigger("change");
                            $('#aziziya_accommodation_id').trigger("change");
                            $('#makkah_accommodation_id').trigger("change");
                            $('#madinah_accommodation_id').trigger("change");
                            $('#makkah_room_sharing').trigger("change");
                            $('#madinah_room_sharing').trigger("change");
                            $('#food_type_id').trigger("change");
                            $('#ticket').trigger("change");
                            $('#qurbani_cost_id').trigger("change");
                        },
                        error: function(xhr, status, error) {
                            console.error('Error fetching booking offices:', error);

                        }
                    });
                }
            });


            function getPackagePricing() {
                if ($("#package_type").val() == 'CUSTOM') {

                    const postData = {
                        "_token": "{{ csrf_token() }}",
                        "maktab_category_id": $('#maktab_category').val(),
                        "aziziya_accommodation_id": $('#aziziya_accommodation_id').val(),
                        "madinah_accommodation_id": $('#madinah_accommodation_id').val(),
                        "makkah_accommodation_id": $('#makkah_accommodation_id').val(),
                        "madinah_room_sharing": $('#madinah_room_sharing').val(),
                        "makkah_room_sharing": $('#makkah_room_sharing').val(),
                        "ticket_id": $('#ticket').val(),
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

            }
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
            $(document).ready(() => {
                $("#mehram_details").hide();
            })
            $('#gender').on('change', function() {
                var gender = $(this).val();
                if (gender == 'Female') {
                    $("#mehram_details").show();

                } else {
                    $("#mehram_details").hide();

                }

            })
        </script>
    @elseif (Route::currentRouteName() == 'create-booking-step-4')
        {{-- <script src="{{ asset('assets/vendors/inputmask/jquery.inputmask.min.js') }}"></script>
        <script src="{{ asset('assets/js/inputmask.js') }}"></script>
         --}}
        <script>
            $('#discount').on('keyup', function() {
                let discount = $(this).val();
                if (discount == "") {
                    discount = 0;
                }else{
                   discount = parseInt(discount);
                }
                let total_cost_orignal = parseInt($("#total_cost_orignal").val());
                if(discount > total_cost_orignal){
                    alert("Invalid Discount amount");
                    $(this).val(0);
                    $(this).trigger('keyup');
                    return;
                }

                let final_cost = parseInt(total_cost_orignal - discount);
                let commission = $("#commission").val();

                $("#net_cost").text(final_cost.toLocaleString('en'));
                $("#net_total").val(final_cost);

                $("#total_cost_preview").text(final_cost.toLocaleString('en'));
                $("#total_cost").val(final_cost);
                
                // $("#total_cost_preview").text(final_cost+commission);
                // $("#total_cost").val(final_cost+commission);

            });

            // let total_cost = $("#total_cost");
            // let commission = $("#commission");
            // let total_cost_preview = $("#total_cost_preview");

            // $(document).ready(()=>{
            //     let total_cost = parstInt($("#total_cost").val());
            //     let commission = parstInt($("#commission").val());

            //     $("#total_cost_preview").text(parstInt(total_cost+commission));
            //     $("#total_cost").val(total_cost+commission);
            // });
            // $('#discount').on('keyup', function() {
            //     let discount = $(this).val();
            //     if (discount=="") {
            //         discount=0;
            //     }
            //     let net_cost = parseInt(total_cost.val()) -parseInt(discount);
            //     $("#net_cost").text(net_cost);
            //     let final_cost = parseInt(net_cost)+parseInt(commission.val());
            //     total_cost.val(final_cost);
            //     $("#total_cost_preview").text(final_cost);
            // });
        </script>

        <!-- end plugin js for this page -->
    @endif
@endsection
