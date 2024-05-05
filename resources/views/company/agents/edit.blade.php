@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-center align-items-center flex-wrap grid-margin">
        <h4>Edit Agent</h4>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card">
                <div class="card-body">
                    <form class="step-2" method="post" id="agents-from" action="{{ route('agents.update',$agent->id) }}">
                        @csrf
                        @method('PATCH')
                        <div id="standard_package">
                            <div class="row">
                                
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label">Agent Name <span class="text-danger">*</span></label>
                                        <input id="agent_name" name="agent_name" value="{{$agent->agent_name}}" class="form-control"
                                            placeholder="Enter Agent Name" type="text">
                                       
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label">Agent Contact <span class="text-danger">*</span></label>
                                        <input id="agent_contact" name="agent_contact" value="{{$agent->agent_contact}}" class="form-control"
                                            placeholder="Enter Agent Contact" data-inputmask-alias="+999999999999" type="text">
                                       
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
    <script src="{{ asset('assets/vendors/inputmask/jquery.inputmask.min.js') }}"></script>
    <script src="{{ asset('assets/js/inputmask.js') }}"></script>
@endsection
