@extends("layouts.frontend")
@section('title', 'Challenge.gov.bd Create Account')
@section("content")
<style>
    .submission_banner{
        min-height: 150px;
        background: rgb(0,102,49);
        background: radial-gradient(circle, rgba(0,102,49,1) 24%, rgba(0,153,20,1) 67%, rgba(0,149,10,1) 98%);
    }
</style>
<div class="header">
    <div class="submission_banner d-flex align-items-center justify-content-center">
        <h2 class="animated bounceInRight p-2 text-white text-center text-bold">Reset Password</h2>
    </div>
</div>
    <div class="padding-y" data-aos="zoom-in" data-aos-duration="1000">
        <div class="row justify-content-center">
            <div class="col-md-6 col-sm-12 col-12">
                <div class="card p-5 border-0 shadow-lg">
                    <div class="mb-4">
                        <h2 class="text-center text-success">Reset Your Password</h2>
                    </div>
                    <div class="" id="phone-area">
                        <div class="col-sm-12 form-group">
                            <label for="name-f">Phone Number</label>
                            <input type="text" class="form-control" name="phone" ng-model="phone"
                                   placeholder="Enter your Phone Number">

                        </div>
                        <div class="col-sm-12 form-group mb-0 mt-2 ">
                            <button class="btn btn-success" id="send_otp_button"
                                    ng-click="sendOtp()">Send OTP
                            </button>
                        </div>
                    </div>
                    <div class="" id="otp-area">
                        <p><span class="badge rounded-pill bg-danger" id="timer">0</span></p>
                        <div class="col-sm-12 form-group">
                            <label for="OTP">OTP</label>
                            <input type="text" class="form-control" name="otp" ng-model="otp"
                                   placeholder="Enter your OTP"
                            >
                        </div>
                        <div class="col-sm-12 form-group mb-0">
                            <button class="btn btn-success float-right mt-2" id="verify_otp_button"
                                    ng-click="verifyOtp()">Verify OTP
                            </button>
                        </div>
                    </div>
                    <div class="" id="registration-area">

                        <div class="col-sm-12 form-group">
                            <label for="pass">Password</label>
                            <input type="Password" name="password" ng-model="password" class="form-control" id="pass"
                                   placeholder="Enter your password.">
                        </div>
                        <div class="col-sm-12 form-group">
                            <label for="pass2">Confirm Password</label>
                            <input type="Password" name="cnf_password" ng-model="cnf_password" class="form-control"
                                   id="pass2"
                                   placeholder="Re-enter your password.">
                        </div>

                        <div class="col-sm-12 form-group mb-0 mt-2">
                            <button class="btn btn-success float-right" ng-click="passwordReset()">Reset Password
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>

        document.getElementById("phone-area").style.display = "block";
        document.getElementById("otp-area").style.display = "none";
        document.getElementById("timer").style.display = "none";
        document.getElementById("registration-area").style.display = "none";
    </script>

@endsection
