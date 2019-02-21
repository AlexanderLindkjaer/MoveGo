<?php

namespace App\Http\Controllers;

use App\event;
use App\Signup;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EventController extends Controller
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
    public function rawIndex()
    {
        return event::all();
    }

    public function allRaw()
    {
        $now = Carbon::now();
        return event::whereDate('start_of_event_date', '>=', $now)->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $state = 'create';
        $id = 0;

        return view('create-event', compact('state', 'id'));
    }

    public function home()
    {
        $events = event::all();
        return view('frontpage', compact('events'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $event = event::create($request->all());
        return $event;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(event $event)
    {
        $id = $event->id;
        return view('show-event', compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(event $event)
    {
        $state = 'edit';
        $id = $event->id;


        return view('create-event', compact('state', 'id'));
    }

    public function signup(Request $request)
    {
        $event = event::find($request->id);

        $existing = Signup::where('event_id', $event->id)->where('user_id', $request->user_id)->first();
        if($existing){
            abort('403', 'Bruger er allerede tilmeldt');
        }

        $signup = Signup::create([
            'event_id' => $event->id,
            'user_id' => $request->user_id,
        ]);

        $event->increment('no_of_signups');

        return $event;
    }

    public function raw(event $event)
    {
        $event->start_of_event_date = Carbon::parse($event->start_of_event_date)->format('Y-m-d');
        $event->start_of_event_date_pretty = Carbon::parse($event->start_of_event_date)->format('d-m-Y');
        $event->load(['signups']);
        $event->load(['signups.user']);

        $data = array();
        array_push($data, $event);

        if(auth()->user()){
            array_push($data, auth()->user());
        }


        return $data;

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $event = Event::findOrFail($request->id);
        $event->update($request->all());
        return $event;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\event  $event
     * @return \Illuminate\Http\Response
     */
    public function concept()
    {
        return view('concept');
    }
}
