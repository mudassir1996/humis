@extends('layouts.app')
@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/vendors/select2/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/dropify/dist/dropify.min.css') }}">
@endsection
@section('content')
    <div class="d-flex justify-content-center align-items-center flex-wrap grid-margin">
        <h4>Add New Maktab Category</h4>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card">
                <div class="card-body">
                    <form class="step-2" method="post" action="{{ route('maktab-categories.store') }}">
                        @csrf

                        <div id="standard_package">
                            <div class="row">
                                
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="control-label">Maktab Name</label>
                                        <input id="maktab_name" name="maktab_name" class="form-control"
                                            placeholder="Enter Maktab Name" type="text">
                                       
                                    </div>
                                </div>
                                

                            </div>
                            <div class="row">
                                
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label">Cost</label>
                                        <input id="maktab_cost" class="form-control" placeholder="Enter Cost"
                                            name="maktab_cost" type="number">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label">Profit</label>
                                        <input id="profit" class="form-control" placeholder="Enter profit"
                                            name="profit" type="number">
                                    </div>
                                </div>
                               
                                

                            </div>
                            <div class="row">
                                
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label">KSA Expense</label>
                                        <input id="ksa_expense" class="form-control" placeholder="Enter Expense"
                                            name="ksa_expense" type="number" >
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label">PK Expense</label>
                                        <input id="pk_expense" class="form-control" placeholder="Enter Expense"
                                            name="pk_expense" type="number">
                                    </div>
                                </div>
                               
                                

                            </div>
                            <div class="row">
                                
                                <div class="col-lg-6">
                                    <div class="form-group">

                                        <label class="control-label">Special Transport Cost</label>
                                        <input id="special_transport" class="form-control" placeholder="Enter Cost"
                                            name="special_transport" type="number" >
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label">Agent Commission</label>
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
    <script src="{{ asset('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/inputmask/jquery.inputmask.min.js') }}"></script>
    <script src="{{ asset('assets/js/datepicker.js') }}"></script>
    <script src="{{ asset('assets/js/inputmask.js') }}"></script>
    <script src="{{ asset('assets/vendors/dropify/dist/dropify.min.js') }}"></script>

    <script src="{{ asset('assets/js/dropify.js') }}"></script>
@endsection
