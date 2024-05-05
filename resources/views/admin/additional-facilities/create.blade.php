@extends('layouts.app')
@section('content')
    <div class="d-flex justify-content-center align-items-center flex-wrap grid-margin">
        <h4>Add New Facility</h4>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card">
                <div class="card-body">
                    <form class="step-2" method="post" id="additional-facility-form" action="{{ route('additional-facilities.store') }}">
                        @csrf

                        <div id="standard_package">
                            <div class="row">
                                
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label">Facility Title <span class="text-danger">*</span></label>
                                        <input id="facility_title" name="facility_title" class="form-control"
                                            placeholder="Enter Facility Title" type="text">
                                       
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label">Facility Cost <span class="text-danger">*</span></label>
                                        <input id="facility_cost" name="facility_cost" class="form-control"
                                            placeholder="Enter Facility Cost" type="number">
                                       
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
