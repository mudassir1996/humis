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
                        <h3>Booking Details</h3>
                        {{-- <div>
                            <button type="button" class="btn btn-outline-primary" data-toggle="modal"filter
                            data-target="#filterModal">
                            <i data-feather="filter" class="icon-md mr-2"></i> <span class="">Filter</span>
                        </button>
                            <a class="btn btn-primary text-white" href="{{route('reciepts.create')}}">
                            <i data-feather="plus" class="icon-md mr-2"></i> <span class="">Add New</span>
                            </a>
                        </div> --}}
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-group">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Booking No.
                                    <span>545445</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Contact Name
                                    <span>ABC</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Contact No.
                                    <span>32323323</span>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <ul class="list-group">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Amount Recievable 
                                    <span>12,000,000</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Amount Paid 
                                    <span>600,000</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Balance Recievable
                                    <span>600,000</span>
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
                    <div class="d-flex justify-content-between py-3">
                        <h3>Reciepts Details</h3>
                        {{-- <div>
                            <button type="button" class="btn btn-outline-primary" data-toggle="modal"filter
                            data-target="#filterModal">
                            <i data-feather="filter" class="icon-md mr-2"></i> <span class="">Filter</span>
                        </button>
                            <a class="btn btn-primary text-white" href="{{route('reciepts.create')}}">
                            <i data-feather="plus" class="icon-md mr-2"></i> <span class="">Add New</span>
                            </a>
                        </div> --}}
                    </div>
                    {{-- <p class="card-description">Read the <a href="https://datatables.net/" target="_blank"> Official
                            DataTables
                            Documentation </a>for a full list of instructions and other options.</p> --}}
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                                <tr>
                                    <th>Installment No.</th>
                                    <th>Reciept No.</th>
                                    <th>Date</th>
                                    <th>Payment Mode</th>
                                    <th>Amount</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @for ($i = 0; $i < 3; $i++)
                                    <tr>
                                        <td>{{ $i + 1 }}</td>
                                        <td>38392932</td>
                                        <td>14/02/2024</td>
                                        <td>Cash</td>
                                        <td>600,000</td>

                                        <td>
                                            <button type="button" class="btn btn-primary btn-sm">
                                                Print
                                            </button>
                                        </td>
                                    </tr>
                                @endfor

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
