@extends('layouts.app')
@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/vendors/select2/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/dropify/dist/dropify.min.css') }}">
@endsection
@section('content')
    <div class="d-flex justify-content-center align-items-center flex-wrap grid-margin">
        <h4>Edit Company</h4>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card">
                <div class="card-body">
                    <form class="step-2" id="company-form" method="post" action="{{route('companies.update',$company->id)}}">
                        @csrf
                        @method('PATCH')
                        <div id="standard_package">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label">Company Name <span class="text-danger">*</span></label>
                                        <input id="company_name" value="{{$company->company_name}}" class="form-control" placeholder="Enter Company Name" name="company_name" type="text">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label">Contact Number <span class="text-danger">*</span></label>
                                        <input id="company_contact" value="{{$company->company_contact}}" class="form-control" placeholder="Enter Contact Number" name="company_contact" type="text"  data-inputmask-alias="+999999999999">
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
