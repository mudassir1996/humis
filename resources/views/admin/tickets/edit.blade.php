@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-center align-items-center flex-wrap grid-margin">
        <h4>Edit Ticket</h4>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card">
                <div class="card-body">
                    <form class="step-2" method="post" id="ticket-form" action="{{ route('tickets.update',$ticket->id) }}">
                        @csrf
                        @method('PATCH')
                        <div id="standard_package">
                            <div class="row">
                                
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label">Ticket Type <span class="text-danger">*</span></label>
                                        <input id="ticket_type" name="ticket_type" value="{{$ticket->ticket_type}}" class="form-control"
                                            placeholder="Enter Ticket Type" type="text">
                                       
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label">Ticket Cost <span class="text-danger">*</span></label>
                                        <input id="ticket_cost" name="ticket_cost" value="{{$ticket->ticket_cost}}" class="form-control"
                                            placeholder="Enter Ticket Cost" type="number">
                                       
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
