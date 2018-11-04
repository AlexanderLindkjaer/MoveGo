@extends('layout.layout')
@section('content')

    <div class="container my-3">

        <create-edit-event state="{{$state}}" event_id="{{$id}}"></create-edit-event>

    </div>


@endsection