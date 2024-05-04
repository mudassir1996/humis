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
                        <h3>Packages List</h3>
                        <a href="{{ route('packages.create') }}">
                            <button type="button" class="btn btn-primary">
                                <i data-feather="plus" class="icon-md mr-2"></i> <span class="">Add New</span>
                            </button>
                        </a>
                    </div>
                    {{-- <p class="card-description">Read the <a href="https://datatables.net/" target="_blank"> Official
                            DataTables
                            Documentation </a>for a full list of instructions and other options.</p> --}}
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                                <tr>
                                    <th>Package Name</th>
                                    <th>Maktab</th>
                                    <th>Nature</th>
                                    <th>Duration</th>
                                    <th>Cost Per Person</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($packages as $package)
                                    <tr>
                                        <td>{{ucfirst($package->package_name)}}</td>
                                        <td>{{$package->maktab_name}}</td>
                                        <td>{{ucfirst($package->nature)}}</td>
                                        <td>{{ucfirst($package->duration_of_stay)}}</td>
                                        <td>{{number_format($package->cost_per_person)}}</td>
                                        <td>{{$package->package_status}}</td>
                                        
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
                                                    <a class="dropdown-item d-flex align-items-center p-2" href="{{ route('packages.edit', $package->id) }}"><i
                                                            data-feather="edit-2" class="icon-md mr-2"></i> <span
                                                            class="">Edit</span></a>
                                                            <form action="{{ route('packages.destroy', $package->id) }}"
                                                        id="delete_item_from{{ $package->id }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <a type="button" class="dropdown-item d-flex align-items-center p-2"
                                                            title="Delete"
                                                            onclick="deleteConfirmation('delete_item_from{{ $package->id }}')"><i
                                                                data-feather="trash-2" class="icon-md mr-2"></i> <span
                                                                class="">Delete</span></a>


                                                    </form>
                                                    {{-- <a class="dropdown-item d-flex align-items-center p-2" href="#"><i
                                                            data-feather="eye" class="icon-md mr-2"></i> <span
                                                            class="">View Detail</span></a>
                                                    <a class="dropdown-item d-flex align-items-center p-2" href="#"><i
                                                            data-feather="file-text" class="icon-md mr-2 "></i> <span
                                                            class="">Generate Receipt</span></a> --}}


                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
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
