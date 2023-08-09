@extends("layouts.frontend")
@section('title', 'Challenge.gov.bd Create Account')
@section("content")
<style>
    .submission_banner{
        min-height: 150px;
        background: rgb(0,102,49);
        background: radial-gradient(circle, rgba(0,102,49,1) 24%, rgba(0,153,20,1) 67%, rgba(0,149,10,1) 98%);
    }
    .challenge__header img {
        height: 120px !important;
        padding: 20px !important;
    }
</style>
<div class="header">
    <div class="submission_banner d-flex align-items-center justify-content-center">
        <h2 class="animated bounceInRight p-2 text-white text-center text-bold">{{trans('frontend.account_login')}}</h2>
    </div>
</div>
    <div class="container padding-y">
        <form action="/applicant/login" method="post">
            @csrf
            <input type="hidden" name="previous_route" value="{{url()->previous()}}">
            <div class="row" id="explore-challenges">
                <div class="col-md-6 col-12 mt-3 mx-auto"  data-aos="zoom-in" data-aos-duration="1000">
                    <div class=" p-5 shadow-lg radius-md">
                        <div class="col-sm-12 mx-t3 mb-4 ">
                            <img class=text-center" src="/logo2.png" >
                            <h5 class="text-success">{{trans('frontend.account_login')}}</h5>
                        </div>

                        <div class="col-sm-12 form-group">
                            <label for="name-f">{{trans('frontend.your_phone')}} </label>
                            <input type="text" class="form-control" name="phone"
                                placeholder="{{trans('frontend.your_phone')}} " value="{{old('phone')}}" required>
                        </div>
                        <div class="col-sm-12 form-group">
                            <label for="name-f">{{trans('frontend.password')}}</label>
                            <input type="password" class="form-control" name="password"
                                placeholder="{{trans('frontend.enter_password')}}" value="{{old('password')}}" required>
                        </div>
                        <div class="col-sm-12 form-group mb-0 mt-2 ">
                            <a href="/applicant/forgot-password" class="text-success "> {{trans('frontend.forgot_password')}}</a>
                        </div>
                        <br>
                        <div class="col-sm-12 form-group mb-0 mt-2 ">
                            <button class="btn btn-success " type="submit">{{trans('frontend.login')}}
                            </button>
                        </div>
                        <div class="col-sm-12 form-group mb-0 mt-5 ">
                            <p>Don't have an account? Please <a href="/applicant/registration" style=" text-decoration:underline !important" class=" text-underline text-success">Register
                            </a> Your Account</p>
                        </div>
                    </div>
                </div>
                @if(isset($challenge))
                <div class="col-md-6 col-12 mt-3 mx-auto d-flex align-content-center"  data-aos="flip-left" data-aos-duration="1000" >
                    <div class="card border-0 shadow-lg challenge-card ">
                        <div class="card-header challenge__header">
                            @if($challenge->logo)
                                <a href="{{ $challenge->logo->getUrl() }}" target="_blank">
                                    <img src="{{ $challenge->logo->getUrl()  }}" alt="power-explore">
                                </a>
                            @else
                                <img src="/frontend-assets/images/banners/ch.jpeg" alt="power-explore">
                            @endif
                        </div>
                        <div class="card-body">
                            <div class="card-content">
                                <h2>{{$challenge->title}}</h2>

                                <p>{{detailsFormat($challenge->short_description)}}</p>


                                <div class="cart-btn mt-5">
                                    @if ($challenge->start_date >= Carbon\Carbon::now())

                                        <span class="btn btn-success btn-lg"> {{trans('frontend.coming_soon')}}</span>
                                    @else
                                    <p><a href="/challenge-details/{{$challenge->slug}}" style=" text-decoration:underline !important" class=" text-underline text-success">Click here
                                    </a> for details about the project Your Account</p>
                                    @endif

                                </div>
                            </div>

                        </div>


                    </div>

                </div>
                @endif
            </div>
        </form>
    </div>

@endsection
