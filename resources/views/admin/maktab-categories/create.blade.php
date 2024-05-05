@extends('layouts.app')
@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/vendors/select2/select2.min.css') }}">

@endsection
@section('content')
    <div class="d-flex justify-content-center align-items-center flex-wrap grid-margin">
        <h4>Add New Maktab Category</h4>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card">
                <div class="card-body">
                    <form class="step-2" method="post" id="maktab-category-form" action="{{ route('maktab-categories.store') }}">
                        @csrf

                        <div id="standard_package">
                            <div class="row">
                                
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="control-label">Maktab Name <span class="text-danger">*</span></label>
                                        <input id="maktab_name" name="maktab_name" class="form-control"
                                            placeholder="Enter Maktab Name" type="text">
                                       
                                    </div>
                                </div>
                                

                            </div>
                            <div class="row">
                                
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label">Cost <span class="text-danger">*</span></label>
                                        <input id="maktab_cost" class="form-control" placeholder="Enter Cost"
                                            name="maktab_cost" type="number">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label">Profit <span class="text-danger">*</span></label>
                                        <input id="profit" class="form-control" placeholder="Enter profit"
                                            name="profit" type="number">
                                    </div>
                                </div>
                               
                                

                            </div>
                            <div class="row">
                                
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label">KSA Expense <span class="text-danger">*</span></label>
                                        <input id="ksa_expense" class="form-control" placeholder="Enter Expense"
                                            name="ksa_expense" type="number" >
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label">PK Expense <span class="text-danger">*</span></label>
                                        <input id="pk_expense" class="form-control" placeholder="Enter Expense"
                                            name="pk_expense" type="number">
                                    </div>
                                </div>
                               
                                

                            </div>
                            <div class="row">
                                
                                <div class="col-lg-6">
                                    <div class="form-group">

                                        <label class="control-label">Special Transport Cost <span class="text-danger">*</span></label>
                                        <input id="special_transport" class="form-control" placeholder="Enter Cost"
                                            name="special_transport" type="number" >
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label">Agent Commission <span class="text-danger">*</span></label>
                                        <input id="agent_commission" class="form-control" placeholder="Enter Commission"
                                            name="agent_commission" type="number">
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
    <script src="{{ asset('assets/vendors/select2/select2.min.js') }}"></script>
    <script src="{{ asset('assets/js/select2.js') }}"></script>
    <script src="{{ asset('assets/vendors/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('assets/js/form-validation.js') }}"></script>


@endsection
