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
                                <h4>Initial Information</h4>
                                <button type="button" class="btn btn-primary btn-sm"> <span class="">Edit</span>
                                </button>
                            </div>
                            <ul class="list-group">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Company
                                    <span>ABC</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Booking Office Country
                                    <span>ABC</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Client Country
                                    <span>Pakistan</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Booking Nature
                                    <span>Without Agent</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Number of Hujjaj
                                    <span>5</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Individual/Family
                                    <span>Family</span>
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
                                <h4>Package Information</h4>
                                <button type="button" class="btn btn-primary btn-sm"> <span class="">Edit</span>
                                </button>
                            </div>
                            <ul class="list-group">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Package Category
                                    <span>Standard</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Maktab Category
                                    <span>ABC</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Duration of Stay
                                    <span>21 Days</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Nature
                                    <span>Fix</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Aziziah Accomodation
                                    <span>ABC</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Makkah Accomodation
                                    <span>ABC</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Makkah Room Sharing Capacity
                                    <span>Sharing</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Madinah Accomodation
                                    <span>ABC</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Madinah Room Sharing Capacity
                                    <span>Sharing</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Food
                                    <span>Included</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Special Transport
                                    <span>Not Included</span>
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
                        <h4>Hujjaj List</h4>
                        <button type="button" class="btn btn-outline-primary" data-toggle="modal"filter
                            data-target="#filterModal">
                            <i data-feather="filter" class="icon-md mr-2"></i> <span class="">Filter</span>
                        </button>
                    </div>
                    {{-- <p class="card-description">Read the <a href="https://datatables.net/" target="_blank"> Official
                            DataTables
                            Documentation </a>for a full list of instructions and other options.</p> --}}
                    <div class="table-responsive">
                        <table id="" class="table">
                            <thead>
                                <tr>
                                    <th>Booking No.</th>
                                    <th>Application No.</th>
                                    <th>Given Name</th>
                                    <th>Surname</th>
                                    <th>Passport</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @for ($i = 0; $i < 3; $i++)
                                    <tr>
                                        <td>38392932</td>
                                        <td>232223</td>
                                        <td>ABC</td>
                                        <td>ABC</td>
                                        <td>32323</td>
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
                                                    <a class="dropdown-item d-flex align-items-center p-2" href="#"><i
                                                            data-feather="edit-2" class="icon-md mr-2"></i> <span
                                                            class="">Edit</span></a>
                                                    <a class="dropdown-item d-flex align-items-center p-2" href="#"><i
                                                            data-feather="eye" class="icon-md mr-2"></i> <span
                                                            class="">View Detail</span></a>
                                                    {{-- <a class="dropdown-item d-flex align-items-center p-2" href="#"><i
                                                            data-feather="file-text" class="icon-md mr-2 "></i> <span
                                                            class="">Generate Receipt</span></a> --}}


                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endfor

                            </tbody>
                        </table>
                    </div>
                    @include('admin.application.application-filters')
                </div>
            </div>
        </div>
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">

                <div class="card-body">

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row justify-content-between px-2 mb-2">
                                <h4>Final Costing</h4>
                                {{-- <button type="button" class="btn btn-primary btn-sm"> <span class="">Edit</span>
                                </button> --}}
                            </div>
                            <div class="row py-4">
                                <div class="col-lg-12">
                                    <table class="table table-bordered">
                                        <thead>
                                            <th>Haji Name</th>
                                            <th>Per Haji Cost</th>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Usama Qureshi</td>
                                                <td>PKR 30,000,000</td>
                                            </tr>
                                            <tr>
                                                <td>Usama Qureshi</td>
                                                <td>PKR 30,000,000</td>
                                            </tr>
                                            <tr>
                                                <td>Usama Qureshi</td>
                                                <td>PKR 30,000,000</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row pb-4">
                                <div class="col-md-12 ml-auto">

                                    <div class="form-group row align-items-center justify-content-between">
                                        <label for="exampleInputUsername2" class="col-sm-7 col-4">Discount</label>
                                        <div class="col-sm-5 col-8 text-right">
                                            PKR 4,000.00
                                        </div>
                                    </div>
                                    <div class="form-group row align-items-center justify-content-between">
                                        <label for="exampleInputUsername2" class="col-sm-7 col-4">Net Cost Per
                                            Person</label>
                                        <div class="col-sm-5 col-8 text-right">
                                            PKR 14,900.00
                                        </div>
                                    </div>
                                    {{-- <div class="form-group row align-items-center justify-content-between">
                                        <label for="exampleInputUsername2" class="col-sm-7 col-4">Commission</label>
                                        <div class="col-sm-5 col-8">
                                            <input type="number" class="form-control" id="exampleInputUsername2"
                                                placeholder="Enter Commission">

                                        </div>
                                    </div> --}}
                                    <div class="table-responsive">
                                        <table class="table total-table">
                                            <tbody>
                                                <tr class="bg-light">
                                                    <td class="text-bold-800">
                                                        <h5>Total</h5>
                                                    </td>
                                                    <td class="text-bold-800 text-right">
                                                        <h5>PKR 12,000.00</h5>
                                                        <input type="hidden" id="total" />
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
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
