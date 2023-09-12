<div class="col-xl-3 col-lg-4 col-md-5 col-12 d-none d-lg-block">
    <div class="rounded shadow overflow-hidden sticky-bar">
        <div class="card border-0">
            <img src="../assets/images/doctors/profile-bg.jpg" class="img-fluid" alt="">
        </div>

        <div class="text-center avatar-profile margin-nagative mt-n5 position-relative pb-4 border-bottom">
            <img src="../assets/images/doctors/01.jpg" class="rounded-circle shadow-md avatar avatar-md-md" alt="">
            <h5 class="mt-3 mb-1">{{Auth::guard('applicant')->user()->name}}</h5>
            {{-- <p class="text-muted mb-0">Orthopedic</p>--}}
        </div>

        <ul class="list-unstyled sidebar-nav mb-0">
            <li class="navbar-item"><a href="/patient/profile" class="navbar-link"><i class="ri-airplay-line align-middle navbar-icon"></i> Dashboard</a></li>
            <li class="navbar-item"><a href="/patient/appointment-list" class="navbar-link"><i class="ri-calendar-check-line align-middle navbar-icon"></i> Appointment</a></li>
            <li class="navbar-item"><a href="/patient/logout" class="navbar-link"><i class="ri-logout-box-fill align-middle navbar-icon"></i>Logout</a></li>
        </ul>
    </div>
</div><!--end col-->
