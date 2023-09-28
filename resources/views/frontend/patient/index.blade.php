@extends("layouts.details")
@section('title', 'Sign-Up')
@section("content")

    <section class="bg-dashboard">
        <div class="container-fluid">
            <div class="row">

                @include('frontend.patient.panel_common')
                <div class="col-xl-9 col-lg-8 mt-4 pt-2 mt-sm-0 pt-sm-0">

                        <div class="card border-0 shadow overflow-hidden">
                            <ul class="nav nav-pills nav-justified flex-column flex-sm-row rounded-0 shadow overflow-hidden bg-light mb-0" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link rounded-0 active" id="overview-tab" data-bs-toggle="pill" href="#pills-overview" role="tab" aria-controls="pills-overview" aria-selected="true">
                                        <div class="text-center pt-1 pb-1">
                                            <h4 class="title fw-normal mb-0">Profile</h4>
                                        </div>
                                    </a><!--end nav link-->
                                </li><!--end nav item-->

                                <li class="nav-item" role="presentation">
                                    <a class="nav-link rounded-0" id="experience-tab" data-bs-toggle="pill" href="#pills-experience" role="tab" aria-controls="pills-experience" aria-selected="false" tabindex="-1">
                                        <div class="text-center pt-1 pb-1">
                                            <h4 class="title fw-normal mb-0">Profile Settings</h4>
                                        </div>
                                    </a><!--end nav link-->
                                </li><!--end nav item-->
                            </ul>

                            <div class="tab-content p-4" id="pills-tabContent">
                                <div class="tab-pane fade active show" id="pills-overview" role="tabpanel" aria-labelledby="overview-tab">
                                    <h5 class="mb-0">Introduction:</h5>
                                    <div class="row">
                                      {{--  <div class="list-unstyled p-4">
                                            <div class="progress-box mb-4">
                                                <h6 class="title">Complete your profile</h6>
                                                <div class="progress">
                                                    <div class="progress-bar position-relative bg-primary" style="width:89%;">
                                                        <div class="progress-value d-block text-muted h6">89%</div>
                                                    </div>
                                                </div>
                                            </div><!--end process box-->--}}

                                            <div class="d-flex align-items-center mt-2">
                                                <i class="ri-user-2-fill align-middle navbar-icon align-text-bottom text-primary h5 mb-0 me-2"></i>
                                                <h6 class="mb-0">Name</h6>
                                                <p class="text-muted mb-0 ms-2">{{Auth::guard('applicant')->user()->name}}</p>
                                            </div>
                                        <div class="d-flex align-items-center mt-2">
                                                <i class="ri-user-2-fill align-middle navbar-icon align-text-bottom text-primary h5 mb-0 me-2"></i>
                                                <h6 class="mb-0">Gender</h6>
                                                <p class="text-muted mb-0 ms-2">{{Auth::guard('applicant')->user()->gender}}</p>
                                            </div>

                                            <div class="d-flex align-items-center mt-2">
                                                <i class="ri-calendar-2-fill align-text-bottom text-primary h5 mb-0 me-2"></i>
                                                <h6 class="mb-0">Birthday</h6>
                                                <p class="text-muted mb-0 ms-2">{{Auth::guard('applicant')->user()->dob}}</p>
                                            </div>

                                            <div class="d-flex align-items-center mt-2">
                                                <i class="ri-phone-fill align-text-bottom text-primary h5 mb-0 me-2"></i>
                                                <h6 class="mb-0">Phone No.</h6>
                                                <p class="text-muted mb-0 ms-2">{{Auth::guard('applicant')->user()->phone}}</p>
                                            </div>

                                            <div class="d-flex align-items-center mt-2">
                                                <i class="ri-map-2-fill align-text-bottom text-primary h5 mb-0 me-2"></i>
                                                <h6 class="mb-0">Address</h6>
                                                <p class="text-muted mb-0 ms-2">{{Auth::guard('applicant')->user()->address}}</p>
                                            </div>

                                            <div class="d-flex align-items-center mt-2">
                                                <i class="ri-knife-blood-fill align-text-bottom text-primary h5 mb-0 me-2"></i>
                                                <h6 class="mb-0">Blood Group</h6>
                                                <p class="text-muted mb-0 ms-2">{{Auth::guard('applicant')->user()->blood_group}}</p>
                                            </div>
                                        </div>

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
                                    </div>
                                    </div>


                                </div>

                                <div class="tab-pane fade" id="pills-experience" role="tabpanel" aria-labelledby="experience-tab">
                                    <h5 class="mb-0">Personal Information :</h5>
                                  {{--  <div class="row align-items-center mt-4">
                                        <div class="col-lg-2 col-md-4">
                                            <img src="../assets/images/client/09.jpg" class="avatar avatar-md-md rounded-pill shadow mx-auto d-block" alt="">
                                        </div><!--end col-->

                                        <div class="col-lg-5 col-md-8 text-center text-md-start mt-4 mt-sm-0">
                                            <h6 class="">Upload your picture</h6>
                                            <p class="text-muted mb-0">For best results, use an image at least 256px by 256px in either .jpg or .png format</p>
                                        </div><!--end col-->

                                        <div class="col-lg-5 col-md-6 text-lg-right text-center mt-4 mt-lg-0">
                                            <a href="#" class="btn btn-primary">Upload</a>
                                            <a href="#" class="btn btn-soft-primary ms-2">Remove</a>
                                        </div><!--end col-->
                                    </div><!--end row-->--}}

                                    <form method="post" action="/patient/profile-update" class="mt-4">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Name<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" placeholder="Full Name"
                                                           name="name" value="{{Auth::guard('applicant')->user()->name}}" ng-model="name">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Phone<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" placeholder="Phone"
                                                           name="phone" value="{{Auth::guard('applicant')->user()->phone}}" ng-model="name" readonly>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Your Email {{--<span
                                                            class="text-danger">*</span>--}}</label>
                                                    <input type="email" class="form-control" placeholder="Email"
                                                           name="email" value="{{Auth::guard('applicant')->user()->email}}" ng-model="email" >
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Blood Group<span
                                                            class="text-danger">*</span></label>
                                                    <select
                                                        class="form-control {{ $errors->has('blood_group') ? 'is-invalid' : '' }}"
                                                        name="blood_group"  ng-model="blood_group" id="blood_group" required>
                                                        <option value
                                                                disabled {{ old('blood_group', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                                        @foreach(App\Models\Applicant::BLOOD_GROUP_SELECT as $key => $label)
                                                            <option
                                                                value="{{ $key }}" {{ Auth::guard('applicant')->user()->blood_group === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Gender<span
                                                            class="text-danger">*</span></label> <br>
                                                    @foreach(App\Models\Applicant::GENDER_RADIO as $key => $label)
                                                        <div
                                                            class="form-check form-check-inline {{ $errors->has('gender') ? 'is-invalid' : '' }}">
                                                            <input class="form-check-input" type="radio"
                                                                   id="gender_{{ $key }}" name="gender" value="{{Auth::guard('applicant')->user()->gender}}" ng-model="gender"
                                                                   value="{{ $key }}"
                                                                   {{ old('gender', '') === (string) $key ? 'checked' : '' }} required>
                                                            <label class="form-check-label form-check-inline"
                                                                   for="gender_{{ $key }}">{{ $label }}</label>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Division <span
                                                            class="text-danger">*</span></label>
                                                    <select
                                                        class="form-control select2 {{ $errors->has('division') ? 'is-invalid' : '' }}"
                                                        name="division_id"  value="{{Auth::guard('applicant')->user()->phone}}" ng-model="division_id" id="division_id">
                                                        @foreach($divisions as $id => $entry)
                                                            <option
                                                                value="{{ $id }}" {{ Auth::guard('applicant')->user()->division_id == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">District <span
                                                            class="text-danger">*</span></label>
                                                    <select
                                                        class="form-control select2 {{ $errors->has('district') ? 'is-invalid' : '' }}"
                                                        name="district_id" ng-model="district_id" id="district_id">
                                                        @foreach($districts as $id => $entry)
                                                            <option
                                                                value="{{ $id }}" {{ Auth::guard('applicant')->user()->district_id == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Area <span
                                                            class="text-danger">*</span></label>
                                                    <select
                                                        class="form-control select2 {{ $errors->has('upazila') ? 'is-invalid' : '' }}"
                                                        name="upazila_id" ng-model="upazila_id" id="upazila_id">
                                                        @foreach($upazilas as $id => $entry)
                                                            <option
                                                                value="{{ $id }}" {{ Auth::guard('applicant')->user()->upazila_id == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Address<span
                                                            class="text-danger">*</span></label>
                                                    <textarea class="form-control " name="address"  ng-model="address"
                                                              id="address">{{Auth::guard('applicant')->user()->address}}</textarea>

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Age<span
                                                            class="text-danger">*</span></label>
                                                    <input type="number" class="form-control" placeholder="Age"
                                                           name="age" value="{{Auth::guard('applicant')->user()->age}}" ng-model="age" required="">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Date Of Birth<span
                                                            class="text-danger">*</span></label>
                                                    <input type="date" class="form-control" placeholder="Birth Date"
                                                           name="dob" ng-model="dob" value="{{Auth::guard('applicant')->user()->dob}}" required="">
                                                </div>
                                            </div>







                                        </div>


                                        <div class="row">
                                            <div class="col-sm-12">
                                                <input type="submit" class="btn btn-primary" value="Save changes">
                                            </div><!--end col-->
                                        </div><!--end row-->
                                    </form><!--end form-->

                                    <div class="mt-4 pt-2">
                                        <h5 class="mb-0">Change Password :</h5>

                                        <form class="mt-4">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">Old password :</label>
                                                        <input type="password" class="form-control" placeholder="Old password" required="">
                                                    </div>
                                                </div><!--end col-->

                                                <div class="col-lg-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">New password :</label>
                                                        <input type="password" class="form-control" placeholder="New password" required="">
                                                    </div>
                                                </div><!--end col-->

                                                <div class="col-lg-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">Re-type New password :</label>
                                                        <input type="password" class="form-control" placeholder="Re-type New password" required="">
                                                    </div>
                                                </div><!--end col-->

                                                <div class="col-lg-12 mt-2 mb-0">
                                                    <button class="btn btn-primary">Save password</button>
                                                </div><!--end col-->
                                            </div><!--end row-->
                                        </form>
                                    </div>

                                </div>
                            </div>




                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </section>
@endsection
