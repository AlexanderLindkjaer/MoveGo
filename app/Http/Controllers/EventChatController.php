<?php

namespace App\Http\Controllers;

use App\event;
use App\EventChat;
use Illuminate\Http\Request;

class EventChatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }


    public function eventRaw(event $event)
    {
        return EventChat::with(['user'])->where('event_id', $event->id)->get();
    }


    public function newChat(Request $request)
    {

        $event = Event::findOrFail($request->event_id);

        if(!auth()->user() || !$event->userIsSignedUp(auth()->user())) abort(403, 'not allowed');

        EventChat::create([
            'user_id' => auth()->user()->id,
            'event_id' => $event->id,
            'message' => $request->message,
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function user()
    {
        return auth()->user();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\EventChat  $eventChat
     * @return \Illuminate\Http\Response
     */
    public function show(EventChat $eventChat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EventChat  $eventChat
     * @return \Illuminate\Http\Response
     */
    public function edit(EventChat $eventChat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EventChat  $eventChat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EventChat $eventChat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EventChat  $eventChat
     * @return \Illuminate\Http\Response
     */
    public function destroy(EventChat $eventChat)
    {
        //
    }
}
