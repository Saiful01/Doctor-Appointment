@extends("layouts.details")
@section('title', 'Appointment')
@section("content")

    <!-- Hero Start -->
    <section class="bg-half-150 d-table w-100 bg-light"
             style="background: url('/assets/images/bg/bg-lines-one.png') center;">


        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card border-0 shadow rounded overflow-hidden">
                        <ul class="nav nav-pills nav-justified flex-column flex-sm-row rounded-0 shadow overflow-hidden bg-light mb-0"
                            id="pills-tab" role="tablist">

                            <li class="nav-item" role="presentation">
                                <a class="nav-link rounded-0 active" id="online-booking" data-bs-toggle="pill"
                                   href="#pills-online" role="tab" aria-controls="pills-online" aria-selected="true">
                                    <div class="text-center pt-1 pb-1">
                                        <h5 class="fw-medium mb-0">AMZ Hospital Ltd</h5>
                                    </div>
                                </a><!--end nav link-->
                            </li><!--end nav item-->
                            <li class="nav-item" role="presentation">
                                <a class="nav-link rounded-0" id="clinic-booking" data-bs-toggle="pill"
                                   href="#pills-clinic" role="tab" aria-controls="pills-clinic" aria-selected="false"
                                   tabindex="-1">
                                    <div class="text-center pt-1 pb-1">
                                        <h5 class="fw-medium mb-0">Farazy Hospital Banasree</h5>
                                    </div>
                                </a><!--end nav link-->
                            </li><!--end nav item-->


                        </ul>

                        <div class="tab-content p-4" id="pills-tabContent">
                            <div class="tab-pane fade" id="pills-clinic" role="tabpanel"
                                 aria-labelledby="clinic-booking">
                                <form>
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Appoint Date Type</label>
                                                <select class="form-select form-control"
                                                        ng-model="appointment_date_type"
                                                        ng-change="appointmentDateType2(appointment_date_type)"
                                                        name="appointment_date_type">
                                                    <option value="Today">Today</option>
                                                    <option value="Other">Other</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6" id="date-area2">
                                            <div class="mb-3">
                                                <label class="form-label">Appoint Date</label>
                                                <input class="form-control" type="date" name="appoint_date"
                                                       ng-model="appoint_date">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">

                                            <div class="mb-3">
                                                <label class="form-label">Please Select Your Serial <span
                                                        class="text-danger">*</span></label> <br>
                                                @foreach($hospital1 as $item)
                                                    <span style="width: 100%;"
                                                        ng-click="serialCheck({{$item->is_book}}, '{{$item->id}}' , $event)"
                                                        ng-class="{'btn-primary': {{$item->is_book}} == 0, 'btn-danger': {{$item->is_book}} == 1, 'btn-success': {{$item->is_book}} == 0 && selectedButton == '{{$item->title}}'}"
                                                        class="btn mt-1">
                                                        {{$item->title}}
                                                    </span>
                                                @endforeach
                                            </div>
                                        </div>


                                        <input type="hidden" name="serial_id" id="selectedTitleInput"
                                               ng-model="selectedTitle" readonly>


                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Appoint Type</label>
                                                <select class="form-select form-control" ng-model="appoint_type"
                                                        name="appoint_type">
                                                    <option value="New Visit">New Visit</option>
                                                    <option value="Report Visit">Report Visit</option>
                                                    <option value="Re Visit">Re Visit</option>

                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6" >
                                            <div class="mb-3">
                                                <label class="form-label">Apply Type</label>
                                                <select class="form-select form-control"
                                                        ng-model="selectedApplicantType"
                                                        ng-change="applicantType2(selectedApplicantType)"
                                                        name="applicant_type"
                                                        required> <!-- Add 'required' attribute for validation -->
                                                    <option value="" disabled>Select Apply Type</option> <!-- Add a disabled option -->
                                                    <option value="Self">Self</option>
                                                    <option value="Other">Other</option>
                                                </select>
                                            </div>
                                        </div>


                                    </div><!--end row-->

                                    <div id="guest2">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Patient Name <span
                                                            class="text-danger">*</span></label>
                                                    <input name="name" ng-model="name" type="text"
                                                           class="form-control" placeholder="Patient Name :">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Patient Phone <span
                                                            class="text-danger">*</span></label>
                                                    <input name="phone" ng-model="phone" type="text"
                                                           class="form-control" placeholder="Patient Phone :">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Age <span
                                                            class="text-danger">*</span></label>
                                                    <input name="age" ng-model="age" type="number"
                                                           class="form-control" placeholder="Patient Age :">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Address <span class="text-danger">*</span></label>
                                                    <input name="address" ng-model="address" type="text"
                                                           class="form-control" placeholder="Patient Address :">
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-lg-12">
                                        <div class="d-grid">
                                            <button ng-click="appointmentStore()" class="btn btn-primary">Book An
                                                Appointment
                                            </button>
                                        </div>
                                    </div><!--end col-->


                                </form>
                            </div>

                            <div class="tab-pane fade active show" id="pills-online" role="tabpanel"
                                 aria-labelledby="online-booking">
                                <form>
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Appoint Date Type</label>
                                                <select class="form-select form-control"
                                                        ng-model="appointment_date_type"
                                                        ng-change="appointmentDateType(appointment_date_type)"
                                                        name="appointment_date_type">
                                                    <option value="Today">Today</option>
                                                    <option value="Other">Other</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6" id="date-area">
                                            <div class="mb-3">
                                                <label class="form-label">Appoint Date</label>
                                                <input class="form-control" type="date" name="appoint_date"
                                                       ng-model="appoint_date">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">

                                            <div class="mb-3">
                                                <label class="form-label">Please Select Your Serial <span
                                                        class="text-danger">*</span></label> <br>
                                                @foreach($hospital2 as $item)
                                                    <span
                                                        ng-click="serialCheck({{$item->is_book}}, '{{$item->id}}' , $event)"
                                                        ng-class="{'btn-primary': {{$item->is_book}} == 0, 'btn-danger': {{$item->is_book}} == 1, 'btn-success': {{$item->is_book}} == 0 && selectedButton == '{{$item->title}}'}"
                                                        class="btn mt-1">
                                                        {{$item->title}}
                                                    </span>
                                                @endforeach
                                            </div>
                                        </div>


                                        <input type="hidden" name="serial_id" id="selectedTitleInput"
                                               ng-model="selectedTitle" readonly>


                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Appoint Type</label>
                                                <select class="form-select form-control" ng-model="appoint_type"
                                                        name="appoint_type">
                                                   <option value="New Visit">New Visit</option>
                                                    <option value="Report Visit">Report Visit</option>
                                                    <option value="Re Visit">Re Visit</option>

                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6" >
                                            <div class="mb-3">
                                                <label class="form-label">Apply Type</label>
                                                <select class="form-select form-control"
                                                        ng-model="selectedApplicantType"
                                                        ng-change="applicantType(selectedApplicantType)"
                                                        name="applicant_type"
                                                        required> <!-- Add 'required' attribute for validation -->
                                                    <option value="" disabled>Select Apply Type</option> <!-- Add a disabled option -->
                                                    <option value="Self">Self</option>
                                                    <option value="Other">Other</option>
                                                </select>
                                            </div>
                                        </div>


                                    </div><!--end row-->

                                    <div id="guest">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Patient Name <span
                                                            class="text-danger">*</span></label>
                                                    <input name="name" ng-model="name" type="text"
                                                           class="form-control" placeholder="Patient Name :">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Patient Phone <span
                                                            class="text-danger">*</span></label>
                                                    <input name="phone" ng-model="phone" type="text"
                                                           class="form-control" placeholder="Patient Phone :">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">DOB <span
                                                            class="text-danger">*</span></label>
                                                    <input name="dob" ng-model="dob" type="date"
                                                           class="form-control" placeholder="Patient Date Of Birth :">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Address <span class="text-danger">*</span></label>
                                                    <input name="address" ng-model="address" type="text"
                                                           class="form-control" placeholder="Patient Address :">
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-lg-12">
                                        <div class="d-grid">
                                            <button ng-click="appointmentStore()" class="btn btn-primary">Book An
                                                Appointment
                                            </button>
                                        </div>
                                    </div><!--end col-->


                                </form>
                            </div>
                        </div>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->


    </section><!--end section-->
    <!-- Hero End -->

@endsection
