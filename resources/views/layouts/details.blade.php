<!doctype html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8"/>
    <title>Dr Mustafiz - Appointment Booking System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Premium Bootstrap 5 Landing Page Template"/>
    <meta name="keywords" content="Appointment, Booking, System, Dashboard, Health"/>
    <meta name="author" content="Shreethemes"/>
    <meta name="email" content="support@shreethemes.in"/>
    <meta name="website" content="https://shreethemes.in/"/>
    <meta name="Version" content="v1.4.0"/>
    <!-- favicon -->
    <link rel="shortcut icon" href="https://shreethemes.in/doctris/layouts/assets/images/favicon.ico">
    <!-- Css -->
-    <link href="{{ asset('/assets/libs/tiny-slider/tiny-slider.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/libs/tobii/css/tobii.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/css/icons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/libs/remixicon/fonts/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/libs/%40iconscout/unicons/css/line.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/css/style.min.css') }}" rel="stylesheet">



    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>


    <script>
        var app = angular.module('myApp', []);
        console.log("app created")
    </script>

    <script src="/assets/js/custom_angular.js"></script>

</head>


<body ng-app="myApp" ng-controller="appointmentController">

@include('sweetalert::alert')

<!-- Loader -->
<!-- <div id="preloader">
    <div id="status">
        <div class="spinner">
            <div class="double-bounce1"></div>
            <div class="double-bounce2"></div>
        </div>
    </div>
</div> -->
<!-- Loader -->

<!-- Navbar STart -->
<header id="topnav" class="defaultscroll sticky">
    <div class="container">
        <!-- Logo container-->
        <a class="logo" href="/">
            <img src="/assets/images/logo-dark.png" height="22" class="logo-light-mode" alt="">
            <img src="/assets/images/logo-light.png" height="22" class="logo-dark-mode" alt="">
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
                    <a href="#about" class="active">About Us</a>

                </li>
                <li class="has-submenu parent-menu-item">
                    <a href="/contact" class="active">Contact</a>

                </li>
                <li class="has-submenu parent-menu-item">
                    <a href="#blog" class="active">Blog</a>

                </li>
                <li><a href="/book/appointment" class="btn btn-primary">Book Appointment</a></li>
            </ul><!--end navigation menu-->
        </div><!--end navigation-->
    </div><!--end container-->
</header><!--end header-->
<!-- Navbar End -->


@yield('content')


<!-- Start -->
<footer class="">
    <div class="container">
        <div class="row">
            <div class="col-xl-5 col-lg-4 mb-0 mb-md-4 pb-0 pb-md-2">
                <a href="#" class="logo-footer">
                    <img src="/assets/images/logo-light.png" height="22" alt="">
                </a>
                <p class="mt-4 me-xl-5">Dr.Md.Mustafizur Rahman MBBS , BCS ( Health ) FCPS: surgery MS: hepatobiliary
                    and pancreatic surgeon. Assistant Professor</p>
            </div><!--end col-->

            <div class="col-xl-7 col-lg-8 col-md-12">
                <div class="row">
                    <div class="col-md-4 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
                        <h5 class="footer-head">Company</h5>
                        <ul class="list-unstyled footer-list mt-4">
                            <li><a href="#about" class="text-foot">
                                    About us</a></li>

                            <li><a href="/contact" class="text-foot"> Contact</a></li>
                            <li>
                                <a href="#video" class="text-foot">
                                    video</a>
                            </li>
                            <li>
                                <a href="#blog" class="text-foot">
                                    Blog</a>
                            </li>
                            <li>
                                <a href="/patient/login" class="text-foot"> Login</a>
                            </li>
                            <li>
                                <a href="/patient/registration" class="text-foot"> Registration</a>
                            </li>
                        </ul>
                    </div><!--end col-->


                    <div class="col-md-4 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
                        <h5 class="footer-head">Contact us</h5>
                        <ul class="list-unstyled footer-list mt-4">
                            <li class="d-flex align-items-center">
                                <i data-feather="mail" class="fea icon-sm text-foot align-middle"></i>
                                <a href="mailto:contact@example.com" class="text-foot ms-2">contact@example.com</a>
                            </li>

                            <li class="d-flex align-items-center">
                                <i data-feather="phone" class="fea icon-sm text-foot align-middle"></i>
                                <a href="tel:+152534-468-854" class="text-foot ms-2">+152 534-468-854</a>
                            </li>

                            <li class="d-flex align-items-center">
                                <i data-feather="map-pin" class="fea icon-sm text-foot align-middle"></i>
                                <a href="javascript:void(0)" class="video-play-icon text-foot ms-2">View on Google
                                    map</a>
                            </li>
                        </ul>

                        <ul class="list-unstyled social-icon footer-social mb-0 mt-4">
                            <li class="list-inline-item"><a href="#" class="rounded-pill"><i data-feather="facebook"
                                                                                             class="fea icon-sm fea-social"></i></a>
                            </li>
                            <li class="list-inline-item"><a href="#" class="rounded-pill"><i data-feather="instagram"
                                                                                             class="fea icon-sm fea-social"></i></a>
                            </li>
                            <li class="list-inline-item"><a href="#" class="rounded-pill"><i data-feather="twitter"
                                                                                             class="fea icon-sm fea-social"></i></a>
                            </li>
                            <li class="list-inline-item"><a href="#" class="rounded-pill"><i data-feather="linkedin"
                                                                                             class="fea icon-sm fea-social"></i></a>
                            </li>
                        </ul><!--end icon-->
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->

    <div class="container mt-5">
        <div class="pt-4 footer-bar">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <div class="text-sm-start text-center">
                        <p class="mb-0">
                            <script>document.write(new Date().getFullYear())</script>
                            © Doctris. Design with <i class="mdi mdi-heart text-danger"></i> by <a
                                href="" target="_blank" class="text-reset">WebAid</a>.
                        </p>
                    </div>
                </div><!--end col-->

                <div class="col-sm-6 mt-4 mt-sm-0">

                </div><!--end col-->
            </div><!--end row-->
        </div>
    </div><!--end container-->
</footer><!--end footer-->
<!-- End -->

<!-- Back to top -->
<a href="#" onclick="topFunction()" id="back-to-top"
   class="back-to-top fs-5 rounded-pill text-center bg-primary justify-content-center align-items-center"><i
        data-feather="arrow-up" class="fea icon-sm"></i></a>
<!-- Back to top -->

<!-- Offcanvas Start -->
<div class="offcanvas offcanvas-top" tabindex="-1" id="offcanvasTop">
    <div class="offcanvas-body d-flex align-items-center align-items-center">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="text-center">
                        <h4>Search now.....</h4>
                        <div class="subcribe-form mt-4">
                            <form>
                                <div class="mb-0">
                                    <input type="text" id="help" name="name" class="border rounded-pill" required=""
                                           placeholder="Search">
                                    <button type="submit" class="btn btn-pills btn-primary">Search</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </div>
</div>
<!-- Offcanvas End -->

<!-- Offcanvas Start -->
<div class="offcanvas offcanvas-end shadow border-0" tabindex="-1" id="offcanvasRight"
     aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header p-4 border-bottom">
        <h5 id="offcanvasRightLabel" class="mb-0">
            <img src="/assets/images/logo-dark.png" height="22" class="light-version" alt="">
            <img src="/assets/images/logo-light.png" height="22" class="dark-version" alt="">
        </h5>
        <button type="button" class="btn-close d-flex align-items-center text-dark" data-bs-dismiss="offcanvas"
                aria-label="Close"><i class="uil uil-times fs-4"></i></button>
    </div>
    <div class="offcanvas-body p-4 px-md-5">
        <div class="row">
            <div class="col-12">
                <!-- Style switcher -->
                <div id="style-switcher">
                    <div>
                        <ul class="text-center style-switcher list-unstyled mb-0">
                            <li class="d-grid"><a href="javascript:void(0)" class="rtl-version t-rtl-light"
                                                  onclick="setTheme('style-rtl')"><img
                                        src="/assets/images/layouts/landing-light-rtl.png"
                                        class="img-fluid rounded-md shadow-md d-block mx-auto" style="width: 240px;"
                                        alt=""><span class="text-dark fw-medium mt-3 d-block">RTL Version</span></a>
                            </li>
                            <li class="d-grid"><a href="javascript:void(0)" class="ltr-version t-ltr-light"
                                                  onclick="setTheme('style')"><img
                                        src="/assets/images/layouts/landing-light.png"
                                        class="img-fluid rounded-md shadow-md d-block mx-auto" style="width: 240px;"
                                        alt=""><span class="text-dark fw-medium mt-3 d-block">LTR Version</span></a>
                            </li>
                            <li class="d-grid"><a href="javascript:void(0)" class="dark-rtl-version t-rtl-dark"
                                                  onclick="setTheme('style-dark-rtl')"><img
                                        src="/assets/images/layouts/landing-dark-rtl.png"
                                        class="img-fluid rounded-md shadow-md d-block mx-auto" style="width: 240px;"
                                        alt=""><span class="text-dark fw-medium mt-3 d-block">RTL Version</span></a>
                            </li>
                            <li class="d-grid"><a href="javascript:void(0)" class="dark-ltr-version t-ltr-dark"
                                                  onclick="setTheme('style-dark')"><img
                                        src="/assets/images/layouts/landing-dark.png"
                                        class="img-fluid rounded-md shadow-md d-block mx-auto" style="width: 240px;"
                                        alt=""><span class="text-dark fw-medium mt-3 d-block">LTR Version</span></a>
                            </li>
                            <li class="d-grid"><a href="javascript:void(0)" class="dark-version t-dark mt-4"
                                                  onclick="setTheme('style-dark')"><img
                                        src="/assets/images/layouts/landing-dark.png"
                                        class="img-fluid rounded-md shadow-md d-block mx-auto" style="width: 240px;"
                                        alt=""><span class="text-dark fw-medium mt-3 d-block">Dark Version</span></a>
                            </li>
                            <li class="d-grid"><a href="javascript:void(0)" class="light-version t-light mt-4"
                                                  onclick="setTheme('style')"><img
                                        src="/assets/images/layouts/landing-light.png"
                                        class="img-fluid rounded-md shadow-md d-block mx-auto" style="width: 240px;"
                                        alt=""><span class="text-dark fw-medium mt-3 d-block">Light Version</span></a>
                            </li>
                            <li class="d-grid"><a href="https://shreethemes.in/doctris/layouts/admin//"
                                                  target="_blank" class="mt-4"><img
                                        src="/assets/images/layouts/light-dash.png"
                                        class="img-fluid rounded-md shadow-md d-block mx-auto" style="width: 240px;"
                                        alt=""><span class="text-dark fw-medium mt-3 d-block">Admin Dashboard</span></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- end Style switcher -->
            </div><!--end col-->
        </div><!--end row-->
    </div>

    <div class="offcanvas-footer p-4 border-top text-center">
        <ul class="list-unstyled social-icon social mb-0">
            <li class="list-inline-item mb-0"><a href="https://1.envato.market/doctris-template" target="_blank"
                                                 class="rounded"><i class="uil uil-shopping-cart align-middle"
                                                                    title="Buy Now"></i></a></li>
            <li class="list-inline-item mb-0"><a href="https://dribbble.com/shreethemes" target="_blank"
                                                 class="rounded"><i class="uil uil-dribbble align-middle"
                                                                    title="dribbble"></i></a></li>
            <li class="list-inline-item mb-0"><a href="https://www.behance.net/shreethemes" target="_blank"
                                                 class="rounded"><i class="uil uil-behance align-middle"
                                                                    title="behance"></i></a></li>
            <li class="list-inline-item mb-0"><a href="https://www.facebook.com/shreethemes" target="_blank"
                                                 class="rounded"><i class="uil uil-facebook-f align-middle"
                                                                    title="facebook"></i></a></li>
            <li class="list-inline-item mb-0"><a href="https://www.instagram.com/shreethemes/" target="_blank"
                                                 class="rounded"><i class="uil uil-instagram align-middle"
                                                                    title="instagram"></i></a></li>
            <li class="list-inline-item mb-0"><a href="https://twitter.com/shreethemes" target="_blank" class="rounded"><i
                        class="uil uil-twitter align-middle" title="twitter"></i></a></li>
            <li class="list-inline-item mb-0"><a href="mailto:support@shreethemes.in" class="rounded"><i
                        class="uil uil-envelope align-middle" title="email"></i></a></li>
            <li class="list-inline-item mb-0"><a href="https://shreethemes.in" target="_blank" class="rounded"><i
                        class="uil uil-globe align-middle" title="website"></i></a></li>
        </ul><!--end icon-->
    </div>
</div>
<!-- Offcanvas End -->

<!-- Javascript -->
<script src="/assets/libs/tiny-slider/min/tiny-slider.js"></script>
<script src="/assets/libs/tobii/js/tobii.min.js"></script>
<script src="/assets/libs/feather-icons/feather.min.js"></script>
<!-- JAVASCRIPT -->
<script src="/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/assets/js/plugins.init.js"></script>
<script src="/assets/js/app.js"></script>

</body>

</html>
