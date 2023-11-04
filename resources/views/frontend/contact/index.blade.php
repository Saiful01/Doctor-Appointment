@extends("layouts.details")
@section('title', 'Sign-Up')
@section("content")

    @php

    $platform= \App\Models\Platform::first();

    @endphp

    <section class="mt-100 mt-60">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="card features feature-primary text-center border-0">
                        <div class="icon text-center rounded-md mx-auto">
                            <i class="ri-phone-fill h3 mb-0"></i>
                        </div>
                        <div class="card-body p-0 mt-3">
                            <h5>Phone</h5>
                          <a href="tel:{{$platform->phone}}" class="link">{{$platform->phone}}</a>
                        </div>
                    </div>
                </div><!--end col-->

                <div class="col-lg-4 col-md-6 mt-4 mt-sm-0 pt-2 pt-sm-0">
                    <div class="card features feature-primary text-center border-0">
                        <div class="icon text-center rounded-md mx-auto">
                            <i class="ri-message-2-fill h3 mb-0"></i>
                        </div>
                        <div class="card-body p-0 mt-3">
                            <h5>Email</h5>
                           <a href="mailto:contact@example.com" class="link">{{$platform->email}}</a>
                        </div>
                    </div>
                </div><!--end col-->

                <div class="col-lg-4 col-md-6 mt-4 mt-lg-0 pt-2 pt-lg-0">
                    <div class="card features feature-primary text-center border-0">
                        <div class="icon text-center rounded-md mx-auto">
                            <i class="ri-map-2-fill h3 mb-0"></i>
                        </div>
                        <div class="card-body p-0 mt-3">
                            <h5>Location</h5>
                            <p class="text-muted mt-3">{{$platform->address}}</p>

                        </div>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->

        <div class="container mt-100 mt-60">
            <div class="row align-items-center">
                <div class="col-lg-5 col-md-6">
                    <div class="me-lg-5">
                        <img src="../assets/images/about/about-2.png" class="img-fluid" alt="">
                    </div>
                </div>

                <div class="col-lg-7 col-md-6 mt-4 pt-2 mt-sm-0 pt-sm-0">
                    <div class="custom-form rounded shadow p-4">
                        <h5 class="mb-4">Get in touch!</h5>
                        <form method="post" action="/contact/send">
                            @csrf
                            <p id="error-msg"></p>
                            <div id="simple-msg"></div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Your Name <span class="text-danger">*</span></label>
                                        <input name="name" id="name" type="text" class="form-control border rounded" placeholder="First Name :" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Your Email <span class="text-danger">*</span></label>
                                        <input name="email" id="email" type="email" class="form-control border rounded" placeholder="Your email :">
                                    </div>
                                </div><!--end col-->

                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Subject</label>
                                        <input name="subject" id="subject" class="form-control border rounded" placeholder="Your subject :">
                                    </div>
                                </div><!--end col-->

                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Comments <span class="text-danger">*</span></label>
                                        <textarea name="message" id="message" rows="4" class="form-control border rounded" placeholder="Your Message :"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <button type="submit" id="submit" name="send" class="btn btn-primary">Send Message</button>
                                </div><!--end col-->
                            </div><!--end row-->
                        </form>
                    </div><!--end custom-form-->
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->

        <div class="container-fluid mt-100 mt-60">
            <div class="row">
                <div class="col-12 p-0">
                    <div class="card map border-0">
                        <div class="card-body p-0">
                            <iframe width="520" height="400" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" id="gmap_canvas" src="https://maps.google.com/maps?width=520&amp;height=400&amp;hl=en&amp;q=Cha-%2080/3,%20Shadhinota%20Sarani,%20Progati%20Sarani%20Rd,%20Dhaka-%201212%20Dhaka+(AMZ%20Hospital%20Ltd.,%20Dacca,%20Bangladesh)&amp;t=&amp;z=13&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe><a href='https://maps-generator.com/'>Maps Generator</a>
                        </div>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </section>
@endsection
