@extends("layouts.details")
@section('title', 'Sign-Up')
@section("content")

    <!-- Hero Start -->
    <section class="bg-home d-flex bg-light align-items-center" style="background: url('../assets/images/bg/bg-lines-one.png') center;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-8">
                    <img src="/assets/images/logo-dark.png" height="22" class="mx-auto d-block" alt="">
                    <div class="card login-page shadow mt-4 rounded border-0">
                        <div class="card-body">
                            <h4 class="text-center">Sign In</h4>
                            <form action="/applicant/login" method="post" class="login-form mt-4">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label class="form-label">Your Phone <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" placeholder="Phone" name="phone" required="">
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label class="form-label">Password <span class="text-danger">*</span></label>
                                            <input type="password" class="form-control" placeholder="Password" required="">
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="d-flex justify-content-between">
                                            <div class="mb-3">
                                                <div class="form-check">
                                                    <input class="form-check-input align-middle" type="checkbox" value="" id="remember-check">
                                                    <label class="form-check-label" for="remember-check">Remember me</label>
                                                </div>
                                            </div>
                                            <a href="forgot-password.html" class="text-dark h6 mb-0">Forgot password ?</a>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mb-0">
                                        <div class="d-grid">
                                            <button class="btn btn-primary">Sign in</button>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 mt-3 text-center">
                                        <h6 class="text-muted">Or</h6>
                                    </div><!--end col-->

                                    <div class="col-6 mt-3">
                                        <div class="d-grid">
                                            <a href="#" class="btn btn-soft-primary"><i class="uil uil-facebook"></i> Facebook</a>
                                        </div>
                                    </div><!--end col-->

                                    <div class="col-6 mt-3">
                                        <div class="d-grid">
                                            <a href="#" class="btn btn-soft-primary"><i class="uil uil-google"></i> Google</a>
                                        </div>
                                    </div><!--end col-->

                                    <div class="col-12 text-center">
                                        <p class="mb-0 mt-3"><small class="text-dark me-2">Don't have an account ?</small> <a href="/patient/registration" class="text-dark fw-bold">Sign Up</a></p>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div><!---->
                </div> <!--end col-->
            </div><!--end row-->
        </div> <!--end container-->
    </section><!--end section-->
    <!-- Hero End -->

@endsection
