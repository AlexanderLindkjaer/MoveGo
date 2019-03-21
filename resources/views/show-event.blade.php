@extends('layout.layout')
@section('content')

    <show-event event_id="{{$id}}" :signed_up="{{$signedUp}}"></show-event>
    <event-comments event_id="{{$id}}"></event-comments>

    @if(auth()->user()->eventActions($id))
        <div class="container mb-4">
            <div class="row">
                <div class="col-6">
                    <a class="btn bg-orange w-100 text-white text-center" href="/event/edit/{{$id}}">Rediger</a>
                </div>
                <div class="col-6">
                    <a class="btn bg-danger w-100 text-white text-center" id="delete_event" data-id="{{$id}}" href="/event/delete/{{$id}}">Delete</a>
                </div>
            </div>
        </div>
    @endif

    @if($signedUp == 1 && !auth()->user()->eventActions($id))
        <div class="container mb-4">
            <div class="row">
                <div class="col-12">
                    <a class="btn bg-danger w-100 text-white text-center" href="/event/signoff/{{$id}}">Cancel Participation</a>
                </div>
            </div>
        </div>
    @endif


@endsection