<!doctype html>
<html lang="en" dir="ltr">

@include('frontend.common.head')

<body ng-app="myApp" ng-controller="regController">
@include('sweetalert::alert')

<header id="topnav" class="defaultscroll sticky">
    <div class="container">
        @php
            $platform=\App\Models\Platform::first();
        @endphp
            <!-- Logo container-->
        <a class="logo" href="/">
            @if($platform)
                @if($platform->logo)
                    <img src="{{ $platform->logo->getUrl('thumb') }}" class="l-dark" alt="">
                    <img src="{{ $platform->logo->getUrl('thumb') }}" class="l-light" alt="Logo">

                @endif
            @else
                <img src="/assets/images/logo-light.png" class="l-light"  alt="">

            @endif
        </a>
        <!-- Logo End -->

        <!-- Start Mobile Toggle -->
        <div class="menu-extras">
            <div class="menu-item">
                <!-- Mobile menu toggle-->
                <a class="navbar-toggle" id="isToggle" onclick="toggleMenu()">
                    <div class="lines">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </a>
                <!-- End mobile menu toggle-->
            </div>
        </div>
        <!-- End Mobile Toggle -->

        <!-- Start Dropdown -->
        <ul class="dropdowns list-inline mb-0">
            {{--    <li class="list-inline-item mb-0 ms-1">
          <a href="javascript:void(0)" class="btn btn-icon btn-pills btn-primary" data-bs-toggle="offcanvas"
             data-bs-target="#offcanvasTop" aria-controls="offcanvasTop">
              <i data-feather="search" class="fea icon-sm text-foot align-middle"></i>
          </a>
      </li>--}}
            @if(Auth::guard('applicant')->check())

                <li class="list-inline-item mb-0 ms-1">
                    <div class="dropdown dropdown-primary">
                        <button type="button" class="btn btn-pills btn-soft-primary dropdown-toggle p-0"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img
                                src="/assets/images/doctors/01.jpg" class="avatar avatar-ex-small rounded-circle" alt="">
                        </button>
                        <div class="dropdown-menu dd-menu dropdown-menu-end shadow border-0 mt-3 py-3"
                             style="min-width: 200px;">
                            <a class="dropdown-item d-flex align-items-center text-dark" href="/patient/profile">
                                <img src="/assets/images/doctors/01.jpg"
                                     class="avatar avatar-md-sm rounded-circle border shadow" alt="">
                                <div class="flex-1 ms-2">
                                    <span class="d-block mb-1">{{Auth::guard('applicant')->user()->name}}</span>
                                    {{-- <small class="text-muted">Orthopedic</small>--}}
                                </div>
                            </a>
                            <a class="dropdown-item text-dark" href="/patient/profile"><span
                                    class="mb-0 d-inline-block me-1"><i
                                        class="ri-dashboard-2-fill align-middle h6"></i></span> Dashboard</a>

                            <div class="dropdown-divider border-top"></div>
                            <a class="dropdown-item text-dark" href="/patient/logout"><span class="mb-0 d-inline-block me-1"><i
                                        class="ri-logout-box-fill align-middle h6"></i></span> Logout</a>
                        </div>
                    </div>
                </li>
            @else
                <li class="list-inline-item mb-0 ms-1">
                    <div class="dropdown dropdown-primary">
                        <button type="button" class="btn btn-icon btn-pills btn-primary"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ri-user-line"></i>
                        </button>
                        <div class="dropdown-menu dd-menu dropdown-menu-end shadow border-0 mt-3 py-3"
                             style="min-width: 200px;">
                            <a class="dropdown-item d-flex align-items-center text-dark" href="/patient/login">
                                <div class="flex-1 ms-2">
                                    <span class="d-block mb-1">Login</span>

                                </div>
                            </a>
                            <a class="dropdown-item d-flex align-items-center text-dark" href="/patient/registration">
                                <div class="flex-1 ms-2">
                                    <span class="d-block mb-1">Register</span>

                                </div>
                            </a>
                        </div>
                    </div>
                </li>
            @endif
        </ul>
        <!-- Start Dropdown -->

        <div id="navigation">
            <!-- Navigation Menu-->
            <ul class="navigation-menu nav-left">
                <li class="has-submenu parent-menu-item">
                    <a href="/" class="active">Home</a>

                </li>
                <li class="has-submenu parent-menu-item">
                    <a href="/#about" class="active" id="aboutLink">About Us</a>

                </li>
                <li class="has-submenu parent-menu-item">
                    <a href="/contact" class="active">Contact</a>

                </li>
                <li class="has-submenu parent-menu-item">
                    <a href="/#blog" class="active" id="blogLink">Blog</a>

                </li>
                <li><a href="/patient/book/appointment" class="btn btn-primary">Book Appointment</a></li>
            </ul><!--end navigation menu-->
        </div><!--end navigation-->
    </div><!--end container-->
</header>


<section class="bg-half-150 d-table w-100 bg-light"
             style="background: url('/assets/images/bg/bg-lines-one.png') center;" >


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
                                                    <span class="btn btn-primary mt-2 " id="send_otp_button"
                                                            ng-click="sendOtp()">Send OTP
                                                    </span>
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

    </section>

    <script>

           document.getElementById("phone-area").style.display = "block";
            document.getElementById("otp-area").style.display = "none";
            document.getElementById("timer").style.display = "none";
            document.getElementById("registration-area").style.display = "none";

    </script>
    <script>
        app.controller('regController', function ($scope, $http, $location) {
            console.log('Registration Controller')
            var intervalId;

          $scope.sendOtp = function () {


                if ($scope.phone == null || $scope.phone.toString().length < 10) {z
                    messageError('Please enter a valid phone number with at least 10 digits')
                    return;
                }

                if (isNaN($scope.phone)) {
                    messageError('Please Enter Number Not String')
                    return;
                }
                if ($scope.phone.toString().charAt(0) !== '0') {
                    $scope.phone = '0' + $scope.phone;
                }

                //console.log($scope.phone)

                let url = "/web-api/otp-sent";

                let params = {
                    'phone': $scope.phone,
                };
                /*  document.getElementById("loader").style.display = "block";*/
                $http.post(url, params).then(function success(response) {

                    // console.log(response.data)

                    if (response.data.code == 200) {
                        messageSuccess(response.data.message)
                        $scope.startCounter(120);
                        console.log(response.data.otp)
                        document.getElementById("phone-area").style.display = "none";
                        document.getElementById("otp-area").style.display = "block";
                        document.getElementById("timer").style.display = "block";
                        document.getElementById("registration-area").style.display = "none";


                    } else {

                        /* document.getElementById("loader").style.display = "none";*/

                        messageError(response.data.message)
                        if (response.data.message == "You have an active OTP") {
                            $scope.startCounter(response.data.time);
                            document.getElementById("phone-area").style.display = "none";
                            document.getElementById("otp-area").style.display = "block";
                            document.getElementById("timer").style.display = "block";
                            document.getElementById("registration-area").style.display = "none";


                        }

                    }

                });
            }

            $scope.verifyOtp = function () {
                console.log('verify OTP')

                if ($scope.otp == null) {
                    messageError('Please Enter Your OTP')
                    return;
                }
                if (isNaN($scope.otp)) {
                    messageError('Please Enter Number Not String')
                    return;
                }
                let url = "/web-api/otp-verify";

                let params = {
                    'phone': $scope.phone,
                    'otp': $scope.otp,
                };
                $http.post(url, params).then(function success(response) {
                    console.log(response.data)

                    if (response.data.code == 200) {
                        messageSuccess(response.data.message)
                        $scope.startCounter(1000);
                        document.getElementById("phone-area").style.display = "none";
                        document.getElementById("otp-area").style.display = "none";
                        document.getElementById("timer").style.display = "none";
                        document.getElementById("registration-area").style.display = "block";

                    } else {

                        messageError(response.data.message)

                    }

                });
            }

            $scope.startCounter = function (time) {
                document.getElementById("phone-area").style.display = "none";
                document.getElementById("otp-area").style.display = "block";
                document.getElementById("timer").style.display = "block";
                document.getElementById("registration-area").style.display = "none";

                var sec = time;
                clearInterval(intervalId);
                intervalId = setInterval(function () {
                    document.getElementById("timer").innerHTML = sec + " Seconds remaining";
                    sec--;
                    if (sec == 0) {
                        document.getElementById("phone-area").style.display = "block";
                        document.getElementById("otp-area").style.display = "none";
                        document.getElementById("timer").style.display = "none";
                        document.getElementById("registration-area").style.display = "none";
                        clearInterval(intervalId);
                    }
                }, 1000);
            };
            $scope.register = function () {
                console.log( 'all ok')
                if ($scope.name == null) {
                    messageError('Please Enter Your name')
                    return;
                }
                if ($scope.gender == null) {
                    messageError('Please Enter Your Gender')
                    return;
                }
                if ($scope.blood_group == null) {
                    messageError('Please Enter Your Blood Group')
                    return;
                }
                if ($scope.division_id == null) {
                    messageError('Please Enter Your Division')
                    return;
                }
                if ($scope.district_id == null) {
                    messageError('Please Enter Your District')
                    return;
                }
                if ($scope.upazila_id == null) {
                    messageError('Please Enter Your Area')
                    return;
                }
                if ($scope.address == null) {
                    messageError('Please Enter Your Address')
                    return;
                }
                if ($scope.age == null) {
                    messageError('Please Enter Your Age')
                    return;
                }
                if ($scope.dob == null) {
                    messageError('Please Enter Your Date of Birth')
                    return;
                }

                if ($scope.password == null) {
                    messageError('Please Enter Your password')
                    return;
                }
                /*     if ($scope.cnf_password == null) {
                         messageError('Please Enter Your Confirm password')
                         return;
                     }
                     if ($scope.cnf_password != $scope.password) {
                         messageError('Password And Confirm Password Not Match')
                         return;
                     }*/

                let url = "/web-api/registration/save";
                let params = {
                    'name': $scope.name,
                    'phone': $scope.phone,
                    'email': $scope.email,
                    'gender': $scope.gender,
                    'blood_group': $scope.blood_group,
                    'age': $scope.age,
                    'dob': $scope.dob,
                    'division_id': $scope.division_id,
                    'district_id': $scope.district_id,
                    'upazila_id': $scope.upazila_id,
                    'address': $scope.address,
                    'password': $scope.password,
                };
                $http.post(url, params).then(function success(response) {

                    if (response.data.code == 200) {

                        messageSuccess(response.data.message)
                        window.location.href = "/patient/profile";

                    }
                    if (response.data.code == 400) {

                        messageError(response.data.message)
                    }
                    console.log(response.data);

                });

            }



            function messageError(message) {

                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: message,
                    showConfirmButton: true,
                    timer: 3000
                })

            }

            function messageSuccess(message) {

                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: message,
                    showConfirmButton: true,
                    timer: 3000
                })

            }


        });

    </script>

</body>

</html>

