<!doctype html>
<html lang="en" dir="ltr">

@include('frontend.common.head')

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
<header id="topnav" class="navigation sticky">
    <div class="container">
        <!-- Logo container-->
        @php
            $platform=\App\Models\Platform::first();
        @endphp
        <div>
            <a class="logo" href="/">
                        <span class="logo-light-mode">
                            @if($platform)
                                @if($platform->logo)
                                    <img src="{{ $platform->logo->getUrl('thumb') }}" class="l-dark" alt="">
                                    <img src="{{ $platform->logo->getUrl('thumb') }}" class="l-light" alt="Logo">

                                @endif
                            @else
                                <img src="/assets/images/logo-light.png" class="l-light" height="22" alt="">

                            @endif

                        </span>
                <img src="/assets/images/logo-light.png" height="22" class="logo-dark-mode" alt="">
            </a>
        </div>
        <!-- End Logo container-->

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
                                src="/assets/images/doctors/01.jpg" class="avatar avatar-ex-small rounded-circle"
                                alt="">
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
                            <a class="dropdown-item text-dark" href="/patient/logout"><span
                                    class="mb-0 d-inline-block me-1"><i
                                        class="ri-logout-box-fill align-middle h6"></i></span> Logout</a>
                        </div>
                    </div>
                </li>
            @else
                <li class="list-inline-item mb-0 ms-1">
                    <div class="dropdown dropdown-primary">
                        <button type="button" class="btn btn-icon btn-pills btn-primary"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                class="ri-user-line"></i>
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
            <ul class="navigation-menu nav-left nav-light">
                <li class="has-submenu parent-menu-item">
                    <a href="/" class="active">Home</a>

                </li>
                <li class="has-submenu parent-menu-item">
                    <a href="#about" class="active" id="aboutLink">About Us</a>

                </li>
                <li class="has-submenu parent-menu-item">
                    <a href="/contact" class="active">Contact</a>

                </li>
                <li class="has-submenu parent-menu-item">
                    <a href="#blog" class="active" id="blogLink">Blog</a>

                </li>
                <li><a href="/patient/book/appointment" class="btn btn-primary">Book Appointment</a></li>
            </ul><!--end navigation menu-->
        </div><!--end navigation-->
    </div><!--end container-->
</header><!--end header-->
<!-- Navbar End -->

@yield('content')

@include('frontend.common.footer')

<script>
    document.getElementById("aboutLink").addEventListener("click", function(event) {
        event.preventDefault();
        // এখানে আপনি কোনও লোজিক যোগ করতে পারেন
        window.location.href = "#about";
    });
    document.getElementById("blogLink").addEventListener("click", function(event) {
        event.preventDefault();
        // এখানে আপনি কোনও লোজিক যোগ করতে পারেন
        window.location.href = "#blog";
    });
</script>

</body>

</html>
