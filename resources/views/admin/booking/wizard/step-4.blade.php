<form class="step-3">
    <div class="row mb-3 justify-content-between align-items-center">
        <div class="col-lg-6 col-12">
            <h3>Final Cost Details</h3>
        </div>
    </div>
    @php
        $booking = request()->session()->get('booking');
        $applications = request()->session()->get('applications', []);
    @endphp

    <div class="row">
        <div class="col-lg-12">
            <table class="table table-bordered">
                <thead>
                    <th>Haji Name</th>
                    <th>Per Haji Cost</th>
                </thead>
                <tbody>
                    @foreach ($applications as $application)
                        <tr>
                            <td>{{$application->given_name." ".$application->surname}}</td>
                            <td>SAR 33,515</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="row pb-4">
        <div class="col-md-12 ml-auto">

            <div class="form-group row align-items-center justify-content-between">
                <label for="exampleInputUsername2" class="col-sm-7 col-4">Discount</label>
                <div class="col-sm-5 col-8">
                    <input type="number" class="form-control" id="exampleInputUsername2" placeholder="Enter Discount">

                </div>
            </div>
            <div class="form-group row align-items-center justify-content-between">
                <label for="exampleInputUsername2" class="col-sm-7 col-4">Net Cost Per Person</label>
                <div class="col-sm-5 col-8 text-right">
                    SAR <span id="net_cost">33515</span>
                </div>
            </div>
            <div class="form-group row align-items-center justify-content-between">
                <label for="exampleInputUsername2" class="col-sm-7 col-4">Commission</label>
                <div class="col-sm-5 col-8">
                    <input type="number" class="form-control" {{$booking->booking_nature=='WOA'?'disabled':''}} id="exampleInputUsername2"
                        placeholder="Enter Commission" value="{{$booking->agent_commission*$booking->num_of_hujjaj}}">

                </div>
            </div>
            <div class="table-responsive">
                <table class="table total-table">
                    <tbody>
                        <tr class="bg-light">
                            <td class="text-bold-800">
                                <h5>Total</h5>
                            </td>
                            <td class="text-bold-800 text-right">
                                <h5>SAR {{33515*$booking->num_of_hujjaj}}</h5>
                                <input type="hidden" id="total" />
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>



    <div class="row">
        <div class="col-lg-12 text-right">
            <a href="{{ route('create-booking-step-2') }}" class="btn btn-light">
                Go Back
            </a>
            {{-- <button type="submit" class="btn btn-primary">
                Save & Next
            </button> --}}
            <a href="{{ route('bookings') }}" class="btn btn-primary">
                Save
            </a>
        </div>
    </div>
</form>
