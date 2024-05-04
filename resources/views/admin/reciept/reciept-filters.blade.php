<div class="modal" id="filterModal" aria-labelledby="filterModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="filterModalLabel">Filter Reciepts</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="btn-close"></button>
            </div>
            <div class="modal-body">
                <form method="get" id="reciept-filter-form">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="control-label">Company</label>
                                <select class="form-control" name="company_id">
                                    <option></option>
                                    @foreach ($companies as $company)
                                        <option value="{{ $company->id }}"
                                            {{ request()->company_id == $company->id ? 'selected' : '' }}>
                                            {{ $company->company_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="control-label">Agent</label>
                                <select class="form-control" name="agent_id">
                                    <option></option>
                                    @foreach ($agents as $agent)
                                        <option value="{{ $agent->id }}"
                                            {{ request()->agent_id == $agent->id ? 'selected' : '' }}>
                                            {{ $agent->agent_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="control-label">Booking No.</label>
                                <input id="booking_number" class="form-control" value="{{request()->booking_number}}" placeholder="Enter booking number"
                                    name="booking_number" type="text">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="control-label">Passport</label>
                                <input id="passport" class="form-control" value="{{request()->passport}}" placeholder="Enter passport number"
                                    name="passport" type="text">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="control-label">Contact Name</label>
                                <input id="contact_name" class="form-control" value="{{request()->contact_name}}" placeholder="Enter Contact Name"
                                    name="contact_name" type="text">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="control-label">Contact Surname</label>
                                <input id="contact_surname" class="form-control" value="{{request()->contact_name}}" placeholder="Enter Contact Name"
                                    name="contact_surname" type="text">
                            </div>
                        </div>
                        
                    </div>
                    

                </form>
            </div>
            <div class="modal-footer">
                <a href="{{route('reciepts.index')}}" class="btn btn-primary">Clear Filter</a>
                <button type="submit" form="reciept-filter-form" class="btn btn-primary">Filter</button>
            </div>
        </div>
    </div>
</div>
