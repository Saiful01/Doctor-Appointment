@extends("layouts.details")
@section('title', 'Sign-Up')
@section("content")

    <section class="bg-dashboard">
        <div class="container-fluid">
            <div class="row">

                @include('frontend.patient.panel_common')
                <div class="col-xl-9 col-lg-8 mt-4 pt-2 mt-sm-0 pt-sm-0">

                    <div class="card border-0 shadow overflow-hidden">
                        <div class="row mt-5">
                            <h5> Latest Appointment</h5>
                            <div class="col-12 mt-4">
                                <div class="table-responsive bg-white shadow rounded">
                                    <table class="table mb-0 table-center">
                                        <thead>
                                        <tr>

                                            <th class="border-bottom p-3" style="min-width: 180px;">Serial</th>
                                            <th class="border-bottom p-3" style="min-width: 150px;">Date</th>
                                            <th class="border-bottom p-3">Appoint Type</th>
                                            <th class="border-bottom p-3">Applicant Type</th>
                                            <th class="border-bottom p-3" >Status</th>
                                            <th class="border-bottom p-3" ></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($appointments as $item)
                                            <tr>

                                                <td class="p-3">
                                                    {{$item->serial->title}}
                                                </td>
                                                <td class="p-3">{{$item->appoint_date}}</td>
                                                <td class="p-3">{{$item->appoint_type}}</td>
                                                <td class="p-3">

                                                    {{$item->applicant_type}}

                                                    @if($item->applicant_type == "Other")

                                                        Name: {{$item->guest_patient->name}}<br>
                                                        Phone: {{$item->guest_patient->phone}}<br>
                                                        Address: {{$item->guest_patient->address}}<br>
                                                    @endif

                                                </td>
                                                <td class="p-3">{{$item->status->title}}</td>

                                                <td class="text-end p-3">
                                                    <a href="#" class="btn btn-icon btn-pills btn-soft-primary" data-bs-toggle="modal" data-bs-target="#viewappointment"><i class="ri-eye-2-fill"></i></a>
                                                </td>
                                            </tr>

                                        @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>  </div>




                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </section>
@endsection
