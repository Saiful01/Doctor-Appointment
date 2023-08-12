@extends("layouts.frontend")
@section('title', 'Sign-Up')
@section("content")

   {{-- <div class="container padding-y" data-aos="zoom-in" data-aos-duration="1000">
        <form>
            <div class="row  jumbotron box8">
                <div class="card p-5 col-md-6 col-12 mx-auto shadow-lg border-0">
                    <div class="col-sm-12 mx-t3 mb-4">
                        <img class="text-center" src="/logo2.png">
                        <h5 class="text-success">{{trans('frontend.reg_heading')}}</h5>
                    </div>
                    <div class="loader" id="loader">
                        <img src="{{asset('loader.gif')}}" alt="" width="50px">
                    </div>
                    <div class="" id="phone-area">
                        <div class="col-sm-12 form-group">
                            <label for="name-f">{{trans('frontend.your_phone')}}</label>
                            <input type="text" class="form-control" name="phone" ng-model="phone"
                                   placeholder="{{trans('frontend.your_phone')}}">
                        </div>
                        <div class="col-sm-12 form-group mb-0 mt-2 ">
                            <button class="btn btn-success" id="send_otp_button"
                                    ng-click="sendOtp()">{{trans('frontend.send_otp')}}
                            </button>
                        </div>
                    </div>
                    <div class="" id="otp-area">
                        <p><span class="badge rounded-pill bg-danger" id="timer">0</span></p>
                        <div class="col-sm-12 form-group">
                            <label for="OTP">{{trans('frontend.otp')}}</label>
                            <input type="text" class="form-control" name="otp" ng-model="otp"
                                   placeholder="{{trans('frontend.otp')}}"
                            >
                        </div>
                        <div class="col-sm-12 form-group mb-0">
                            <button class="btn btn-success mt-2" id="verify_otp_button"
                                    ng-click="verifyOtp()">{{trans('frontend.verify_otp')}}
                            </button>
                        </div>
                    </div>
                    <div class="" id="registration-area">
                        <div class="col-sm-12 form-group">
                            <label for="name">{{trans('frontend.name')}}</label>
                            <input type="text" class="form-control" name="name" ng-model="name"
                                   placeholder="{{trans('frontend.enter_name')}}">
                        </div>
                        <div class="col-sm-12 form-group">
                            <label for="name">{{trans('frontend.email')}} </label>
                            <input type="email" class="form-control" name="email" ng-model="email"
                                   placeholder="{{trans('frontend.enter_email')}}">
                        </div>

                        <div class="col-sm-12 form-group">
                            <label for="name-l">{{trans('frontend.gender')}} </label><br/>
                            <div class="form-check form-check-inline ">
                                <input class="form-check-input" type="radio" name="gender" ng-model="gender"
                                       value="Male" id="gender1">
                                <label class="form-check-label" for="gender1">
                                    {{trans('frontend.male')}}
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" ng-model="gender"
                                       value="Female" id="gender2">
                                <label class="form-check-label" for="gender2">
                                    {{trans('frontend.female')}}
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" ng-model="gender"
                                       value="Other" id="gender3">
                                <label class="form-check-label" for="gender3">
                                    {{trans('frontend.other')}}
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-12 form-group">
                            <label for="name">{{trans('frontend.occupation')}}</label>
                            <input type="text" class="form-control" name="occupation" ng-model="occupation"
                                   placeholder="{{trans('frontend.enter_occupation')}}">
                        </div>
                        <div class="col-sm-12 form-group">
                            <label for="name">{{trans('frontend.designation')}}</label>
                            <input type="text" class="form-control" name="designation" ng-model="designation"

                                   placeholder="{{trans('frontend.enter_designation')}}">
                        </div>
                        <div class="col-sm-12 form-group">
                            <label for="name">{{trans('frontend.institute')}}</label>
                            <input type="text" class="form-control" name="institution" ng-model="institution"

                                   placeholder="{{trans('frontend.enter_institute')}}">
                        </div>
                        <div class="col-sm-12 form-group">
                            <label for="name">{{trans('frontend.address')}}</label>
                            <input type="text" class="form-control" name="address" ng-model="address"

                                   placeholder="{{trans('frontend.enter_address')}}">
                        </div>

                        <div class="col-sm-12 form-group">
                            <label for="pass">{{trans('frontend.password')}}</label>
                            <input type="Password" name="password" ng-model="password" class="form-control" id="pass"
                                   placeholder="{{trans('frontend.enter_password')}}">
                        </div>
                        <div class="col-sm-12 form-group">
                            <label for="pass2">{{trans('frontend.re_enter_password')}}</label>
                            <input type="Password" name="cnf_password" ng-model="cnf_password" class="form-control"
                                   id="pass2"
                                   placeholder="{{trans('frontend.re_enter_password')}}">
                        </div>
                        <div class="col-sm-12 ">
                            <input type="checkbox" class="form-check d-inline " id="chb" required>
                            <label for="chb"
                                   class="form-check-label ">&nbsp;
                                {{trans('frontend.condition')}}
                            </label>
                        </div>

                        <div class="col-sm-12 form-group mb-0">
                            <button class="btn btn-success"
                                    ng-click="register()">{{trans('frontend.registration')}}</button>
                        </div>
                    </div>


                </div>


            </div>
        </form>
    </div>

--}}
    <!-- Hero Start -->
    <section class="bg-half-150 d-table w-100 bg-light"
             style="background: url('/assets/images/bg/bg-lines-one.png') center;">

        <form>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5 col-md-8">
                        <img src="/assets/images/logo-dark.png" height="22" class="mx-auto d-block" alt="">
                        <div class="card login-page shadow mt-4 rounded border-0">
                            <div class="card-body">
                                <h4 class="text-center">Sign Up</h4>
                                <form action="https://shreethemes.in/doctris/layouts/landing/doctor-dashboard.html"
                                      class="login-form mt-4">
                                    <div class="row" id="phone-area">

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Phone <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" placeholder="Your Phone Number"
                                                       name="phone" required="">
                                            </div>
                                        </div>
                                        <div class="col-md-6">

                                            <div class="d-grid">
                                                <button class="btn btn-primary" id="send_otp_button"
                                                        ng-click="sendOtp()">Send OTP</button>
                                            </div>



                                        </div>


                                    </div>
                                    <div class="row">
                                        <p><span class="badge rounded-pill bg-danger" id="timer">0</span></p>
                                        <div class="col-sm-12 form-group">
                                            <label for="OTP">{{trans('frontend.otp')}}</label>
                                            <input type="text" class="form-control" name="otp" ng-model="otp"
                                                   placeholder="{{trans('frontend.otp')}}"
                                            >
                                        </div>
                                        <div class="col-sm-12 form-group mb-0">
                                            <button class="btn btn-success mt-2" id="verify_otp_button"
                                                    ng-click="verifyOtp()">{{trans('frontend.verify_otp')}}
                                            </button>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">First name <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" placeholder="First Name"
                                                       name="s" required="">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Last name <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" placeholder="Last Name" name="s"
                                                       required="">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label">Your Email <span class="text-danger">*</span></label>
                                                <input type="email" class="form-control" placeholder="Email"
                                                       name="email" required="">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label">Password <span
                                                        class="text-danger">*</span></label>
                                                <input type="password" class="form-control" placeholder="Password"
                                                       required="">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <div class="form-check">
                                                    <input class="form-check-input align-middle" type="checkbox"
                                                           value="" id="accept-tnc-check">
                                                    <label class="form-check-label" for="accept-tnc-check">I Accept <a
                                                            href="#" class="text-primary">Terms And
                                                            Condition</a></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="d-grid">
                                                <button class="btn btn-primary">Register</button>
                                            </div>
                                        </div>

                                        <div class="col-lg-12 mt-3 text-center">
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
                                        </div><!--end col-->

                                        <div class="mx-auto">
                                            <p class="mb-0 mt-3"><small class="text-dark me-2">Already have an account
                                                    ?</small> <a href="login.html" class="text-dark fw-bold">Sign in</a>
                                            </p>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div><!---->
                    </div> <!--end col-->
                </div><!--end row-->
            </div> <!--end container-->
        </form>
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
