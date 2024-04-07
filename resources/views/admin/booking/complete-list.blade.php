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
                        <h3>Booking List</h3>
                        <button type="button" class="btn btn-outline-primary" data-toggle="modal"filter
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
                                    <th>S.No</th>
                                    <th>Company Name</th>
                                    <th>Booking No.</th>
                                    <th>Surname</th>
                                    <th>Given Name</th>
                                    <th>Package</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bookings as $booking)
                                    <tr>
                                        <td>{{$booking->id }}</td>
                                        <td>{{$booking->company_name}}</td>
                                        <td>{{$booking->booking_number}}</td>
                                        <td>{{$booking->contact_surname}}</td>
                                        <td>{{$booking->contact_name}}</td>
                                        <td>{{$booking->package_name}}</td>
                                        
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    @include('admin.booking.booking-filters')
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
