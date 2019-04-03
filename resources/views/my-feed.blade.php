@extends('layout.layout')
@section('content')

    <section class="features-icons pt-4  text-center">
        <div class="container">
            <div class="row mb-3">
                <div class="col-12 m-4">
                    <h3 class="text-white text-center">Mine Aktiviteter</h3>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="w-100">
                    <my-feed></my-feed>
                </div>
            </div>
        </div>


    </section>

@endsection