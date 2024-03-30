@extends('layouts.app')
@section('styles')
    <!-- plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/prismjs/themes/prism.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">

    <!-- end plugin css for this page -->
@endsection
@section('content')
    <div class="d-flex justify-content-center align-items-center flex-wrap grid-margin">

        @if (Route::currentRouteName() == 'booking-maktab-report')
            <h4>Maktab Wise report</h4>
        @elseif (Route::currentRouteName() == 'booking-airport-report')
            <h4>Departure Airport Wise report</h4>
        @elseif (Route::currentRouteName() == 'booking-gender-report')
            <h4>Gender Wise report</h4>
        @elseif (Route::currentRouteName() == 'booking-room-report')
            <h4>Room Sharing Wise report</h4>
        @elseif (Route::currentRouteName() == 'booking-duration-report')
            <h4>Duration of stay wise report</h4>
        @endif
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-12">
            <ul class="nav nav-tabs nav-tabs-line">
                <li class="nav-item">
                    <a href="{{ route('booking-maktab-report') }}"
                        class="nav-link {{ Route::currentRouteName() == 'booking-maktab-report' ? 'active text-primary' : '' }} ">
                        Maktab
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('booking-airport-report') }}"
                        class="nav-link {{ Route::currentRouteName() == 'booking-airport-report' ? 'active text-primary' : '' }} ">Departure
                        Airport
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('booking-gender-report') }}"
                        class="nav-link {{ Route::currentRouteName() == 'booking-gender-report' ? 'active text-primary' : '' }} ">
                        Gender
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('booking-room-report') }}"
                        class="nav-link {{ Route::currentRouteName() == 'booking-room-report' ? 'active text-primary' : '' }} ">Room
                        Sharing
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('booking-duration-report') }}"
                        class="nav-link {{ Route::currentRouteName() == 'booking-duration-report' ? 'active text-primary' : '' }} ">
                        Duration
                    </a>
                </li>
            </ul>
            @if (Route::currentRouteName() == 'booking-maktab-report')
                @include('admin.booking.report-pages.booking-maktab-report')
            @elseif (Route::currentRouteName() == 'booking-airport-report')
                @include('admin.booking.report-pages.booking-airport-report')
            @elseif (Route::currentRouteName() == 'booking-gender-report')
                @include('admin.booking.report-pages.booking-gender-report')
            @elseif (Route::currentRouteName() == 'booking-room-report')
                @include('admin.booking.report-pages.booking-room-report')
            @elseif (Route::currentRouteName() == 'booking-duration-report')
                @include('admin.booking.report-pages.booking-duration-report')
            @endif
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/vendors/prismjs/prism.js') }}"></script>
    <script src="{{ asset('assets/vendors/datatables.net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>


    <script src="{{ asset('assets/js/data-table.js') }}"></script>
@endsection
