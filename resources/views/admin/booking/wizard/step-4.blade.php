<form class="step-3" method="post" action="{{route('store-booking-step-4')}}">
    @csrf
    <div class="row mb-3 justify-content-between align-items-center">
        <div class="col-lg-6 col-12">
            <h3>Final Cost Details</h3>
        </div>
    </div>
    @php
        $booking = request()->session()->get('booking');
        $applications = request()->session()->get('applications', []);
        $total_cost = 0;
        $total_cost_per_person = 0;
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
                        @php
                            $total_cost_per_person += $application->cost_per_person;
                        @endphp
                        <tr>
                            <td>{{ $application->given_name . ' ' . $application->surname }}</td>
                            <td>SAR {{ $application->cost_per_person }}</td>
                        </tr>
                    @endforeach
                    @php
                        $total_cost += $total_cost_per_person;
                    @endphp
                </tbody>
            </table>
        </div>
    </div>

    <div class="row pb-4">
        <div class="col-md-12 ml-auto">

            <div class="form-group row align-items-center justify-content-between">
                <label for="exampleInputUsername2" class="col-sm-7 col-4">Discount</label>
                <div class="col-sm-5 col-8">
                    <input type="number" class="form-control" id="discount" name="discount" placeholder="Enter Discount">

                </div>
            </div>
            <div class="form-group row align-items-center justify-content-between">
                <label for="exampleInputUsername2" class="col-sm-7 col-4">Net Cost Per Person</label>
                <div class="col-sm-5 col-8 text-right">
                    SAR <span id="net_cost">{{ $total_cost }}</span>
                    <input type="hidden" class="form-control" value="{{ $total_cost }}" id="net_total" name="net_total">

                </div>
            </div>
            <div class="form-group row align-items-center justify-content-between">
                <label for="exampleInputUsername2" class="col-sm-7 col-4">Commission</label>
                <div class="col-sm-5 col-8">
                    <input type="number" name="commission" class="form-control" {{ $booking->booking_nature == 'WOA' ? 'disabled' : '' }}
                        id="commission" placeholder="Enter Commission"
                        value="{{ $booking->agent_commission * $booking->num_of_hujjaj }}">

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
                                <input type="hidden" class="form-control" value="{{ $total_cost}}" id="total_cost" name="grand_total">
                                <h5>PKR <span id="total_cost_preview">{{ $total_cost }}</span></h5>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>



    <div class="row">
        <div class="col-lg-12 text-right">
            {{-- <a href="{{ route('create-booking-step-2') }}" class="btn btn-light">
                Go Back
            </a> --}}
            <button type="submit" class="btn btn-primary">
                Save
            </button>
            {{-- <a href="{{ route('bookings') }}" class="btn btn-primary">
                Save
            </a> --}}
        </div>
    </div>
</form>
