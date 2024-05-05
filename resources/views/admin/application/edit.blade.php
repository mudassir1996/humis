@extends('layouts.app')
@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/vendors/select2/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/dropify/dist/dropify.min.css') }}">
@endsection
@section('content')
    {{-- <div class="d-flex justify-content-center align-items-center flex-wrap grid-margin">
        <h4>Edit Ticket</h4>
    </div> --}}
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card">
                <div class="card-body">
                    <form class="step-3" method="post" id="bookingStep3" action="{{ route('applications.update',$application->id) }}"
                        enctype="multipart/form-data">
                        @method('put')
                        @csrf

                        <div class="row mb-3 justify-content-between align-items-center">
                            <div class="col-lg-6 col-12">
                                <h3>
                                    Edit Haji information
                                </h3>
                            </div>
                            <div class="col-lg-6 text-lg-right col-12 py-3">
                                <h6 class="mb-1">Booking #{{ $booking->booking_number }}</h6>
                                <h6>Application #{{ $application->application_number }}</h6>
                            </div>
                        </div>


                        <h4 class="mt-3">Personal Information</h4>
                        <hr />
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="control-label">Given Name <span class="text-danger">*</span></label>
                                    <input id="agent-name" value="{{ $application->given_name }}" class="form-control"
                                        placeholder="Enter Given Name" name="given_name" type="text">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="control-label">Surname <span class="text-danger">*</span></label>
                                    <input id="agent-name" value="{{ $application->surname }}" class="form-control"
                                        placeholder="Enter Surname" name="surname" type="text">
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="control-label">Father's/Husband's Name <span class="text-danger">*</span></label>
                                    <input id="agent-name" value="{{ $application->father_husband_name }}"
                                        class="form-control" placeholder="Enter Father's/Husband's Name"
                                        name="father_husband_name" type="text">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="control-label">Passport No. <span class="text-danger">*</span></label>
                                    <input id="agent-name" value="{{ $application->passport }}" class="form-control"
                                        placeholder="Enter Passport No." name="passport" type="text">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="control-label">Date of Issue</label>
                                    <div class="input-group date datepicker" id="datePickerIssueDate">
                                        <input type="text" value="{{ $application->date_issue }}" class="form-control"
                                            name="date_issue"><span class="input-group-addon"><i
                                                data-feather="calendar"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="control-label">Date of Expiry</label>
                                    <div class="input-group date datepicker" id="datePickerExpiryDate">
                                        <input type="text" value="{{ $application->date_expiry }}" class="form-control"
                                            name="date_expiry"><span class="input-group-addon"><i
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
                                        <input type="text" value="{{ $application->date_birth }}" class="form-control"
                                            name="date_birth"><span class="input-group-addon"><i
                                                data-feather="calendar"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="control-label">CNIC/NICOP <span class="text-danger">*</span></label>
                                    <input class="form-control" value="{{ $application->cnic }}"
                                        data-inputmask-alias="99999-9999999-9" name="cnic"
                                        placeholder="Enter CNIC/NICOP" />
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="control-label">Blood Group <span class="text-danger">*</span></label>
                                    <select class="select2-single" name="blood_group">
                                        <option></option>
                                        <option {{ $application->blood_group == 'O-' ? 'selected' : '' }} value="O-">
                                            O-</option>
                                        <option {{ $application->blood_group == 'O+' ? 'selected' : '' }} value="O+">
                                            O+</option>
                                        <option {{ $application->blood_group == 'A-' ? 'selected' : '' }} value="A-">
                                            A-</option>
                                        <option {{ $application->blood_group == 'A+' ? 'selected' : '' }} value="A+">
                                            A+</option>
                                        <option {{ $application->blood_group == 'B-' ? 'selected' : '' }} value="B-">
                                            B-</option>
                                        <option {{ $application->blood_group == 'B+' ? 'selected' : '' }} value="B+">
                                            B+</option>
                                        <option {{ $application->blood_group == 'AB-' ? 'selected' : '' }} value="AB-">
                                            AB-</option>
                                        <option {{ $application->blood_group == 'AB+' ? 'selected' : '' }} value="AB+">
                                            AB+</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="control-label">Gender <span class="text-danger">*</span></label>
                                    <select class="select2-single" name="gender" id="gender">
                                        <option></option>
                                        <option value="Male" {{ $application->gender == 'Male' ? 'selected' : '' }}>Male
                                        </option>
                                        <option value="Female" {{ $application->gender == 'Female' ? 'selected' : '' }}>
                                            Female</option>
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
                                        <option value="Sunni" {{ $application->fiqah == 'Sunni' ? 'selected' : '' }}>
                                            Sunni</option>
                                        <option value="Shia" {{ $application->fiqah == 'Shia' ? 'selected' : '' }}>Shia
                                        </option>

                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="control-label">Marital Status</label>
                                    <select class="select2-single" name="marital_status">
                                        <option></option>
                                        <option value="Single"
                                            {{ $application->marital_status == 'Single' ? 'selected' : '' }}>Single
                                        </option>
                                        <option value="Married"
                                            {{ $application->marital_status == 'Married' ? 'selected' : '' }}>Married
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="control-label">Address</label>
                                    <input id="agent-name" value="{{ $application->address }}" class="form-control"
                                        placeholder="Enter Address" name="address" type="text">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="control-label">Mobile No <span class="text-danger">*</span></label>
                                    <input id="agent-name" value="{{ $application->mobile_number }}"
                                        name="mobile_number" class="form-control" data-inputmask-alias="+999999999999"
                                        placeholder="Enter Mobile No">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="control-label">WhatsApp No</label>
                                    <input id="agent-name" value="{{ $application->whatsapp_number }}"
                                        name="whatsapp_number" class="form-control" data-inputmask-alias="+999999999999"
                                        placeholder="Enter WhatsApp No">
                                </div>
                            </div>
                        </div>

                        <div id="mehram_details">
                            <h4 class="mt-3">Mehram Details</h4>
                            <hr />

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label">Name</label>
                                        <input id="agent-name" value="{{ $application->mehram_name }}"
                                            class="form-control" placeholder="Enter Name" name="mehram_name"
                                            type="text">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label">Relation with Mehram</label>
                                        <select class="select2-single" name="mehram_relation">
                                            <option></option>
                                            @foreach ($relationships as $key => $value)
                                                <option value="{{ $key }}"
                                                    {{ $application->mehram_relation == $key ? 'selected' : '' }}>
                                                    {{ $value }}</option>
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
                                    <input id="agent-name" value="{{ $application->nominee_name }}" class="form-control"
                                        placeholder="Enter Name" name="nominee_name" type="text">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="control-label">Relation with Nominee</label>
                                    <select class="select2-single" name="nominee_relation">
                                        <option></option>
                                        @foreach ($relationships as $key => $value)
                                            <option value="{{ $key }}"
                                                {{ $application->nominee_relation == $key ? 'selected' : '' }}>
                                                {{ $value }}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="control-label">Nominee CNIC</label>
                                    <input class="form-control" value="{{ $application->nominee_cnic }}"
                                        name="nominee_cnic" data-inputmask-alias="99999-9999999-9"
                                        placeholder="Enter CNIC" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="control-label">Nominee Mobile No</label>
                                    <input id="agent-name" value="{{ $application->nominee_mobile }}"
                                        name="nominee_mobile" class="form-control" data-inputmask-alias="+999999999999"
                                        placeholder="Enter Nominee Mobile No">
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
                                        <option value="INCLUDED"
                                            {{ $application->qurbani == 'INCLUDED' ? 'selected' : '' }}>Included</option>
                                        <option value="NOT_INCLUDED"
                                            {{ $application->qurbani == 'NOT_INCLUDED' ? 'selected' : '' }}>Not Included
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="control-label">Room Sharing Capacity (Makkah &
                                        Madinah)</label>
                                    <select class="select2-single" name="room_sharing">
                                        <option></option>
                                        <option value="SHARING"
                                            {{ $application->makkah_room_sharing == 'SHARING' && $application->madinah_room_sharing == 'SHARING' ? 'selected' : '' }}>
                                            Sharing</option>
                                        <option value="TRIPLE"
                                            {{ $application->makkah_room_sharing == 'TRIPLE' && $application->madinah_room_sharing == 'TRIPLE' ? 'selected' : '' }}>
                                            Triple</option>
                                        <option value="DOUBLE"
                                            {{ $application->makkah_room_sharing == 'DOUBLE' && $application->madinah_room_sharing == 'DOUBLE' ? 'selected' : '' }}>
                                            Double</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="control-label">Ticket</label>
                                    <select class="select2-single" name="ticket">
                                        <option value="INCLUDED"
                                            {{ $application->ticket == 'INCLUDED' ? 'selected' : '' }}>Included</option>
                                        <option value="NOT_INCLUDED"
                                            {{ $application->ticket == 'NOT_INCLUDED' ? 'selected' : '' }}>Not Included
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="control-label">Additional Facility</label>
                                    <select class="select2-single" name="additional_facility_id">
                                        <option></option>
                                        @foreach ($additional_facilities as $additional_facility)
                                            <option value="{{ $additional_facility->id }}"
                                                {{ $application_additional_facility?->additional_facility_id == $additional_facility->id ? 'selected' : '' }}>
                                                {{ $additional_facility->facility_title }}</option>
                                        @endforeach
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
                                        <label class="control-label">Departure Airport <span class="text-danger">*</span></label>
                                        <select class="select2-single" name="departure_airport_pk_id">
                                            <option></option>
                                            @foreach ($pk_airports as $pk_airport)
                                                <option value="{{ $pk_airport->id }}"
                                                    {{ $application->departure_airport_pk_id == $pk_airport->id ? 'selected' : '' }}>
                                                    {{ $pk_airport->airport_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="control-label">Arrival Airport (KSA) <span class="text-danger">*</span></label>
                                        <select class="select2-single" name="arrival_airport_ksa_id">
                                            <option></option>
                                            @foreach ($ksa_airports as $ksa_airport)
                                                <option value="{{ $ksa_airport->id }}"
                                                    {{ $application->arrival_airport_ksa_id == $ksa_airport->id ? 'selected' : '' }}>
                                                    {{ $ksa_airport->airport_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="control-label">Arrival Date (KSA) <span class="text-danger">*</span></label>
                                        <div class="input-group date datepicker" id="datePickerArrival">
                                            <input type="text" value="{{ $application->arrival_date_ksa }}" class="form-control" name="arrival_date_ksa"><span
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
                                        <label class="control-label">Departure Airport (KSA) <span class="text-danger">*</span></label>
                                        <select class="select2-single" name="departure_airport_ksa_id">
                                            <option></option>
                                            @foreach ($ksa_airports as $ksa_airport)
                                                <option value="{{ $ksa_airport->id }}"
                                                    {{ $application->departure_airport_ksa_id == $ksa_airport->id ? 'selected' : '' }}>
                                                    {{ $ksa_airport->airport_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="control-label">Arival Airport <span class="text-danger">*</span></label>
                                        <select class="select2-single" name="arrival_airport_pk_id">
                                            <option></option>
                                            @foreach ($pk_airports as $pk_airport)
                                                <option value="{{ $pk_airport->id }}"
                                                    {{ $application->arrival_airport_pk_id == $pk_airport->id ? 'selected' : '' }}>
                                                    {{ $pk_airport->airport_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="control-label">Departure Date (KSA) <span class="text-danger">*</span></label>
                                        <div class="input-group date datepicker" id="datePickerDeparture">
                                            <input type="text" value="{{ $application->departure_date_ksa }}" class="form-control" name="departure_date_ksa"><span
                                                class="input-group-addon"><i data-feather="calendar"></i></span>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </fieldset>


                        <h4 class="mt-3">Attachments</h4>
                        <hr />
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="control-label">Scan of Passport</label>
                                    <input type="file" id="passportDropify" class="border"
                                        name="attachment_passport" data-default-file="{{$application->attachment_passport!=''?url('/').$application->attachment_passport:''}}" />
                                    {{-- data-max-file-size="500K" --}}
                                    {{-- data-allowed-file-extensions="png jpg" --}}
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="control-label">Scan of CNIC/NICOP</label>
                                    {{-- data-min-file-size="5K"
                                    data-max-file-size="12K" --}}
                                    <input type="file" id="cnicDropify" class="border" name="attachment_cnic" data-default-file="{{$application->attachment_cnic!=''?url('/').$application->attachment_cnic:''}}" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="control-label">Picture</label>
                                    <input type="file" id="pictureDropify" class="border"
                                        name="attachment_picture" data-default-file="{{$application->attachment_picture!=''?url('/').$application->attachment_picture:''}}" />
                                    {{-- data-min-file-size="5K"
                                    data-max-file-size="12K" data-max-width="165" data-max-height="185"  --}}
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="control-label">Medical Certificate</label>
                                    {{-- data-min-file-size="500K" --}}
                                    <input type="file" id="medicalDropify" class="border"
                                        name="attachment_medical" data-default-file="{{$application->attachment_medical!=''?url('/').$application->attachment_medical:''}}" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="control-label">Other Attachments</label>
                                    {{-- data-min-file-size="500K" --}}
                                    <input type="file" id="otherDropify" class="border" name="attachment_other" data-default-file="{{$application->attachment_other!=''?url('/').$application->attachment_other:''}}" />
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-lg-12 text-right">

                                <button type="submit" class="btn btn-primary">
                                    Save & Next
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
    <script src="{{ asset('assets/vendors/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('assets/js/form-validation.js') }}"></script>
    <script>
        $(document).ready(() => {
            var gender = $("#gender").val();
            if (gender == 'Female') {
                $("#mehram_details").show();

            } else {
                $("#mehram_details").hide();

            }
        })
        $('#gender').on('change', function() {
            var gender = $(this).val();
            if (gender == 'Female') {
                $("#mehram_details").show();

            } else {
                $("#mehram_details").hide();

            }

        })
    </script>
@endsection
