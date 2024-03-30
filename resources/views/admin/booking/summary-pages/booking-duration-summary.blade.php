<div class="row">
    <div class="col-12 col-xl-12 stretch-card">
        <div class="row flex-grow">
            @for ($i = 0; $i < 6; $i++)
                <div class="col-md-4 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-baseline">
                                <h6 class="card-title mb-2">Duration {{ $i + 1 }} Bookings</h6>

                            </div>
                            <div class="row">
                                <div class="col-6 col-md-12 col-xl-5">
                                    <h3 class="mb-2">3,897</h3>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            @endfor
        </div>
    </div>
</div> <!-- row -->