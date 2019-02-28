@extends('layout.layout')
@section('content')

<div class="container-fluid bg-white">

    <div class="p-3">
        <div class="row kpi-box">

            <div class="col-12 text-center">
                <h1>Users</h1>
            </div>
            <div class="col-6">
                @foreach($users as $user)
                    <p class="mb-0">ID:{{$user->id}} {{$user->name}} {{$user->email}}</p>
                @endforeach
            </div>
            <div class="col-6">
                <h3>Number of Users: {{$no_of_users}}</h3>
            </div>
        </div>
    </div>

    <div class="p-3">
        <div class="row kpi-box">

            <div class="col-12 text-center">
                <h1>Events</h1>
            </div>
            <div class="col-6">
                @foreach($events as $event)
                    <p class="mb-0">ID:{{$event->id}} {{$event->headline}} {{$event->description}} - No_of_signups: {{$event->no_of_signups}}</p>
                @endforeach
            </div>
            <div class="col-6">
                <h3>Number of Events: {{$no_of_events}}</h3>
            </div>
        </div>
    </div>
    
</div>

@endsection

<style>
    .kpi-box{
        border: 1px solid black;
    }
</style>