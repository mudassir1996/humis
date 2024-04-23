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
                                <label class="control-label">Booking No.</label>
                                <input id="booking_number" class="form-control" value="{{request()->booking_number}}" placeholder="Enter booking number"
                                    name="booking_number" type="text">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="control-label">Contact Name</label>
                                <input id="contact_name" class="form-control" value="{{request()->contact_name}}" placeholder="Enter Contact Name"
                                    name="contact_name" type="text">
                            </div>
                        </div>
                        
                    </div>
                    

                </form>
            </div>
            <div class="modal-footer">
                <a href="{{route('reciepts.index')}}" class="btn btn-outline-primary">Clear Filter</a>
                <button type="submit" form="reciept-filter-form" class="btn btn-primary">Filter</button>
            </div>
        </div>
    </div>
</div>
