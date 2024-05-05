@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-center align-items-center flex-wrap grid-margin">
        <h4>Add New Food Type</h4>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card">
                <div class="card-body">
                    <form class="step-2" method="post" id="food-type-form" action="{{ route('food-types.store') }}">
                        @csrf

                        <div id="standard_package">
                            <div class="row">
                                
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label">Food Type Name <span class="text-danger">*</span></label>
                                        <input id="food_type_name" name="food_type_name" class="form-control"
                                            placeholder="Enter Food Type Name" type="text">
                                       
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label">Cost <span class="text-danger">*</span></label>
                                        <input id="food_type_cost" class="form-control" placeholder="Enter Cost"
                                            name="food_type_cost" type="number" data-inputmask-alias="999999999999">
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
