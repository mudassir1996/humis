<form class="step-1" method="POST" action="{{route('store-booking-step-1')}}">
    @csrf
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label class="control-label">Company</label>
                <select class="select2-single" name="company_id" id="companyDropdown">
                    <option></option>
                    @foreach ($companies as $company)
                        <option value="{{ $company->id }}">{{ $company->company_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label class="control-label">Booking Office Country</label>
                <select class="select2-single" name="booking_office_id" id="bookingOfficeDropdown">
                    <option></option>
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label class="control-label">Client Country</label>
                <select class="select2-single" name="client_country">
                    <option></option>
                    <option value="Pakistan">Pakistan</option>
                    <option value="USA">USA</option>
                    <option value="UAE">UAE</option>
                </select>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label class="control-label">Booking Nature</label>
                <select class="select2-single" id="booking-nature" name="booking_nature">
                    <option></option>
                    <option value="WA">With Agent</option>
                    <option value="WOA">Without Agent</option>
                </select>
            </div>
        </div>
    </div>
    <div class="row" id="agent-fields">
        <div class="col-lg-6">
            <div class="form-group">
                <label class="control-label">Agent Name</label>
                <select class="select2-single" name="agent_name">
                    <option></option>
                    @foreach ($agents as $agent)
                        <option value="{{ $agent->id }}">{{ $agent->agent_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label class="control-label">Agent Commission</label>
                <input id="agent-name" class="form-control" name="agent_commission" placeholder="Enter Agent Commission"
                    name="agent-name" type="text">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label class="control-label">Number of Hujjaj</label>
                <input id="agent-name" name="num_of_hujjaj" class="form-control" placeholder="Enter Number Hujjaj"
                    name="agent-name" type="text">
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label class="control-label">Individual/Family</label>
                <select class="select2-single" name="companion">
                    <option></option>
                    <option value="Individual">Individual</option>
                    <option value="Family">Family</option>
                </select>
            </div>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-lg-6">
            <div class="form-group">
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" id="contact-person" value="0" name="contact_person" checked>
                        Contact Person Same as Haji </label>
                </div>
            </div>

        </div>
    </div>
    <div class="row contact-person-details">
        <div class="col-lg-6">
            <div class="form-group">
                <label class="control-label">Contact Person Surname</label>
                <input id="agent-name" name="contact_name" class="form-control"
                    placeholder="Enter Contact Person Surname" name="agent-name" type="text">
            </div>

        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label class="control-label">Contact Person Given Name</label>
                <input id="agent-name" name="contact_surname" class="form-control"
                    placeholder="Enter Contact Person Given Name" name="agent-name" type="text">
            </div>
        </div>
    </div>
    <div class="row contact-person-details">
        <div class="col-lg-6">
            <div class="form-group">
                <label class="control-label">Contact Person Mobile Number</label>
                <input id="agent-name" name="contact_mobile" class="form-control"
                    placeholder="Enter Contact Person Mobile Number" name="agent-name" type="text">
            </div>

        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 text-right">
            <button type="submit" class="btn btn-primary">
                Save & Next
            </button>
            {{-- <a href="{{ route('create-booking-step-2') }}" class="btn btn-primary">
                Save & Next
            </a> --}}
        </div>
    </div>
</form>