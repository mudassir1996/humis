<div class="modal" id="filterModal" aria-labelledby="filterModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="filterModalLabel">Filter Applications</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="btn-close"></button>
            </div>
            <div class="modal-body">
                <form method="get" id="application-filter-form">

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="control-label">Maktab</label>
                                <select class="form-control" name="maktab_category_id">
                                    <option></option>
                                    @foreach ($maktab_categories as $maktab_category)
                                        <option value="{{ $maktab_category->id }}"
                                            {{ request()->maktab_category_id == $maktab_category->id ? 'selected' : '' }}>
                                            {{ $maktab_category->maktab_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="control-label">Duration of Stay</label>
                                <select class="select2-single" name="duration_of_stay">
                                    <option></option>
                                    @foreach ($stay_durations as $stay_duration)
                                        <option {{ request()->duration_of_stay == $stay_duration->duration_of_stay ? 'selected' : '' }} value="{{ $stay_duration->duration_of_stay }}">
                                            {{ $stay_duration->duration_of_stay }}</option>
                                    @endforeach
                                    
                                </select>
                            </div>
                        </div>
                        
                    </div>
                    {{-- <div class="row">
                       <div class="col-lg-6">
                            <div class="form-group">
                                <label class="control-label">Departure to KSA Airport</label>
                                <select class="form-control" name="departure_airport_pk_id">
                                    <option></option>
                                    @foreach ($airports as $airport)
                                        <option value="{{ $airport->id }}"
                                            {{ request()->airport_id == $airport->id ? 'selected' : '' }}>
                                            {{ $airport->airport_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="control-label">Arrival at KSA Airport</label>
                                <select class="form-control" name="arrival_airport_ksa_id">
                                    <option></option>
                                    @foreach ($airports as $airport)
                                        <option value="{{ $airport->id }}"
                                            {{ request()->airport_id == $airport->id ? 'selected' : '' }}>
                                            {{ $airport->airport_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                       <div class="col-lg-6">
                            <div class="form-group">
                                <label class="control-label">Departure From KSA Airport</label>
                                <select class="form-control" name="departure_airport_ksa_id">
                                    <option></option>
                                    @foreach ($airports as $airport)
                                        <option value="{{ $airport->id }}"
                                            {{ request()->airport_id == $airport->id ? 'selected' : '' }}>
                                            {{ $airport->airport_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="control-label">Arrival from KSA Airport</label>
                                <select class="form-control" name="arrival_airport_pk_id">
                                    <option></option>
                                    @foreach ($airports as $airport)
                                        <option value="{{ $airport->id }}"
                                            {{ request()->airport_id == $airport->id ? 'selected' : '' }}>
                                            {{ $airport->airport_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div> --}}
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="control-label">Gender</label>
                                <select class="form-control" name="gender">
                                    <option></option>
                                    <option value="Male" {{ request()->gender == 'Male' ? 'selected' : '' }}>Male</option>
                                    <option value="Female" {{ request()->gender == 'Female' ? 'selected' : '' }}>Female</option>

                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="control-label">Individual/Family</label>
                                <select class="select2-single" name="companion">
                                    <option></option>
                                    <option value="Individual" {{ request()->companion == 'Individual' ? 'selected' : '' }}>Individual</option>
                                    <option value="Family" {{ request()->companion == 'Family' ? 'selected' : '' }}>Family</option>
                                </select>
                            </div>
                        </div>
                    </div>




                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="control-label">Makkah Hotel</label>
                                <select class="form-control" name="makkah_accomodation_id">
                                    <option></option>
                                    @foreach ($makkah_accomodations as $makkah_accomodation)
                                        <option value="{{ $makkah_accomodation->id }}"
                                            {{ request()->makkah_accomodation_id == $makkah_accomodation->id ? 'selected' : '' }}>
                                            {{ $makkah_accomodation->hotel_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="control-label">Madinah Hotel</label>
                                <select class="form-control" name="madinah_accomodation_id">
                                    <option></option>
                                    @foreach ($madinah_accomodations as $madinah_accomodation)
                                        <option value="{{ $madinah_accomodation->id }}"
                                            {{ request()->madinah_accomodation_id == $madinah_accomodation->id ? 'selected' : '' }}>
                                            {{ $madinah_accomodation->hotel_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="control-label">Makkah Room Sharing</label>
                                <select class="form-control" name="makkah_room_sharing">
                                    <option></option>
                                    <option {{ request()->makkah_room_sharing == 'SHARING' ? 'selected' : '' }}
                                        value="SHARING">Sharing</option>
                                    <option {{ request()->makkah_room_sharing == 'TRIPLE' ? 'selected' : '' }}
                                        value="TRIPLE">Triple</option>
                                    <option {{ request()->makkah_room_sharing == 'DOUBLE' ? 'selected' : '' }}
                                        value="DOUBLE">Double</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="control-label">Madinah Room Sharing</label>
                                <select class="form-control" name="madinah_room_sharing">
                                    <option></option>
                                    <option {{ request()->makkah_room_sharing == 'SHARING' ? 'selected' : '' }}
                                        value="SHARING">Sharing</option>
                                    <option {{ request()->makkah_room_sharing == 'TRIPLE' ? 'selected' : '' }}
                                        value="TRIPLE">Triple</option>
                                    <option {{ request()->makkah_room_sharing == 'DOUBLE' ? 'selected' : '' }}
                                        value="DOUBLE">Double</option>
                                </select>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="control-label">Ticket</label>
                                <select class="select2-single" name="ticket">
                                    <option></option>
                                    <option value="INCLUDED" {{ request()->ticket == 'INCLUDED' ? 'selected' : '' }}>Included</option>
                                    <option value="NOT_INCLUDED" {{ request()->ticket == 'NOT_INCLUDED' ? 'selected' : '' }}>Not Included</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="control-label">Qurbani</label>
                                <select class="select2-single" name="qurbani">
                                    <option></option>
                                    <option value="INCLUDED" {{ request()->qurbani == 'INCLUDED' ? 'selected' : '' }}>Included</option>
                                    <option value="NOT_INCLUDED" {{ request()->qurbani == 'NOT_INCLUDED' ? 'selected' : '' }}>Not Included</option>
                                </select>
                            </div>
                        </div>

                    </div>
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

                </form>
            </div>
            <div class="modal-footer">
                <a href="{{ route('applications') }}"
                    class="btn btn-primary">Clear Filter</a>
                <button type="submit" form="application-filter-form" class="btn btn-primary">Filter</button>
            </div>
        </div>
    </div>
</div>
