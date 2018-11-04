@extends('layout.layout')
@section('content')


@include('header')

<!-- Icons Grid -->
<section class="features-icons pt-4 bg-light text-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                    <div class="features-icons-icon d-flex">
                        <i class="fa fa-futbol-o m-auto text-primary"></i>
                    </div>
                    <h3>Aktivitet</h3>
                    <p class="lead mb-0">Movego er en platform, hvor folk let og gratis kan melde sig til sportslige aktiviteter i deres nærområde.</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                    <div class="features-icons-icon d-flex">
                        <i class="fa fa-tablet m-auto text-primary"></i>
                    </div>
                    <h3>Platform</h3>
                    <p class="lead mb-0">Movego muliggør at brugeren selv kan oprette sportslige begivenheder.</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="features-icons-item mx-auto mb-0 mb-lg-3">
                    <div class="features-icons-icon d-flex">
                        <i class="fa fa-location-arrow m-auto text-primary"></i>
                    </div>
                    <h3>Der hvor du er</h3>
                    <p class="lead mb-0">Movego viser alle de sportslige aktiviteter på et kort, således man let kan se, hvor folk dyrker netop din sportsgren</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="w-100">
                <events-map></events-map>
            </div>
        </div>
    </div>

    <div class="container">

            <events></events>

    </div>

</section>

@endsection