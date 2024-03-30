<form class="step-2" method="POST" action="{{route('store-booking-step-2')}}">
    @csrf
    <div class="form-group row">
        <label for="exampleInputUsername2" class="col-sm-5 col-form-label">Package Type</label>
        <div class="col-sm-7">
            <select class="select2-single" id="package_type" name="package_type">
                <option></option>
                <option value="STANDARD">Standard</option>
                <option value="CUSTOM">Custom</option>
            </select>
        </div>
    </div>
    <div class="form-group row" id="package_name_field">
        <label for="exampleInputUsername2" class="col-sm-5 col-form-label">Package</label>
        <div class="col-sm-7">
            <select class="select2-single" id="packageDropdown" name="package_id">
                <option></option>
                @foreach ($packages as $package)
                    <option value="{{ $package->id }}">{{ $package->package_name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group row">
        <label for="exampleInputUsername1" class="col-sm-5 col-form-label">Cost Per Person</label>
        <div class="col-sm-7">
            <input id="cost_per_person" class="form-control" placeholder="Enter Cost Per Person" name="agent-name"
                type="text">
        </div>
    </div>
    <h4 class="mt-3">Package Details</h4>
    <hr />
    <div id="standard_package">
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label class="control-label">Maktab Category</label>
                    <select class="select2-single" id="maktab_category">
                        <option></option>
                        @foreach ($maktab_categories as $maktab_category)
                            <option value="{{ $maktab_category->id }}">{{ $maktab_category->maktab_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label class="control-label">Duration of Stay</label>
                    <select class="select2-single" id="duration_of_stay" name="duration_of_stay">
                        <option></option>
                        <option value="10 Days">10 Days</option>
                        <option value="12 Days">12 Days</option>
                        <option value="14-16 Days">14-16 Days</option>
                        <option value="14-18 Days">14-18 Days</option>
                        <option value="18-22 Days">18-22 Days</option>
                        <option value="22-25 Days">22-25 Days</option>
                        <option value="28-32 Days">28-32 Days</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label class="control-label">Nature</label>
                    <select class="select2-single" id="nature">
                        <option></option>
                        <option value="FIX">Fix</option>
                        <option value="SHIFTING">Shifting</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label class="control-label">Aziziah Accomodation</label>
                    <select class="select2-single" id="aziziya_accommodation_id">
                        <option></option>
                        @foreach ($aziziyah_accomodations as $aziziyah_accomodation)
                            <option value="{{ $aziziyah_accomodation->id }}">{{ $aziziyah_accomodation->hotel_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label class="control-label">Makkah Accomodation</label>
                    <select class="select2-single" id="makkah_accommodation_id">
                        <option></option>
                        @foreach ($makkah_accomodations as $makkah_accomodation)
                            <option value="{{ $makkah_accomodation->id }}">{{ $makkah_accomodation->hotel_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label class="control-label">Makkah Room Sharing Capacity</label>
                    <select class="select2-single" id="makkah_room_sharing">
                        <option></option>
                        <option value="SHARING">Sharing</option>
                        <option value="TRIPLE">Triple</option>
                        <option value="QUAD">Quad Double</option>
                    </select>
                </div>
            </div>


        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label class="control-label">Madinah Accomodation</label>
                    <select class="select2-single" id="madinah_accommodation_id">
                        <option></option>
                        @foreach ($madinah_accomodations as $madinah_accomodation)
                            <option value="{{ $madinah_accomodation->id }}">{{ $madinah_accomodation->hotel_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label class="control-label">Madinah Room Sharing Capacity</label>
                    <select class="select2-single" id="madinah_room_sharing">
                        <option></option>
                        <option value="SHARING">Sharing</option>
                        <option value="TRIPLE">Triple</option>
                        <option value="QUAD">Quad Double</option>
                        
                    </select>
                </div>
            </div>


        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label class="control-label">Food</label>
                    <select class="select2-single" id="food_type_id">
                        <option></option>
                         @foreach ($food_types as $food_type)
                            <option value="{{ $food_type->id }}">{{ $food_type->food_type_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label class="control-label">Special Transport</label>
                    <select class="select2-single" id="special_transport">
                        <option></option>
                        <option value="INCLUDED">Included</option>
                        <option value="NOT_INCLUDED">Not Included</option>
                    </select>
                </div>
            </div>


        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 text-right">
            {{-- <a href="{{ route('create-booking-step-1') }}" class="btn btn-light">
                Go Back
            </a> --}}
            <button type="submit" class="btn btn-primary">
                Save & Next
            </button>

        </div>
    </div>
</form>
