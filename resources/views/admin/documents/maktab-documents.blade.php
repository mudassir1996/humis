@extends('layouts.app')
@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/vendors/select2/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/dropify/dist/dropify.min.css') }}">
@endsection
@section('content')
    <div class="row justify-content-center" id="reciept-voucher">
        <div class="col-lg-10">
            <div class="card">
                <div class="card-body">
                    <form method="post" action="{{route('maktab-documents-store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-5 justify-content-center align-items-center">
                            <div class="col-lg-12 text-center">
                                <h4>Maktab Document/Agreement</h4>
                            </div>
                        </div>
                        <div class="row" id="agent-fields">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="control-label">Maktab Category</label>
                                    <select class="select2-single" onchange="getMaktabBookings()" id="maktab_category_id" name="maktab_category_id">
                                        <option></option>
                                        @foreach ($maktab_categories as $maktab_category)
                                                <option value="{{ $maktab_category->id }}">
                                                    {{ $maktab_category->maktab_name }}</option>
                                            @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="control-label">Total Number of Hajji</label>
                                    <input id="total_seats" class="form-control" readonly name="total_seats"
                                        type="text">
                                </div>
                            </div>
                        </div>
                        <div class="row" id="agent-fields">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="control-label">Total Seats Booked</label>
                                    <input id="booked_seats" class="form-control" name="booked_seats"
                                        type="number">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="control-label">Attachment</label>
                                    <input type="file" id="passportDropify" class="border" name="attachment" />

                                </div>
                            </div>

                        </div>





                        <div class="row">
                            <div class="col-lg-12 text-right">

                                <button type="submit" class="btn btn-primary">
                                    Submit
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
    <script>
         function getMaktabBookings() {
            const postData = {
                "_token": "{{ csrf_token() }}",
                "id": $('#maktab_category_id').val(),
            }
            $.ajax({
                url: '/maktab-categories/calculate-sum-application',
                type: 'POST',
                data: postData,
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    $("#total_seats").val(data.num_of_hujjaj??0)
                    $("#booked_seats").val(data.num_of_hujjaj??0)

                },
                error: function(xhr, status, error) {
                    console.error('Error fetching booking offices:', error);

                }
            });

        }
    </script>
@endsection
