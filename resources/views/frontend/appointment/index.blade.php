@extends("layouts.frontend")
@section('title', 'Sign-Up')
@section("content")

    <!-- Hero Start -->
    <section class="bg-half-150 d-table w-100 bg-light"
             style="background: url('/assets/images/bg/bg-lines-one.png') center;">


        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card border-0 shadow rounded overflow-hidden">
                        <ul class="nav nav-pills nav-justified flex-column flex-sm-row rounded-0 shadow overflow-hidden bg-light mb-0"
                            id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link rounded-0" id="clinic-booking" data-bs-toggle="pill"
                                   href="#pills-clinic" role="tab" aria-controls="pills-clinic" aria-selected="false"
                                   tabindex="-1">
                                    <div class="text-center pt-1 pb-1">
                                        <h5 class="fw-medium mb-0">Farazy Hospital Banasree</h5>
                                    </div>
                                </a><!--end nav link-->
                            </li><!--end nav item-->

                            <li class="nav-item" role="presentation">
                                <a class="nav-link rounded-0 active" id="online-booking" data-bs-toggle="pill"
                                   href="#pills-online" role="tab" aria-controls="pills-online" aria-selected="true">
                                    <div class="text-center pt-1 pb-1">
                                        <h5 class="fw-medium mb-0">AMZ Hospital Ltd</h5>
                                    </div>
                                </a><!--end nav link-->
                            </li><!--end nav item-->
                        </ul>

                        <div class="tab-content p-4" id="pills-tabContent">
                            <div class="tab-pane fade" id="pills-clinic" role="tabpanel"
                                 aria-labelledby="clinic-booking">
                                <form>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label class="form-label">Please Select Your Serial <span
                                                        class="text-danger">*</span></label> <br>
                                                @foreach($hospital1 as $item)
                                                    <span
                                                        class="btn @if($item->is_book == 0) btn-primary @else btn-danger  @endif mt-1">
                                                        {{$item->title}}


                                                    </span>

                                                @endforeach
                                            </div>
                                        </div><!--end col-->
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label class="form-label">Patient Name <span
                                                        class="text-danger">*</span></label>
                                                <input name="name" id="name" type="text" class="form-control"
                                                       placeholder="Patient Name :">
                                            </div>
                                        </div><!--end col-->

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Departments</label>
                                                <select class="form-select form-control">
                                                    <option value="EY">Eye Care</option>
                                                    <option value="GY">Gynecologist</option>
                                                    <option value="PS">Psychotherapist</option>
                                                    <option value="OR">Orthopedic</option>
                                                    <option value="DE">Dentist</option>
                                                    <option value="GA">Gastrologist</option>
                                                    <option value="UR">Urologist</option>
                                                    <option value="NE">Neurologist</option>
                                                </select>
                                            </div>
                                        </div><!--end col-->

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Doctor</label>
                                                <select class="form-select form-control">
                                                    <option value="CA">Dr. Calvin Carlo</option>
                                                    <option value="CR">Dr. Cristino Murphy</option>
                                                    <option value="AL">Dr. Alia Reddy</option>
                                                    <option value="TO">Dr. Toni Kovar</option>
                                                    <option value="JE">Dr. Jessica McFarlane</option>
                                                    <option value="EL">Dr. Elsie Sherman</option>
                                                    <option value="BE">Dr. Bertha Magers</option>
                                                    <option value="LO">Dr. Louis Batey</option>
                                                </select>
                                            </div>
                                        </div><!--end col-->

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Your Email <span class="text-danger">*</span></label>
                                                <input name="email" id="email" type="email" class="form-control"
                                                       placeholder="Your email :">
                                            </div>
                                        </div><!--end col-->

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Your Phone <span class="text-danger">*</span></label>
                                                <input name="phone" id="phone" type="tel" class="form-control"
                                                       placeholder="Your Phone :">
                                            </div>
                                        </div><!--end col-->

                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label class="form-label">Comments <span
                                                        class="text-danger">*</span></label>
                                                <textarea name="comments" id="comments" rows="4" class="form-control"
                                                          placeholder="Your Message :"></textarea>
                                            </div>
                                        </div><!--end col-->

                                        <div class="col-lg-12">
                                            <div class="d-grid">
                                                <button type="submit" class="btn btn-primary">Book An Appointment
                                                </button>
                                            </div>
                                        </div><!--end col-->
                                    </div><!--end row-->
                                </form>
                            </div>

                            <div class="tab-pane fade active show" id="pills-online" role="tabpanel"
                                 aria-labelledby="online-booking">
                                <form>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label class="form-label">Please Select Your Serial <span class="text-danger">*</span></label> <br>
                                                @foreach($hospital2 as $item)
                                                    <span ng-click="serialCheck({{$item->is_book}}, '{{$item->id}}')"
                                                          ng-class="{'btn-primary': {{$item->is_book}} == 0, 'btn-danger': {{$item->is_book}} == 1, 'btn-success': {{$item->is_book}} == 0 && selectedButton == '{{$item->title}}'}"
                                                          class="btn mt-1">
            {{$item->title}}
        </span>
                                                @endforeach
                                            </div>
                                        </div>

<!-- Input field to display the selected title with an ID -->
                                        <input type="text" id="selectedTitleInput" ng-model="selectedTitle" readonly>


                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label class="form-label">Patient Name <span
                                                        class="text-danger">*</span></label>
                                                <input name="name" id="name2" type="text" class="form-control"
                                                       placeholder="Patient Name :">
                                            </div>
                                        </div><!--end col-->

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Departments</label>
                                                <select class="form-select form-control">
                                                    <option value="EY">Eye Care</option>
                                                    <option value="GY">Gynecologist</option>
                                                    <option value="PS">Psychotherapist</option>
                                                    <option value="OR">Orthopedic</option>
                                                    <option value="DE">Dentist</option>
                                                    <option value="GA">Gastrologist</option>
                                                    <option value="UR">Urologist</option>
                                                    <option value="NE">Neurologist</option>
                                                </select>
                                            </div>
                                        </div><!--end col-->

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Doctor</label>
                                                <select class="form-select form-control">
                                                    <option value="CA">Dr. Calvin Carlo</option>
                                                    <option value="CR">Dr. Cristino Murphy</option>
                                                    <option value="AL">Dr. Alia Reddy</option>
                                                    <option value="TO">Dr. Toni Kovar</option>
                                                    <option value="JE">Dr. Jessica McFarlane</option>
                                                    <option value="EL">Dr. Elsie Sherman</option>
                                                    <option value="BE">Dr. Bertha Magers</option>
                                                    <option value="LO">Dr. Louis Batey</option>
                                                </select>
                                            </div>
                                        </div><!--end col-->

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Your Email <span class="text-danger">*</span></label>
                                                <input name="email" id="email2" type="email" class="form-control"
                                                       placeholder="Your email :">
                                            </div>
                                        </div><!--end col-->

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Your Phone <span class="text-danger">*</span></label>
                                                <input name="phone" id="phone2" type="tel" class="form-control"
                                                       placeholder="Your Phone :">
                                            </div>
                                        </div><!--end col-->

                                        <div class="col-md-6">
                                            <div class="mb-3" style="position: relative;">
                                                <label class="form-label"> Date : </label>
                                                <input name="date" type="text" class="form-control start"
                                                       placeholder="Select date :">
                                                <div class="qs-datepicker-container qs-hidden">
                                                    <div class="qs-datepicker">
                                                        <div class="qs-controls">
                                                            <div class="qs-arrow qs-left"></div>
                                                            <div class="qs-month-year"><span
                                                                    class="qs-month">September</span><span
                                                                    class="qs-year">2023</span></div>
                                                            <div class="qs-arrow qs-right"></div>
                                                        </div>
                                                        <div class="qs-squares">
                                                            <div class="qs-square qs-day">Sun</div>
                                                            <div class="qs-square qs-day">Mon</div>
                                                            <div class="qs-square qs-day">Tue</div>
                                                            <div class="qs-square qs-day">Wed</div>
                                                            <div class="qs-square qs-day">Thu</div>
                                                            <div class="qs-square qs-day">Fri</div>
                                                            <div class="qs-square qs-day">Sat</div>
                                                            <div class="qs-square Sun qs-outside-current-month qs-empty"
                                                                 data-direction="-1"></div>
                                                            <div class="qs-square Mon qs-outside-current-month qs-empty"
                                                                 data-direction="-1"></div>
                                                            <div class="qs-square Tue qs-outside-current-month qs-empty"
                                                                 data-direction="-1"></div>
                                                            <div class="qs-square Wed qs-outside-current-month qs-empty"
                                                                 data-direction="-1"></div>
                                                            <div class="qs-square Thu qs-outside-current-month qs-empty"
                                                                 data-direction="-1"></div>
                                                            <div class="qs-square Fri qs-num" data-direction="0">1</div>
                                                            <div class="qs-square Sat qs-num qs-current"
                                                                 data-direction="0">2
                                                            </div>
                                                            <div class="qs-square Sun qs-num" data-direction="0">3</div>
                                                            <div class="qs-square Mon qs-num" data-direction="0">4</div>
                                                            <div class="qs-square Tue qs-num" data-direction="0">5</div>
                                                            <div class="qs-square Wed qs-num" data-direction="0">6</div>
                                                            <div class="qs-square Thu qs-num" data-direction="0">7</div>
                                                            <div class="qs-square Fri qs-num" data-direction="0">8</div>
                                                            <div class="qs-square Sat qs-num" data-direction="0">9</div>
                                                            <div class="qs-square Sun qs-num" data-direction="0">10
                                                            </div>
                                                            <div class="qs-square Mon qs-num" data-direction="0">11
                                                            </div>
                                                            <div class="qs-square Tue qs-num" data-direction="0">12
                                                            </div>
                                                            <div class="qs-square Wed qs-num" data-direction="0">13
                                                            </div>
                                                            <div class="qs-square Thu qs-num" data-direction="0">14
                                                            </div>
                                                            <div class="qs-square Fri qs-num" data-direction="0">15
                                                            </div>
                                                            <div class="qs-square Sat qs-num" data-direction="0">16
                                                            </div>
                                                            <div class="qs-square Sun qs-num" data-direction="0">17
                                                            </div>
                                                            <div class="qs-square Mon qs-num" data-direction="0">18
                                                            </div>
                                                            <div class="qs-square Tue qs-num" data-direction="0">19
                                                            </div>
                                                            <div class="qs-square Wed qs-num" data-direction="0">20
                                                            </div>
                                                            <div class="qs-square Thu qs-num" data-direction="0">21
                                                            </div>
                                                            <div class="qs-square Fri qs-num" data-direction="0">22
                                                            </div>
                                                            <div class="qs-square Sat qs-num" data-direction="0">23
                                                            </div>
                                                            <div class="qs-square Sun qs-num" data-direction="0">24
                                                            </div>
                                                            <div class="qs-square Mon qs-num" data-direction="0">25
                                                            </div>
                                                            <div class="qs-square Tue qs-num" data-direction="0">26
                                                            </div>
                                                            <div class="qs-square Wed qs-num" data-direction="0">27
                                                            </div>
                                                            <div class="qs-square Thu qs-num" data-direction="0">28
                                                            </div>
                                                            <div class="qs-square Fri qs-num" data-direction="0">29
                                                            </div>
                                                            <div class="qs-square Sat qs-num" data-direction="0">30
                                                            </div>
                                                        </div>
                                                        <div class="qs-overlay qs-hidden">
                                                            <div><input class="qs-overlay-year"
                                                                        placeholder="4-digit year" inputmode="numeric">
                                                                <div class="qs-close">✕</div>
                                                            </div>
                                                            <div class="qs-overlay-month-container">
                                                                <div class="qs-overlay-month" data-month-num="0">Jan
                                                                </div>
                                                                <div class="qs-overlay-month" data-month-num="1">Feb
                                                                </div>
                                                                <div class="qs-overlay-month" data-month-num="2">Mar
                                                                </div>
                                                                <div class="qs-overlay-month" data-month-num="3">Apr
                                                                </div>
                                                                <div class="qs-overlay-month" data-month-num="4">May
                                                                </div>
                                                                <div class="qs-overlay-month" data-month-num="5">Jun
                                                                </div>
                                                                <div class="qs-overlay-month" data-month-num="6">Jul
                                                                </div>
                                                                <div class="qs-overlay-month" data-month-num="7">Aug
                                                                </div>
                                                                <div class="qs-overlay-month" data-month-num="8">Sep
                                                                </div>
                                                                <div class="qs-overlay-month" data-month-num="9">Oct
                                                                </div>
                                                                <div class="qs-overlay-month" data-month-num="10">Nov
                                                                </div>
                                                                <div class="qs-overlay-month" data-month-num="11">Dec
                                                                </div>
                                                            </div>
                                                            <div class="qs-submit qs-disabled">Submit</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!--end col-->

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="input-time">Time : </label>
                                                <input name="time" type="text" class="form-control timepicker"
                                                       id="input-time" placeholder="03:30 PM">
                                            </div>
                                        </div><!--end col-->

                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label class="form-label">Comments <span
                                                        class="text-danger">*</span></label>
                                                <textarea name="comments" id="comments2" rows="4" class="form-control"
                                                          placeholder="Your Message :"></textarea>
                                            </div>
                                        </div><!--end col-->

                                        <div class="col-lg-12">
                                            <div class="d-grid">
                                                <button type="submit" class="btn btn-primary">Book An Appointment
                                                </button>
                                            </div>
                                        </div><!--end col-->
                                    </div><!--end row-->
                                </form>
                            </div>
                        </div>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->


    </section><!--end section-->
    <!-- Hero End -->

@endsection
