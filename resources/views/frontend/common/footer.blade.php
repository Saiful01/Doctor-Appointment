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
                                <a href="mailto:{{$platform->email}}" class="text-foot ms-2">{{$platform->email}}</a>
                            </li>

                            <li class="d-flex align-items-center">
                                <i data-feather="phone" class="fea icon-sm text-foot align-middle"></i>
                                <a href="tel:{{$platform->phone}}" class="text-foot ms-2">{{$platform->phone}}</a>
                            </li>

                            <li class="d-flex align-items-center">
                                <i data-feather="map-pin" class="fea icon-sm text-foot align-middle"></i>
                                <a href="javascript:void(0)" class="video-play-icon text-foot ms-2">View on Google
                                    map</a>
                            </li>
                        </ul>

                        <ul class="list-unstyled social-icon footer-social mb-0 mt-4">
                            <li class="list-inline-item"><a href="{{$platform->facebook_url}}" target="_blank"
                                                            class="rounded-pill"><i data-feather="facebook"
                                                                                    class="fea icon-sm fea-social"></i></a>
                            </li>
                            <li class="list-inline-item"><a href="{{$platform->youtube_url}}" target="_blank"
                                                            class="rounded-pill"><i data-feather="youtube"
                                                                                    class="fea icon-sm fea-social"></i></a>
                            </li>
                            <li class="list-inline-item"><a href="{{$platform->twiter_url}}" target="_blank"
                                                            class="rounded-pill"><i data-feather="twitter"
                                                                                    class="fea icon-sm fea-social"></i></a>
                            </li>
                            <li class="list-inline-item"><a href="{{$platform->linked_in_url}}" target="_blank"
                                                            class="rounded-pill"><i data-feather="linkedin"
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


</div>


<script src="/assets/libs/feather-icons/feather.min.js"></script>
<!-- JAVASCRIPT -->
<script src="/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/assets/js/plugins.init.js"></script>
<script src="/assets/js/app.js"></script>


