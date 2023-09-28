@extends("layouts.details")
@section('title', 'Sign-Up')
@section("content")

    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-7">

                    @if($blog->featured_image)
                        <a href="{{ $blog->featured_image->getUrl() }}" target="_blank" style="display: inline-block">
                            <img src="{{ $blog->featured_image->getUrl('thumb') }}">
                        </a>
                    @else
                        <img src="../assets/images/blog/single.jpg" class="img-fluid rounded shadow" alt="">


                    @endif

                       <p>{!! $blog->details !!}</p>


                </div><!--end col-->


            </div><!--end row-->
        </div><!--end container-->


    </section>
@endsection
