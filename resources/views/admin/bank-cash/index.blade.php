@extends('layouts.app')
@section('styles')
    <!-- plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/select2/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/prismjs/themes/prism.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css') }}">


    <!-- end plugin css for this page -->
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">

                <div class="card-body">
                    <div class="d-flex justify-content-between py-3">
                        <h3>Bank/Cash</h3>
                        <div>
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#transferModal">
                            <i data-feather="send" class="icon-md mr-2"></i> <span class="">Transfer</span>
                        </button>
                            {{-- <a class="btn btn-primary text-white" href="{{route('payments.create')}}">
                            <i data-feather="plus" class="icon-md mr-2"></i> <span class="">Add New</span>
                            </a> --}}
                        </div>
                    </div>
                    {{-- <p class="card-description">Read the <a href="https://datatables.net/" target="_blank"> Official
                            DataTables
                            Documentation </a>for a full list of instructions and other options.</p> --}}
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                                <tr>
                                    <th>Comapny Name</th>
                                    <th>Reciepts</th>
                                    <th>Payments</th>
                                    <th>Transfers</th>
                                    <th>Balance</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @for ($i = 0; $i < 10; $i++)
                                    <tr>
                                        <td>ABC</td>
                                        <td>123</td>
                                        <td>123</td>
                                        <td>123</td>
                                        <td>123</td>
                                        
                                        <td>
                                             <button type="button" data-toggle="modal" data-target="#detailModal" class="btn btn-primary btn-sm text-white">
                                                View Details
                                            </button>
                                        </td>
                                    </tr>
                                @endfor

                            </tbody>
                        </table>
                    </div>
                    {{-- @include('admin.reciept.reciept-filters') --}}
                    @include('admin.bank-cash.transfer-modal')
                    @include('admin.bank-cash.detail-modal')
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
        <script src="{{ asset('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>

    <script src="{{ asset('assets/js/datepicker.js') }}"></script>

    <script src="{{ asset('assets/vendors/select2/select2.min.js') }}"></script>

    <script src="{{ asset('assets/js/select2.js') }}"></script>
@endsection
