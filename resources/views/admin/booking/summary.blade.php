@extends('layouts.app')
@section('styles')
    {{-- <link rel="stylesheet" href="{{ asset('assets/vendors/select2/select2.min.css') }}">

    @if (Route::currentRouteName() == 'create-booking-step-3')
        <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css') }}">
        	<link rel="stylesheet" href="{{asset('assets/vendors/dropify/dist/dropify.min.css')}}">

    @endif


    <style>
        td {
            border: none !important;
        }
    </style> --}}
@endsection
@section('content')
    <div class="d-flex justify-content-center align-items-center flex-wrap grid-margin">
        
        @if (Route::currentRouteName() == 'booking-maktab-summary')
            <h4>Maktab Wise Summary</h4>
        @elseif (Route::currentRouteName() == 'booking-airport-summary')
            <h4>Departure Airport Wise Summary</h4>
        @elseif (Route::currentRouteName() == 'booking-gender-summary')
            <h4>Gender Wise Summary</h4>
        @elseif (Route::currentRouteName() == 'booking-room-summary')
            <h4>Room Sharing Wise Summary</h4>
        @elseif (Route::currentRouteName() == 'booking-duration-summary')
            <h4>Duration of stay wise Summary</h4>
        @endif
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-12">
            <ul class="nav nav-tabs nav-tabs-line">
                <li class="nav-item">
                    <a href="{{ route('booking-maktab-summary') }}"
                        class="nav-link {{ Route::currentRouteName() == 'booking-maktab-summary' ? 'active text-primary' : '' }} ">
                        Maktab
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('booking-airport-summary') }}"
                        class="nav-link {{ Route::currentRouteName() == 'booking-airport-summary' ? 'active text-primary' : '' }} ">Departure
                        Airport
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('booking-gender-summary') }}"
                        class="nav-link {{ Route::currentRouteName() == 'booking-gender-summary' ? 'active text-primary' : '' }} ">
                        Gender
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('booking-room-summary') }}"
                        class="nav-link {{ Route::currentRouteName() == 'booking-room-summary' ? 'active text-primary' : '' }} ">Room
                        Sharing
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('booking-duration-summary') }}"
                        class="nav-link {{ Route::currentRouteName() == 'booking-duration-summary' ? 'active text-primary' : '' }} ">
                        Duration
                    </a>
                </li>
            </ul>
            <div class="card">

                <div class="card-body">
                    @if (Route::currentRouteName() == 'booking-maktab-summary')
                        @include('admin.booking.summary-pages.booking-maktab-summary')
                    @elseif (Route::currentRouteName() == 'booking-airport-summary')
                        @include('admin.booking.summary-pages.booking-airport-summary')
                    @elseif (Route::currentRouteName() == 'booking-gender-summary')
                        @include('admin.booking.summary-pages.booking-gender-summary')
                    @elseif (Route::currentRouteName() == 'booking-room-summary')
                        @include('admin.booking.summary-pages.booking-room-summary')
                    @elseif (Route::currentRouteName() == 'booking-duration-summary')
                        @include('admin.booking.summary-pages.booking-duration-summary')
                    @endif

                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    {{-- <script src="{{ asset('assets/vendors/select2/select2.min.js') }}"></script>
        <script src="{{ asset('assets/js/select2.js') }}"></script>
    @if (Route::currentRouteName() == 'create-booking-step-1')
        <!-- plugin js for this page -->
        <script>
            $("#booking-nature").on('change', () => {
                if ($("#booking-nature").val() == 'WOA') {
                    $("#agent-fields").hide();
                } else {
                    $("#agent-fields").show();
                }
            })
        </script>
        <!-- end plugin js for this page -->
    @elseif (Route::currentRouteName() == 'create-booking-step-2')
        <script></script>
    @elseif (Route::currentRouteName() == 'create-booking-step-3')
        <!-- plugin js for this page -->
        <script src="{{ asset('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
        <script src="{{asset('assets/vendors/inputmask/jquery.inputmask.min.js')}}"></script>
        <script src="{{asset('assets/vendors/dropify/dist/dropify.min.js')}}"></script>


        
        <script src="{{ asset('assets/js/datepicker.js') }}"></script>
        <script src="{{asset('assets/js/inputmask.js')}}"></script>
        <script src="{{asset('assets/js/dropify.js')}}"></script>


        <!-- end plugin js for this page -->
    @endif --}}
@endsection
