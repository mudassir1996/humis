@extends('layouts.app')
@section('styles')
    <!-- plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/select2/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/prismjs/themes/prism.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">

    <!-- end plugin css for this page -->
@endsection
@section('content')
    <div class="row ">
        <div class="row flex-grow px-2">
            <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-baseline">
                            <h4 class=" mb-0">Amount Receivable</h4>

                        </div>
                        <div class="row">
                            <div class="col-12 col-md-12 col-xl-12 ">
                                <ul class="list-group py-3">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        PKR
                                        <span>{{number_format($total_calculations['pkr_total_receivable'])}}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        USD
                                        <span>{{number_format($total_calculations['usd_total_receivable'])}}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        AED
                                        <span>{{number_format($total_calculations['aed_total_receivable'])}}</span>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-baseline">
                            <h4 class=" mb-0">Total Received</h4>

                        </div>
                        <div class="row">
                            <div class="col-12 col-md-12 col-xl-12 ">
                                <ul class="list-group py-3">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        PKR
                                        <span>{{number_format($total_calculations['pkr_total_received'])}}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        USD
                                        <span>{{number_format($total_calculations['usd_total_received'])}}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        AED
                                        <span>{{number_format($total_calculations['aed_total_received'])}}</span>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-baseline">
                            <h4 class=" mb-0">Balance Receivable</h4>

                        </div>
                        <div class="row">
                            <div class="col-12 col-md-12 col-xl-12 ">
                                <ul class="list-group py-3">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        PKR
                                        <span>{{number_format($total_calculations['pkr_total_balance_receivable'])}}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        USD
                                        <span>{{number_format($total_calculations['usd_total_balance_receivable'])}}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        AED
                                        <span>{{number_format($total_calculations['aed_total_balance_receivable'])}}</span>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-md-12 grid-margin stretch-card">


            <div class="card">

                <div class="card-body">
                    <div class="d-flex justify-content-between py-3">
                        <h3>Reciepts</h3>
                        <div>
                            <button type="button" class="btn btn-primary" data-toggle="modal"filter
                                data-target="#filterModal">
                                <i data-feather="filter" class="icon-md mr-2"></i> <span class="">Filter</span>
                            </button>
                            {{-- <a class="btn btn-primary text-white" href="{{route('reciepts.create')}}">
                            <i data-feather="plus" class="icon-md mr-2"></i> <span class="">Add New</span>
                            </a> --}}
                        </div>
                    </div>
                    {{-- <p class="card-description">Read the <a href="https://datatables.net/" target="_blank"> Official
                            DataTables
                            Documentation </a>for a full list of instructions and other options.</p> --}}
                    <div>

                        <table id="dataTableExample" class="table table-responsive">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Company Name</th>
                                    <th>Booking No.</th>
                                    <th>No. of Hujjaj</th>
                                    <th>Given Name</th>
                                    <th>Surname Name</th>
                                    <th>Contact No</th>
                                    <th>Agent Name</th>
                                    <th>Total Recievable</th>
                                    <th>Amount Recieved</th>
                                    <th>Balance Recievable</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bookings as $booking)
                                    <tr>
                                        <td>{{ $booking->id }}</td>
                                        <td>{{ $booking->company_name }}</td>
                                        <td>{{ $booking->booking_number }}</td>
                                        <td>{{ $booking->num_of_hujjaj }}</td>
                                        <td>{{ $booking->contact_name }}</td>
                                        <td>{{ $booking->contact_surname }}</td>
                                        <td>{{ $booking->contact_mobile }}</td>
                                        <td>{{ $booking->agent_name ?? 'N/A' }}</td>
                                        <td>{{ $booking->currency }} {{ number_format($booking->total_receivable) }}</td>
                                        <td>{{ $booking->currency }} {{ number_format($booking->amount_received) }}</td>
                                        <td>{{ $booking->currency }} {{ number_format($booking->balance_receivable) }}
                                        </td>
                                        <td>
                                            <a type="button" class="btn btn-primary btn-sm"
                                                href="{{ route('view-reciept-details', ['booking_id' => $booking->id]) }}">
                                                View Details
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    @include('admin.reciept.reciept-filters')
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
