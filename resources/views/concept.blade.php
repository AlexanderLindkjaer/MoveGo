@extends('layout.layout')
@section('content')

    <!-- Image Showcases -->
    <section class="showcase text-white">
        <div class="container-fluid p-0">
            <div class="row no-gutters">

                <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url('img/stock/athletes-basketball.jpg');"></div>
                <div class="col-lg-6 order-lg-1 my-auto showcase-text">
                    <h2>Lorem ipsum dolor sit ame</h2>
                    <p class="lead mb-0">consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit..</p>
                </div>
            </div>
            <div class="row no-gutters">
                <div class="col-lg-6 text-white showcase-img" style="background-image: url('img/stock/bouldering-climber.jpg');"></div>
                <div class="col-lg-6 my-auto showcase-text">
                    <h2>Lorem ipsum dolor sit ame</h2>
                    <p class="lead mb-0">consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit..</p>
                </div>
            </div>
            <div class="row no-gutters">
                <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url('img/stock/action-activity-adults.jpg');"></div>
                <div class="col-lg-6 order-lg-1 my-auto showcase-text">
                    <h2>Lorem ipsum dolor sit ame</h2>
                    <p class="lead mb-0">consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit..</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="testimonials text-center bg-light">
        <div class="container">
            <h2 class="mb-5">Hvad siger folk...</h2>
            <div class="row">
                <div class="col-lg-4">
                    <div class="testimonial-item mx-auto mb-5 mb-lg-0">
                        <img class="img-fluid rounded-circle mb-3" src="img/testimonials-1.jpg" alt="">
                        <h5>Margrethe</h5>
                        <p class="font-weight-light mb-0">"Det her er fantastisk, tak drenge!"</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="testimonial-item mx-auto mb-5 mb-lg-0">
                        <img class="img-fluid rounded-circle mb-3" src="img/testimonials-2.jpg" alt="">
                        <h5>Frede</h5>
                        <p class="font-weight-light mb-0">"Fedt koncept!"</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="testimonial-item mx-auto mb-5 mb-lg-0">
                        <img class="img-fluid rounded-circle mb-3" src="img/testimonials-3.jpg" alt="">
                        <h5>Sarah</h5>
                        <p class="font-weight-light mb-0">"En rigtigt god måde at være både social og aktiv"</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    {{--<section class="call-to-action text-white text-center">--}}
        {{--<div class="overlay"></div>--}}
        {{--<div class="container">--}}
            {{--<div class="row">--}}
                {{--<div class="col-xl-9 mx-auto">--}}
                    {{--<h2 class="mb-4">Ready to get started? Sign up now!</h2>--}}
                {{--</div>--}}
                {{--<div class="col-md-10 col-lg-8 col-xl-7 mx-auto">--}}
                    {{--<form>--}}
                        {{--<div class="form-row">--}}
                            {{--<div class="col-12 col-md-9 mb-2 mb-md-0">--}}
                                {{--<input type="email" class="form-control form-control-lg" placeholder="Enter your email...">--}}
                            {{--</div>--}}
                            {{--<div class="col-12 col-md-3">--}}
                                {{--<button type="submit" class="btn btn-block btn-lg btn-primary">Sign up!</button>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</form>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</section>--}}



@endsection
