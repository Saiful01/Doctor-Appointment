@extends("layouts.frontend")
@section('title', 'Dr Mustafizur Rahman')
@section("content")

    <!-- Start Hero -->
    <section class="bg-half-260 d-table w-100"
             style="background: url('../public/assets/images/home-one-img.png') center; background-repeat: no-repeat; background-color: #191d73">
        <div class="bg-overlay bg-overlay-dark"></div>
        <div class="container">
            <div class="row mt-5 mt-lg-0">
                <div class="col-12">
                    <a href="{{route('book.appointment')}}">
                        <div class="heading-title">
                            <img src="/public/assets/images/logo-icon.png" height="50" alt="">
                            <h4 class="display-4 fw-bold text-white title-dark mt-3 mb-4">Meet The
                                <br> {{$doctor->name}}</h4>
                            <p class="para-desc text-white-50 mb-0">{{$doctor->short_details}}</p>

                            <div class="mt-4 pt-2">
                                <span class="btn btn-primary">Make Appointment</span>
                            </div>
                        </div>
                    </a>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </section><!--end section-->
    <!-- End Hero -->

    <!-- Start -->
    <section class="section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-10">
                    <div class="features-absolute bg-white shadow rounded overflow-hidden card-group">
                        <div class="card border-0 bg-light p-4">
                            <i class="ri-heart-pulse-fill text-primary h2 mb-0"></i>
                            <h5 class="mt-1">Hospitals</h5>
                            @foreach($hospitals as $item)
                                <h6> {{$item->title}}</h6>
                                <p class="text-muted mt-2">{{$item->address}}</p>
                                {{--      <a href="" class="text-primary">Read More <i
                                              class="ri-arrow-right-line align-middle"></i></a>
          --}}
                            @endforeach
                        </div>

                        <div class="card border-0 p-4">
                            <i class="ri-dossier-fill text-primary h2 mb-0"></i>
                            <h5 class="mt-1">Doctors Areas of Expertise: </h5>
                            <ul>
                                @foreach($doctor->specialists as $item)

                                    <li class="text-muted mt-2">{{$item->title}}</li>
                                @endforeach

                            </ul>


                        </div>

                        <div class="card border-0 bg-light p-4">
                            <i class="ri-time-fill text-primary h2 mb-0"></i>
                            <h5 class="mt-1">Available Days</h5>
                            <ul class="list-unstyled mt-2">
                                @foreach(\App\Models\WeeklyDay::get() as $item)
                                    <li class="d-flex justify-content-between">
                                        <p class="text-muted mb-0">{{$item->name}}</p>
                                        <p class="text-primary mb-0">4:00 PM - 9:00 PM</p>
                                    </li>
                                @endforeach

                            </ul>

                        </div>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->

        <div class="container mt-100 mt-60" id="about">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6">
                    <div class="position-relative">
                        <img src="/public/assets/images/about-img.png" class="img-fluid" alt="">

                    </div>
                </div><!--end col-->

                <div class="col-lg-6 col-md-6 mt-4 mt-lg-0 pt- pt-lg-0">
                    <div class="ms-lg-4">
                        <div class="section-title">
                            <h4 class="title mb-4">About us</h4>
                            <h5>{{$doctor->name}}</h5>
                            <p class="text-muted para-desc">{!! $doctor->overview !!}</p>

                        </div>


                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->

       {{-- <div class="container mt-100 mt-60">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="section-title mb-4 pb-2 text-center">
                        <span class="badge rounded-pill bg-soft-primary mb-3">Departments</span>
                        <h4 class="title mb-4">Our Medical Services</h4>
                        <p class="text-muted mx-auto para-desc mb-0">Great doctor if you need your family member to get
                            effective immediate assistance, emergency treatment or a simple consultation.</p>
                    </div>
                </div><!--end col-->
            </div><!--end row-->

            <div class="row">
                <div class="col-xl-3 col-md-4 col-12 mt-5">
                    <div class="card features feature-primary border-0">
                        <div class="icon text-center rounded-md">
                            <i class="ri-eye-fill h3 mb-0"></i>
                        </div>
                        <div class="card-body p-0 mt-3">
                            <a href="departments.html" class="title text-dark h5">Eye Care</a>
                            <p class="text-muted mt-3">There is now an abundance of readable dummy texts required purely
                                to fill a space.</p>
                            <a href="departments.html" class="link">Read More <i
                                    class="ri-arrow-right-line align-middle"></i></a>
                        </div>
                    </div>
                </div><!--end col-->

                <div class="col-xl-3 col-md-4 col-12 mt-5">
                    <div class="card features feature-primary border-0">
                        <div class="icon text-center rounded-md">
                            <i class="ri-psychotherapy-fill h3 mb-0"></i>
                        </div>
                        <div class="card-body p-0 mt-3">
                            <a href="departments.html" class="title text-dark h5">Psychotherapy</a>
                            <p class="text-muted mt-3">There is now an abundance of readable dummy texts required purely
                                to fill a space.</p>
                            <a href="departments.html" class="link">Read More <i
                                    class="ri-arrow-right-line align-middle"></i></a>
                        </div>
                    </div>
                </div><!--end col-->

                <div class="col-xl-3 col-md-4 col-12 mt-5">
                    <div class="card features feature-primary border-0">
                        <div class="icon text-center rounded-md">
                            <i class="ri-stethoscope-fill h3 mb-0"></i>
                        </div>
                        <div class="card-body p-0 mt-3">
                            <a href="departments.html" class="title text-dark h5">Primary Care</a>
                            <p class="text-muted mt-3">There is now an abundance of readable dummy texts required purely
                                to fill a space.</p>
                            <a href="departments.html" class="link">Read More <i
                                    class="ri-arrow-right-line align-middle"></i></a>
                        </div>
                    </div>
                </div><!--end col-->

                <div class="col-xl-3 col-md-4 col-12 mt-5">
                    <div class="card features feature-primary border-0">
                        <div class="icon text-center rounded-md">
                            <i class="ri-capsule-fill h3 mb-0"></i>
                        </div>
                        <div class="card-body p-0 mt-3">
                            <a href="departments.html" class="title text-dark h5">Dental Care</a>
                            <p class="text-muted mt-3">There is now an abundance of readable dummy texts required purely
                                to fill a space.</p>
                            <a href="departments.html" class="link">Read More <i
                                    class="ri-arrow-right-line align-middle"></i></a>
                        </div>
                    </div>
                </div><!--end col-->

                <div class="col-xl-3 col-md-4 col-12 mt-5">
                    <div class="card features feature-primary border-0">
                        <div class="icon text-center rounded-md">
                            <i class="ri-microscope-fill h3 mb-0"></i>
                        </div>
                        <div class="card-body p-0 mt-3">
                            <a href="departments.html" class="title text-dark h5">Orthopedic</a>
                            <p class="text-muted mt-3">There is now an abundance of readable dummy texts required purely
                                to fill a space.</p>
                            <a href="departments.html" class="link">Read More <i
                                    class="ri-arrow-right-line align-middle"></i></a>
                        </div>
                    </div>
                </div><!--end col-->

                <div class="col-xl-3 col-md-4 col-12 mt-5">
                    <div class="card features feature-primary border-0">
                        <div class="icon text-center rounded-md">
                            <i class="ri-pulse-fill h3 mb-0"></i>
                        </div>
                        <div class="card-body p-0 mt-3">
                            <a href="departments.html" class="title text-dark h5">Cardiology</a>
                            <p class="text-muted mt-3">There is now an abundance of readable dummy texts required purely
                                to fill a space.</p>
                            <a href="departments.html" class="link">Read More <i
                                    class="ri-arrow-right-line align-middle"></i></a>
                        </div>
                    </div>
                </div><!--end col-->

                <div class="col-xl-3 col-md-4 col-12 mt-5">
                    <div class="card features feature-primary border-0">
                        <div class="icon text-center rounded-md">
                            <i class="ri-empathize-fill h3 mb-0"></i>
                        </div>
                        <div class="card-body p-0 mt-3">
                            <a href="departments.html" class="title text-dark h5">Gynecology</a>
                            <p class="text-muted mt-3">There is now an abundance of readable dummy texts required purely
                                to fill a space.</p>
                            <a href="departments.html" class="link">Read More <i
                                    class="ri-arrow-right-line align-middle"></i></a>
                        </div>
                    </div>
                </div><!--end col-->

                <div class="col-xl-3 col-md-4 col-12 mt-5">
                    <div class="card features feature-primary border-0">
                        <div class="icon text-center rounded-md">
                            <i class="ri-mind-map h3 mb-0"></i>
                        </div>
                        <div class="card-body p-0 mt-3">
                            <a href="departments.html" class="title text-dark h5">Neurology</a>
                            <p class="text-muted mt-3">There is now an abundance of readable dummy texts required purely
                                to fill a space.</p>
                            <a href="departments.html" class="link">Read More <i
                                    class="ri-arrow-right-line align-middle"></i></a>
                        </div>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->--}}
    </section><!--end section-->
    <!-- End -->

    <!-- Start -->
    <section class="section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="section-title text-center mb-4 pb-2">
                        <h4 class="title mb-4">Patients Says</h4>
                        <p class="text-muted mx-auto para-desc mb-0">Great doctor if you need your family member to get
                            effective immediate assistance, emergency treatment or a simple consultation.</p>
                    </div>
                </div><!--end col-->
            </div><!--end row-->

            <div class="row justify-content-center">
                <div class="col-lg-8 mt-4 pt-2 text-center">
                    <div class="client-review-slider">
                        <div class="tiny-slide text-center">
                            <p class="text-muted fw-normal fst-italic">" It seems that only fragments of the original
                                text remain in the Lorem Ipsum texts used today. The most well-known dummy text is the
                                'Lorem Ipsum', which is said to have originated in the 16th century. "</p>
                            <img src="/public/assets/images/client/01.jpg"
                                 class="img-fluid avatar avatar-small rounded-circle mx-auto shadow my-3" alt="">
                            <ul class="list-unstyled mb-0">
                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                            </ul>
                            <h6 class="text-primary">- Thomas Israel <small class="text-muted">C.E.O</small></h6>
                        </div><!--end customer testi-->

                        <div class="tiny-slide text-center">
                            <p class="text-muted fw-normal fst-italic">" The advantage of its Latin origin and the
                                relative meaninglessness of Lorum Ipsum is that the text does not attract attention to
                                itself or distract the viewer's attention from the layout. "</p>
                            <img src="/public/assets/images/client/02.jpg"
                                 class="img-fluid avatar avatar-small rounded-circle mx-auto shadow my-3" alt="">
                            <ul class="list-unstyled mb-0">
                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                            </ul>
                            <h6 class="text-primary">- Carl Oliver <small class="text-muted">P.A</small></h6>
                        </div><!--end customer testi-->

                        <div class="tiny-slide text-center">
                            <p class="text-muted fw-normal fst-italic">" There is now an abundance of readable dummy
                                texts. These are usually used when a text is required purely to fill a space. These
                                alternatives to the classic Lorem Ipsum texts are often amusing and tell short, funny or
                                nonsensical stories. "</p>
                            <img src="/public/assets/images/client/03.jpg"
                                 class="img-fluid avatar avatar-small rounded-circle mx-auto shadow my-3" alt="">
                            <ul class="list-unstyled mb-0">
                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                            </ul>
                            <h6 class="text-primary">- Barbara McIntosh <small class="text-muted">M.D</small></h6>
                        </div><!--end customer testi-->

                        <div class="tiny-slide text-center">
                            <p class="text-muted fw-normal fst-italic">" According to most sources, Lorum Ipsum can be
                                traced back to a text composed by Cicero in 45 BC. Allegedly, a Latin scholar
                                established the origin of the text by compiling all the instances of the unusual word
                                'consectetur' he could find "</p>
                            <img src="/public/assets/images/client/04.jpg"
                                 class="img-fluid avatar avatar-small rounded-circle mx-auto shadow my-3" alt="">
                            <ul class="list-unstyled mb-0">
                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                            </ul>
                            <h6 class="text-primary">- Christa Smith <small class="text-muted">Manager</small></h6>
                        </div><!--end customer testi-->

                        <div class="tiny-slide text-center">
                            <p class="text-muted fw-normal fst-italic">" It seems that only fragments of the original
                                text remain in the Lorem Ipsum texts used today. The most well-known dummy text is the
                                'Lorem Ipsum', which is said to have originated in the 16th century. "</p>
                            <img src="/public/assets/images/client/05.jpg"
                                 class="img-fluid avatar avatar-small rounded-circle mx-auto shadow my-3" alt="">
                            <ul class="list-unstyled mb-0">
                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                            </ul>
                            <h6 class="text-primary">- Dean Tolle <small class="text-muted">Developer</small></h6>
                        </div><!--end customer testi-->

                        <div class="tiny-slide text-center">
                            <p class="text-muted fw-normal fst-italic">" It seems that only fragments of the original
                                text remain in the Lorem Ipsum texts used today. One may speculate that over the course
                                of time certain letters were added or deleted at various positions within the text.
                                "</p>
                            <img src="/public/assets/images/client/06.jpg"
                                 class="img-fluid avatar avatar-small rounded-circle mx-auto shadow my-3" alt="">
                            <ul class="list-unstyled mb-0">
                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                            </ul>
                            <h6 class="text-primary">- Jill Webb <small class="text-muted">Designer</small></h6>
                        </div><!--end customer testi-->
                    </div><!--end carousel-->
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->

        <div class="container mt-100 mt-60" id="blog">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="section-title text-center mb-4 pb-2">
                        <span class="badge rounded-pill bg-soft-primary mb-3">Read News</span>
                        <h4 class="title mb-4">Latest News & Blogs</h4>
                    </div>
                </div><!--end col-->
            </div><!--end row-->

            <div class="row">
                @foreach($blogs as $item)
                    <div class="col-lg-4 col-md-6 col-12 mt-4 pt-2">
                        <div class="card blog blog-primary border-0 shadow rounded overflow-hidden">
                            @if($item->featured_image)

                                <img src="{{ $item->featured_image->getUrl('thumb') }}" class="img-fluid" alt="">
                            @else

                            <img src="/public/assets/images/blog/01.jpg" class="img-fluid" alt="">
                            @endif
                            <div class="card-body p-4">
                                <ul class="list-unstyled mb-2">
                                    <li class="list-inline-item text-muted small me-3"><i
                                            class="uil uil-calendar-alt text-dark h6 me-1"></i>{{$item->created_at}}
                                    </li>

                                </ul>
                                <a href="/blog-details/{{$item->id}}" class="text-dark title h5">{{$item->title}}</a>
                                <div class="post-meta d-flex justify-content-between mt-3">
                                    <ul class="list-unstyled mb-0">
                                        <li class="list-inline-item me-2 mb-0"><a href="#" class="text-muted like"><i
                                                    class="mdi mdi-heart-outline me-1"></i>33</a></li>
                                        <li class="list-inline-item"><a href="#" class="text-muted comments"><i
                                                    class="mdi mdi-comment-outline me-1"></i>08</a></li>
                                    </ul>
                                    <a href="/blog-details/{{$item->id}}" class="link">Read More <i
                                            class="mdi mdi-chevron-right align-middle"></i></a>
                                </div>
                            </div>
                        </div>
                    </div><!--end col-->

                @endforeach

            </div><!--end row-->
        </div><!--end container-->
        <div class="container mt-100 mt-60" id="video">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="section-title text-center mb-4 pb-2">

                        <h4 class="title mb-4">Video Blogs</h4>
                    </div>
                </div><!--end col-->
            </div><!--end row-->

            <div class="row">
                @foreach($videos as $item)
                    <div class="col-lg-4 col-md-6 col-12 mt-4 pt-2">
                        <div class="card blog blog-primary border-0 shadow rounded overflow-hidden">
                            <iframe width="420" height="315"
                                    src="https://www.youtube.com/embed/{{$item->youtube_link}}">
                            </iframe>
                            <div class="card-body p-4">
                              <h5> {{$item->title}}</h5>
                           </div>
                        </div>
                    </div><!--end col-->

                @endforeach

            </div><!--end row-->
        </div><!--end container-->
    </section><!--end section-->
    <!-- End -->

@endsection
