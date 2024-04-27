@extends('layouts.app')
@section('styles')
    <!-- plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/select2/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/prismjs/themes/prism.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">

    <!-- end plugin css for this page -->
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">

                <div class="card-body">

                    <div class="row mb-5">
                        <div class="col-lg-12">
                            <div class="row justify-content-between px-2 mb-2">
                                <h4>Application Details</h4>
                                <button type="button" class="btn btn-primary btn-sm"> <span class="">Edit</span>
                                </button>
                            </div>
                            <ul class="list-group">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Surname
                                    <span>{{ $application->surname }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Given Name
                                    <span>{{ $application->given_name }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Gender
                                    <span>{{ $application->gender }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Booking Nature
                                    <span>{{ $application->father_husband_name }}</span>
                                </li>


                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Passport
                                    <span>{{ $application->passport }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Date Issue
                                    <span>{{ $application->date_issue }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Date Expiry
                                    <span>{{ $application->date_expiry }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Date Birth
                                    <span>{{ $application->date_birth }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    CNIC
                                    <span>{{ $application->cnic }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Blood Group
                                    <span>{{ $application->blood_group }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Fiqah
                                    <span>{{ $application->fiqah }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Marital Status
                                    <span>{{ $application->marital_status }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Address
                                    <span>{{ $application->address }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Mobile Number
                                    <span>{{ $application->mobile_number }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    WhatsApp Number
                                    <span>{{ $application->whatsapp_number }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Qurbani
                                    <span>{{ Str::ucfirst(Str::lower(Str::replaceFirst('_', ' ', $application->qurbani))) }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Ticket
                                    <span>{{ Str::ucfirst(Str::lower(Str::replaceFirst('_', ' ', $application->ticket))) }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Makkah Room Sharing
                                    <span>{{ Str::ucfirst(Str::lower($application->makkah_room_sharing)) }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Madinah Room Sharing
                                    <span>{{ Str::ucfirst(Str::lower($application->madinah_room_sharing))  }}</span>
                                </li>
                            </ul>
                        </div>

                    </div>

                </div>
            </div>
        </div>
        @if ($application->marital_status != 'Single')
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">

                    <div class="card-body">

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="row justify-content-between px-2 mb-2">
                                    <h4>Mehram Details</h4>
                                </div>
                                <ul class="list-group">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Mehram Name
                                        <span>{{ $application->mehram_name }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Mehram Relation
                                        <span>{{ $application->mehram_relation }}</span>
                                    </li>

                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        @endif
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">

                <div class="card-body">

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row justify-content-between px-2 mb-2">
                                <h4>Nominee Details</h4>
                            </div>
                            <ul class="list-group">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Nominee Name
                                    <span>{{ $application->nominee_name }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Nominee Relation
                                    <span>{{ $application->nominee_relation }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Nominee CNIC
                                    <span>{{ $application->nominee_cnic }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Nominee Mobile
                                    <span>{{ $application->nominee_mobile }}</span>
                                </li>

                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">

                <div class="card-body">

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row justify-content-between px-2 mb-2">
                                <h4>Ticket Details</h4>
                            </div>
                            <ul class="list-group">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Departure Airport PK
                                    <span>{{ $application->dep_airport_pk }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Arrival Airport KSA
                                    <span>{{ $application->arr_airport_ksa }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Arrival Date KSA
                                    <span>{{ $application->arrival_date_ksa }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Departure Airport KSA
                                    <span>{{ $application->dep_airport_ksa }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Arrival Airport PK
                                    <span>{{ $application->arr_airport_pk }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Departure Date KSA
                                    <span>{{ $application->departure_date_ksa }}</span>
                                </li>


                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">

                <div class="card-body">

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row justify-content-between px-2 mb-2">
                                <h4>Documents & Attachments</h4>
                            </div>
                            <ul class="list-group">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Passport
                                    @if ($application->attachment_passport != '')
                                        <a href="{{ url('/') . $application->attachment_passport }}"
                                            class="btn btn-primary" download>Download</a>
                                    @else
                                        <span>Not Available</span>
                                    @endif
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    CNIC
                                    
                                        @if ($application->attachment_cnic != '')
                                        <a href="{{ url('/') . $application->attachment_cnic }}"
                                        class="btn btn-primary" download>Download</a>
                                    @else
                                        <span>Not Available</span>
                                    @endif
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Picture
                                    @if ($application->attachment_picture != '')
                                        <a href="{{ url('/') . $application->attachment_picture }}"
                                        class="btn btn-primary" download>Download</a>
                                    @else
                                        <span>Not Available</span>
                                    @endif
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Medical Certification
                                   @if ($application->attachment_medical != '')
                                        <a href="{{ url('/') . $application->attachment_medical }}"
                                        class="btn btn-primary" download>Download</a>
                                    @else
                                        <span>Not Available</span>
                                    @endif
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Other
                                    @if ($application->attachment_other != '')
                                        <a href="{{ url('/') . $application->attachment_other }}"
                                        class="btn btn-primary" download>Download</a>
                                    @else
                                        <span>Not Available</span>
                                    @endif
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Ticket
                                    @if ($application->document_ticket != '')
                                        <a href="{{ url('/') . $application->document_ticket }}"
                                        class="btn btn-primary" download>Download</a>
                                    @else
                                        <span>Not Available</span>
                                    @endif
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Visa
                                    @if ($application->document_visa != '')
                                        <a href="{{ url('/') . $application->document_visa }}"
                                        class="btn btn-primary" download>Download</a>
                                    @else
                                        <span>Not Available</span>
                                    @endif
                                </li>


                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/vendors/prismjs/prism.js') }}"></script>
    <script src="{{ asset('assets/vendors/datatables.net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ asset('assets/js/data-table.js') }}"></script>
    <script src="{{ asset('assets/vendors/select2/select2.min.js') }}"></script>

    <script src="{{ asset('assets/js/select2.js') }}"></script>
@endsection
