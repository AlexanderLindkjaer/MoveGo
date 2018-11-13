@extends('layout.layout')
@section('content')

    <!-- Image Showcases -->
    <section class="showcase text-white">
        <div class="container-fluid p-0">
            <div class="row no-gutters">

                <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url('img/stock/athletes-basketball.jpg');"></div>
                <div class="col-lg-6 order-lg-1 my-auto showcase-text">
                    <h2>Movego for alle</h2>
                    <p class="lead mb-0">Du kender det godt.. Du står og mangler en eller flere personer til at spille en fodboldkamp, som ikke bliver til noget i sidste ende. Efter adskillige sms’er og forgæves opkald til vennerne lader du efterhånden helt være med at arrangere noget. Dette problem løser MoveGo. Med MoveGo kan du let finde personer, der deler dine sportslige interesser. MoveGo sørger dermed for din fodboldkamp bliver til noget!</p>
                </div>
            </div>
            <div class="row no-gutters">
                <div class="col-lg-6 text-white showcase-img" style="background-image: url('img/stock/bouldering-climber.jpg');"></div>
                <div class="col-lg-6 my-auto showcase-text">
                    <h2>Sådan gør du</h2>
                    <p class="lead mb-0">Igennem MoveGo kan personer let melde sig til og selv oprette alverdens sportslige aktiviteter. Lad kortet inspirere dig og meld dig til spændende aktiviteter i dit nærområde. Du kan også selv oprette din egen aktivitet, som andre melde sig til. Det er helt gratis at benytte MoveGo. Det kræver blot at du opretter et brugernavn, så andre kan se at du deltager. Det kræver kun få klik at tilmelde dig en aktivitet og du har også muligheden for at framelde dig aktiviteten, hvis du fortryder.</p>
                </div>
            </div>
            <div class="row no-gutters">
                <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url('img/stock/action-activity-adults.jpg');"></div>
                <div class="col-lg-6 order-lg-1 my-auto showcase-text">
                    <h2>Go Make Your Move!</h2>
                    <p class="lead mb-0">I tvivl om hvad du skal lave idag? Hvad venter du på? Arranger basketkampen med vennerne eller tilmeld dig aktiviteter og få nye bekendtskaber, der deler din passion. </p>
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
                        <img class="img-fluid rounded-circle mb-3" src="img/people/keno.jpg" alt="">
                        <h5>Nicolai</h5>
                        <p class="font-weight-light mb-0">"Fedt koncept!"</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="testimonial-item mx-auto mb-5 mb-lg-0">
                        <img class="img-fluid rounded-circle mb-3" src="img/people/mads.jpg" alt="">
                        <h5>Mads</h5>
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
