@extends("layouts.details")
@section('title', 'Sign-Up')
@section("content")

    <!-- Hero Start -->
    <section class="bg-half-150 d-table w-100 bg-light"
             style="background: url('/assets/images/bg/bg-lines-one.png') center;">


            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5 col-md-8">
                        <img src="/assets/images/logo-dark.png" height="22" class="mx-auto d-block" alt="">
                        <div class="card login-page shadow mt-4 rounded border-0">
                            <div class="card-body">
                                <h4 class="text-center">Sign Up</h4>
                                <form class="login-form mt-4">
                                    <div id="phone-area">
                                        <div class="row">
                                            <div class="row">
                                                <div class="col-sm-12 form-group">
                                                    <label class="form-label">Phone <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control"
                                                           placeholder="Your Phone Number"
                                                           name="phone" ng-model="phone" >
                                                </div>
                                                <div class="col-sm-12 form-group mb-0">
                                                    <button class="btn btn-primary mt-2 " id="send_otp_button"
                                                            ng-click="sendOtp()">Send OTP
                                                    </button>
                                                </div>
                                            </div>


                                        </div>
                                    </div>

                                    <div class="" id="otp-area">

                                        <div class="row">
                                            <p><span class="badge rounded-pill bg-danger" id="timer">0</span></p>
                                            <div class="col-sm-12 form-group">
                                                <label for="OTP">OTP</label>
                                                <input type="text" class="form-control" name="otp" ng-model="otp"
                                                       placeholder="Enter OTP"
                                                >
                                            </div>
                                            <div class="col-sm-12 form-group mb-0">
                                                <button class="btn btn-primary mt-2" id="verify_otp_button"
                                                        ng-click="verifyOtp()">Verify OTP
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="" id="registration-area">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Name<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" placeholder="Full Name"
                                                           name="name" ng-model="name">
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Your Email {{--<span
                                                            class="text-danger">*</span>--}}</label>
                                                    <input type="email" class="form-control" placeholder="Email"
                                                           name="email" ng-model="email" >
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Blood Group<span
                                                            class="text-danger">*</span></label>
                                                    <select
                                                        class="form-control {{ $errors->has('blood_group') ? 'is-invalid' : '' }}"
                                                        name="blood_group" ng-model="blood_group" id="blood_group" >
                                                        <option value
                                                                disabled {{ old('blood_group', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                                        @foreach(App\Models\Applicant::BLOOD_GROUP_SELECT as $key => $label)
                                                            <option
                                                                value="{{ $key }}" {{ old('blood_group', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Gender<span
                                                            class="text-danger">*</span></label> <br>
                                                    @foreach(App\Models\Applicant::GENDER_RADIO as $key => $label)
                                                        <div
                                                            class="form-check form-check-inline {{ $errors->has('gender') ? 'is-invalid' : '' }}">
                                                            <input class="form-check-input" type="radio"
                                                                   id="gender_{{ $key }}" name="gender" ng-model="gender"
                                                                   value="{{ $key }}"
                                                                   {{ old('gender', '') === (string) $key ? 'checked' : '' }} >
                                                            <label class="form-check-label form-check-inline"
                                                                   for="gender_{{ $key }}">{{ $label }}</label>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Division<span
                                                            class="text-danger">*</span></label>
                                                    <select
                                                        class="form-control select2 {{ $errors->has('division') ? 'is-invalid' : '' }}"
                                                        name="division_id" ng-model="division_id" id="division_id">
                                                        @foreach($divisions as $id => $entry)
                                                            <option
                                                                value="{{ $id }}" {{ old('division_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label class="form-label">District<span
                                                            class="text-danger">*</span></label>
                                                    <select
                                                        class="form-control select2 {{ $errors->has('district') ? 'is-invalid' : '' }}"
                                                        name="district_id" ng-model="district_id" id="district_id">
                                                        @foreach($districts as $id => $entry)
                                                            <option
                                                                value="{{ $id }}" {{ old('district_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Area<span
                                                            class="text-danger">*</span></label>
                                                    <select
                                                        class="form-control select2 {{ $errors->has('upazila') ? 'is-invalid' : '' }}"
                                                        name="upazila_id" ng-model="upazila_id" id="upazila_id">
                                                        @foreach($upazilas as $id => $entry)
                                                            <option
                                                                value="{{ $id }}" {{ old('upazila_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Address<span
                                                            class="text-danger">*</span></label>
                                                    <textarea class="form-control " name="address" ng-model="address"
                                                              id="address">{{ old('address') }}</textarea>

                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Age<span
                                                            class="text-danger">*</span></label>
                                                    <input type="number" class="form-control" placeholder="Age"
                                                           name="age" ng-model="age" >
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Date Of Birth<span
                                                            class="text-danger">*</span></label>
                                                    <input type="date" class="form-control" placeholder="Birth Date"
                                                           name="dob" ng-model="dob" >
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Password <span
                                                            class="text-danger">*</span></label>
                                                    <input type="password" ng-model="password" class="form-control" placeholder="Password"
                                                           >
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <div class="form-check">
                                                        <input class="form-check-input align-middle" type="checkbox"
                                                               value="" id="accept-tnc-check">
                                                        <label class="form-check-label" for="accept-tnc-check">I Accept
                                                            <a
                                                                href="#" class="text-primary">Terms And
                                                                Condition</a></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="d-grid">
                                                    <button class="btn btn-primary" ng-click="register()">Register</button>
                                                </div>
                                            </div>

                                            {{--   <div class="col-lg-12 mt-3 text-center">
                                                   <h6 class="text-muted">Or</h6>
                                               </div><!--end col-->

                                               <div class="col-6 mt-3">
                                                   <div class="d-grid">
                                                       <a href="javascript:void(0)" class="btn btn-soft-primary"><i
                                                               class="uil uil-facebook"></i> Facebook</a>
                                                   </div>
                                               </div><!--end col-->

                                               <div class="col-6 mt-3">
                                                   <div class="d-grid">
                                                       <a href="javascript:void(0)" class="btn btn-soft-primary"><i
                                                               class="uil uil-google"></i> Google</a>
                                                   </div>
                                               </div><!--end col-->--}}


                                        </div>

                                    </div>
                                    <div class="mx-auto">
                                        <p class="mb-0 mt-3"><small class="text-dark me-2">Already have an
                                                account
                                                ?</small> <a href="/patient/login" class="text-dark fw-bold">Sign
                                                in</a>
                                        </p>
                                    </div>
                                </form>
                            </div>
                        </div><!---->
                    </div> <!--end col-->
                </div><!--end row-->
            </div> <!--end container-->

    </section><!--end section-->
    <!-- Hero End -->

    <script>

           document.getElementById("phone-area").style.display = "block";
            document.getElementById("otp-area").style.display = "none";
            document.getElementById("timer").style.display = "none";
            document.getElementById("registration-area").style.display = "none";
            document.getElementById("loader").style.display = "none";
    </script>

@endsection
