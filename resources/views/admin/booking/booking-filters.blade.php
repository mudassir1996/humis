<div class="modal" id="filterModal" aria-labelledby="filterModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="filterModalLabel">Filter Bookings</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="btn-close"></button>
            </div>
            <div class="modal-body">
                <form method="get" id="booking-filter-form" action="{{request()->route()->getName()=='complete-list'?route('complete-list'):route('bookings')}}">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="control-label">Maktab</label>
                                <select class="form-control" name="maktab_category_id">
                                    <option></option>
                                    @foreach ($maktab_categories as $maktab_category)
                                        <option value="{{ $maktab_category->id }}" {{request()->maktab_category_id==$maktab_category->id?"selected":""}}>
                                            {{ $maktab_category->maktab_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="control-label">Departure Airport</label>
                                <select class="form-control" name="airport_id">
                                    <option></option>
                                    @foreach ($airports as $airport)
                                        <option value="{{ $airport->id }}" {{request()->airport_id==$airport->id?"selected":""}}>{{ $airport->airport_name }}</option>
                                    @endforeach
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
                                        <option value="{{ $makkah_accomodation->id }}" {{request()->makkah_accomodation_id==$makkah_accomodation->id?"selected":""}}>
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
                                        <option value="{{ $madinah_accomodation->id }}" {{request()->madinah_accomodation_id==$madinah_accomodation->id?"selected":""}}>
                                            {{ $madinah_accomodation->hotel_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="control-label">Duration of Stay</label>
                                <select class="select2-single" name="duration_of_stay">
                                    <option></option>
                                    <option {{request()->duration_of_stay=="10 Days"?"selected":""}} value="10 Days">10 Days</option>
                                    <option {{request()->duration_of_stay=="12 Days"?"selected":""}} value="12 Days">12 Days</option>
                                    <option {{request()->duration_of_stay=="14-16 Days"?"selected":""}} value="14-16 Days">14-16 Days</option>
                                    <option {{request()->duration_of_stay=="14-18 Days"?"selected":""}} value="14-18 Days">14-18 Days</option>
                                    <option {{request()->duration_of_stay=="18-22 Days"?"selected":""}} value="18-22 Days">18-22 Days</option>
                                    <option {{request()->duration_of_stay=="22-25 Days"?"selected":""}} value="22-25 Days">22-25 Days</option>
                                    <option {{request()->duration_of_stay=="28-32 Days"?"selected":""}} value="28-32 Days">28-32 Days</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <a href="{{request()->route()->getName()=='complete-list'?route('complete-list'):route('bookings')}}" class="btn btn-outline-primary">Clear Filter</a>
                <button type="submit" form="booking-filter-form" class="btn btn-primary">Filter</button>
            </div>
        </div>
    </div>
</div>
