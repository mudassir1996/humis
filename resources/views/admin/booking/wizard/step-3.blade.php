<form class="step-3" method="post" action="{{ route('store-booking-step-3') }}" enctype="multipart/form-data">
    @csrf
    @php
        $application_number = time();
        $booking = request()->session()->get('booking');
        $applications = request()->session()->get('applications', []);
    @endphp
    <div class="row mb-3 justify-content-between align-items-center">
        <div class="col-lg-6 col-12">
            <h3>Hujjaj information
                {{ isset($applications) ? count($applications) + 1 : 1 }}/{{ $booking->num_of_hujjaj }}
            </h3>
        </div>
        <div class="col-lg-6 text-lg-right col-12 py-3">
            <h6 class="mb-1">Booking #{{ $booking->booking_number }}</h6>
            <h6>Application #{{ $application_number }}</h6>
            <input type="hidden" name="application_number" value="{{ $application_number }}">
        </div>
    </div>


    <h4 class="mt-3">Personal Information</h4>
    <hr />
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label class="control-label">Given Name</label>
                <input id="agent-name" class="form-control" placeholder="Enter Given Name" name="given_name"
                    type="text">
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label class="control-label">Surname</label>
                <input id="agent-name" class="form-control" placeholder="Enter Surname" name="surname" type="text">
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label class="control-label">Father's/Husband's Name</label>
                <input id="agent-name" class="form-control" placeholder="Enter Father's/Husband's Name"
                    name="father_husband_name" type="text">
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label class="control-label">Passport No.</label>
                <input id="agent-name" class="form-control" placeholder="Enter Passport No." name="passport"
                    type="text">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label class="control-label">Date of Issue</label>
                <div class="input-group date datepicker" id="datePickerIssueDate">
                    <input type="text" class="form-control" name="date_issue"><span class="input-group-addon"><i
                            data-feather="calendar"></i></span>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label class="control-label">Date of Expiry</label>
                <div class="input-group date datepicker" id="datePickerExpiryDate">
                    <input type="text" class="form-control" name="date_expiry"><span class="input-group-addon"><i
                            data-feather="calendar"></i></span>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label class="control-label">Date of Birth</label>
                <div class="input-group date datepicker" id="datePickerDOB">
                    <input type="text" class="form-control" name="date_birth"><span class="input-group-addon"><i
                            data-feather="calendar"></i></span>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label class="control-label">CNIC/NICOP</label>
                <input class="form-control" data-inputmask-alias="99999-9999999-9" name="cnic"
                    placeholder="Enter CNIC/NICOP" />
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label class="control-label">Blood Group</label>
                <select class="select2-single" name="blood_group">
                    <option></option>
                    <option value="O-">O-</option>
                    <option value="O+">O+</option>
                    <option value="A-">A-</option>
                    <option value="A+">A+</option>
                    <option value="B-">B-</option>
                    <option value="B+">B+</option>
                    <option value="AB-">AB-</option>
                    <option value="AB+">AB+</option>
                </select>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label class="control-label">Gender</label>
                <select class="select2-single" name="gender" id="gender">
                    <option></option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label class="control-label">Fiqah</label>
                <select class="select2-single" name="fiqah">
                    <option></option>
                    <option value="Sunni">Sunni</option>
                    <option value="Shia">Shia</option>

                </select>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label class="control-label">Marital Status</label>
                <select class="select2-single" name="marital_status">
                    <option></option>
                    <option value="Single">Single</option>
                    <option value="Married">Married</option>
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="form-group">
                <label class="control-label">Address</label>
                <input id="agent-name" class="form-control" placeholder="Enter Address" name="address"
                    type="text">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label class="control-label">Mobile No</label>
                <input id="agent-name" name="mobile_number" class="form-control"
                    data-inputmask-alias="+999999999999" placeholder="Enter Mobile No">
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label class="control-label">WhatsApp No</label>
                <input id="agent-name" name="whatsapp_number" class="form-control"
                    data-inputmask-alias="+999999999999" placeholder="Enter WhatsApp No">
            </div>
        </div>
    </div>
    @if ($booking->contact_name == '')
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" name="is_contact_person" class="form-check-input"
                                id="contact-person" checked value="1">
                            Contact Person </label>
                    </div>
                </div>
            </div>

        </div>
    @endif
    <div id="mehram_details">
        <h4 class="mt-3">Mehram Details</h4>
        <hr />

        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label class="control-label">Name</label>
                    <input id="agent-name" class="form-control" placeholder="Enter Name" name="mehram_name"
                        type="text">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label class="control-label">Relation with Mehram</label>
                    <select class="select2-single" name="mehram_relation">
                        <option></option>
                        @foreach ($relationships as $key => $value)
                            <option value="{{ $key }}">{{ $value }}</option>
                        @endforeach
                    </select>

                </div>
            </div>
        </div>
    </div>
    <h4 class="mt-3">Nominee Details</h4>
    <hr />

    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label class="control-label">Name</label>
                <input id="agent-name" class="form-control" placeholder="Enter Name" name="nominee_name"
                    type="text">
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label class="control-label">Relation with Nominee</label>
                <select class="select2-single" name="nominee_relation">
                    <option></option>
                    @foreach ($relationships as $key => $value)
                        <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                </select>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label class="control-label">Nominee CNIC</label>
                <input class="form-control" name="nominee_cnic" data-inputmask-alias="99999-9999999-9"
                    placeholder="Enter CNIC" />
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label class="control-label">Nominee Mobile No</label>
                <input id="agent-name" name="nominee_mobile" class="form-control"
                    data-inputmask-alias="+999999999999" placeholder="Enter Nominee Mobile No">
            </div>
        </div>
    </div>
    <h4 class="mt-3">Change in Facilities</h4>
    <hr />
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label class="control-label">Qurbani</label>
                <select class="select2-single" name="qurbani">
                    <option></option>
                    <option value="INCLUDED">Included</option>
                    <option value="NOT_INCLUDED">Not Included</option>
                </select>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label class="control-label">Room Sharing Capacity (Makkah &
                    Madinah)</label>
                <select class="select2-single" name="room_sharing">
                    <option></option>
                    <option value="SHARING">Sharing</option>
                    <option value="TRIPLE">Triple</option>
                    <option value="DOUBLE">Double</option>
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label class="control-label">Ticket</label>
                <select class="select2-single" name="ticket">
                    <option selected value="INCLUDED">Included</option>
                    <option value="NOT_INCLUDED">Not Included</option>
                </select>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label class="control-label">Additional Facility</label>
                <select class="select2-single">
                    <option></option>
                </select>
            </div>
        </div>
    </div>


    <h4 class="mt-3">Ticket Information</h4>
    <hr />
    <fieldset class="form-group border p-3">
        <legend class="w-auto px-2 h6">Towards KSA</legend>
        <div class="row">
            <div class="col-lg-4">
                <div class="form-group">
                    <label class="control-label">Departure Airport</label>
                    <select class="select2-single" name="departure_airport_pk_id">
                        <option></option>
                        @foreach ($pk_airports as $pk_airport)
                            <option value="{{ $pk_airport->id }}">{{ $pk_airport->airport_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label class="control-label">Arrival Airport (KSA)</label>
                    <select class="select2-single" name="arrival_airport_ksa_id">
                        <option></option>
                        @foreach ($ksa_airports as $ksa_airport)
                            <option value="{{ $ksa_airport->id }}">{{ $ksa_airport->airport_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label class="control-label">Arrival Date (KSA)</label>
                    <div class="input-group date datepicker" id="datePickerArrival">
                        <input type="text" class="form-control" name="arrival_date_ksa"><span
                            class="input-group-addon"><i data-feather="calendar"></i></span>
                    </div>

                </div>
            </div>
        </div>

    </fieldset>
    <fieldset class="form-group border p-3">
        <legend class="w-auto px-2 h5">From KSA</legend>
        <div class="row">
            <div class="col-lg-4">
                <div class="form-group">
                    <label class="control-label">Departure Airport (KSA)</label>
                    <select class="select2-single" name="departure_airport_ksa_id">
                        <option></option>
                        @foreach ($ksa_airports as $ksa_airport)
                            <option value="{{ $ksa_airport->id }}">{{ $ksa_airport->airport_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label class="control-label">Arival Airport</label>
                    <select class="select2-single" name="arrival_airport_pk_id">
                        <option></option>
                        @foreach ($pk_airports as $pk_airport)
                            <option value="{{ $pk_airport->id }}">{{ $pk_airport->airport_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label class="control-label">Departure Date (KSA)</label>
                    <div class="input-group date datepicker" id="datePickerDeparture">
                        <input type="text" class="form-control" name="departure_date_ksa"><span
                            class="input-group-addon"><i data-feather="calendar"></i></span>
                    </div>

                </div>
            </div>
        </div>

    </fieldset>
    {{-- <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label class="control-label">Departure Airport</label>
                <select class="select2-single" name="departure_airport_pk_id">
                    <option></option>
                    @foreach ($pk_airports as $pk_airport)
                        <option value="{{ $pk_airport->id }}">{{ $pk_airport->airport_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label class="control-label">Departure Airport (KSA)</label>
                <select class="select2-single" name="departure_airport_ksa_id">
                    <option></option>
                    @foreach ($ksa_airports as $ksa_airport)
                        <option value="{{ $ksa_airport->id }}">{{ $ksa_airport->airport_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>



    </div>
    <div class="row">

        <div class="col-lg-6">
            <div class="form-group">
                <label class="control-label">Arrival Airport (KSA)</label>
                <select class="select2-single" name="arrival_airport_ksa_id">
                    <option></option>
                    @foreach ($ksa_airports as $ksa_airport)
                        <option value="{{ $ksa_airport->id }}">{{ $ksa_airport->airport_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label class="control-label">Arival Airport</label>
                <select class="select2-single" name="arrival_airport_pk_id">
                    <option></option>
                    @foreach ($pk_airports as $pk_airport)
                        <option value="{{ $pk_airport->id }}">{{ $pk_airport->airport_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>


    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label class="control-label">Arrival Date (KSA)</label>
                <div class="input-group date datepicker" id="datePickerArrival">
                    <input type="text" class="form-control" name="arrival_date_ksa"><span
                        class="input-group-addon"><i data-feather="calendar"></i></span>
                </div>

            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label class="control-label">Departure Date (KSA)</label>
                <div class="input-group date datepicker" id="datePickerDeparture">
                    <input type="text" class="form-control" name="departure_date_ksa"><span
                        class="input-group-addon"><i data-feather="calendar"></i></span>
                </div>

            </div>
        </div>



    </div> --}}


    <h4 class="mt-3">Attachments</h4>
    <hr />
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label class="control-label">Scan of Passport</label>
                <input type="file" id="passportDropify" class="border" name="attachment_passport" />
                {{-- data-max-file-size="500K" --}}
                {{-- data-default-file="https://png.pngtree.com/png-vector/20220709/ourmid/pngtree-businessman-user-avatar-wearing-suit-with-red-tie-png-image_5809521.png" --}}
                {{-- data-allowed-file-extensions="png jpg" --}}
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label class="control-label">Scan of CNIC/NICOP</label>
                {{-- data-min-file-size="5K"
                    data-max-file-size="12K" --}}
                <input type="file" id="cnicDropify" class="border" name="attachment_cnic" />
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label class="control-label">Picture</label>
                <input type="file" id="pictureDropify" class="border" name="attachment_picture" />
                {{-- data-min-file-size="5K"
                    data-max-file-size="12K" data-max-width="165" data-max-height="185"  --}}
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label class="control-label">Medical Certificate</label>
                {{-- data-min-file-size="500K" --}}
                <input type="file" id="medicalDropify" class="border" name="attachment_medical" />
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label class="control-label">Other Attachments</label>
                {{-- data-min-file-size="500K" --}}
                <input type="file" id="otherDropify" class="border" name="attachment_other" />
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-12 text-right">
            {{-- <a href="{{ route('create-booking-step-2') }}" class="btn btn-light">
                Go Back
            </a> --}}
            <button type="submit" class="btn btn-primary">
                Save & Next
            </button>
            {{-- <a href="{{ route('create-booking-step-4') }}" class="btn btn-primary">
                Save & Next
            </a> --}}
        </div>
    </div>
</form>
