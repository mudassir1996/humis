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
                    <div class="d-flex justify-content-between py-3">
                        <h3>Applications List</h3>
                        <button type="button" class="btn btn-primary" data-toggle="modal"filter
                            data-target="#filterModal">
                            <i data-feather="filter" class="icon-md mr-2"></i> <span class="">Filter</span>
                        </button>
                    </div>
                    {{-- <p class="card-description">Read the <a href="https://datatables.net/" target="_blank"> Official
                            DataTables
                            Documentation </a>for a full list of instructions and other options.</p> --}}
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Company Name</th>
                                    <th>Booking No.</th>
                                    <th>Application No.</th>
                                    <th>Given Name</th>
                                    <th>Surname</th>
                                    <th>Passport</th>
                                    <th>Gender</th>
                                    <th>Visa/Ticket</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($applications as $application)
                                    <tr>
                                        <td>{{ $application->id }}</td>
                                        <td>{{ $application->company_name }}</td>
                                        <td>{{ $application->booking_number }}</td>
                                        <td>{{ $application->application_number }}</td>
                                        <td>{{ $application->given_name }}</td>
                                        <td>{{ $application->surname }}</td>
                                        <td>{{ $application->passport }}</td>
                                        <td>{{ $application->gender }}</td>
                                        <td>
                                            @if ($application->document_visa != '' && $application->document_ticket != '')
                                                <span class="badge bg-success text-light">Uploaded</span>
                                            @elseif ($application->document_ticket != '')
                                                <span class="badge bg-warning">Ticket Uploaded</span>                                                
                                            @elseif ($application->document_visa)
                                                <span class="badge bg-warning">Ticket Uploaded</span>                                                
                                            @else
                                                <span class="badge bg-danger text-light">Not Uploaded</span>                                                
                                            @endif

                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn p-0" type="button" id="dropdownMenuButton3"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="icon-sm text-muted pb-3px">

                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" class="feather feather-settings">
                                                            <circle cx="12" cy="12" r="3"></circle>
                                                            <path
                                                                d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z">
                                                            </path>
                                                        </svg>
                                                    </i>
                                                </button>
                                                <div class="dropdown-menu border rounded"
                                                    aria-labelledby="dropdownMenuButton3">
                                                    {{-- @if (auth()->user()->role=="ADMIN" || $application->company_id == auth()->user()->company_id)
                                                        <a class="dropdown-item d-flex align-items-center p-2" href="#"><i
                                                            data-feather="edit-2" class="icon-md mr-2"></i> <span
                                                            class="">Edit</span></a>
                                                    @endif --}}
                                                    {{-- <a class="dropdown-item d-flex align-items-center p-2" href="#"><i
                                                            data-feather="edit-2" class="icon-md mr-2"></i> <span
                                                            class="">Edit</span></a> --}}
                                                    @if ($application->document_visa != '')
                                                        <a class="dropdown-item d-flex align-items-center p-2"
                                                            href="{{ url('/') . $application->document_visa }}" download><i
                                                                data-feather="download" class="icon-md mr-2"></i> <span
                                                                class="">Download
                                                                Visa</span></a>
                                                    @endif
                                                    @if ($application->document_ticket != '')
                                                        <a class="dropdown-item d-flex align-items-center p-2"
                                                            href="{{ url('/') . $application->document_ticket }}"
                                                            download><i data-feather="download" class="icon-md mr-2"></i>
                                                            <span class="">Download
                                                                Ticket</span></a>
                                                    @endif
                                                    @if (Auth::user()->role == 'ADMIN')
                                                        @if ($application->document_visa == '' || $application->document_ticket == '')
                                                            <a class="dropdown-item d-flex align-items-center p-2"
                                                                href="{{ route('visa-ticket', ['application_id' => $application->id]) }}"><i
                                                                    data-feather="upload" class="icon-md mr-2"></i> <span
                                                                    class="">Upload Visa/Ticket</span></a>
                                                        @endif
                                                    @endif
                                                    <a class="dropdown-item d-flex align-items-center p-2"
                                                        href="{{ route('view-application-details', $application->id) }}"><i
                                                            data-feather="eye" class="icon-md mr-2"></i> <span
                                                            class="">View Detail</span></a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    @include('admin.application.application-filters')
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
