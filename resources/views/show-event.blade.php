@extends('layout.layout')
@section('content')

    <show-event event_id="{{$id}}"></show-event>
    <event-comments event_id="{{$id}}"></event-comments>


@endsection