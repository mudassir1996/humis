@extends('layouts.app')
@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/vendors/select2/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/dropify/dist/dropify.min.css') }}">
@endsection
@section('content')
    <div class="d-flex justify-content-center align-items-center flex-wrap grid-margin">
        <h4>Edit Profile</h4>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card">
                <div class="card-body">
                    <form class="step-2" id="profile-form" method="post" action="{{ route('edit-profile') }}">
                        @csrf
                        @method('PATCH')
                        <div id="standard_package">
                            <div class="row">

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label">Name <span class="text-danger">*</span></label>
                                        <input id="name" name="name" value="{{ auth()->user()->name }}"
                                            class="form-control" placeholder="Enter Name" type="text">

                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label">Email</label>
                                        <input readonly value="{{ auth()->user()->email }}" class="form-control">

                                    </div>
                                </div>


                            </div>
                            <div class="row">

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label">New Password</label>
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                             autocomplete="current-password" placeholder="Password">

                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label">Confirm Password</label>
                                         <input id="password_confirmation" type="password"
                                        class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation"
                                         autocomplete="current-password" placeholder="Confirm Password">

                                    </div>
                                </div>


                            </div>



                        </div>

                        <div class="row">
                            <div class="col-lg-12 text-right">

                                <button type="submit" class="btn btn-primary">
                                    Save
                                </button>

                            </div>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
        <script src="{{ asset('assets/vendors/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('assets/js/form-validation.js') }}"></script>
@endsection
