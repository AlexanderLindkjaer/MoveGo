<?php

namespace App\Http\Controllers;

use App\Signup;
use App\User;
use Illuminate\Console\Scheduling\Event;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function __construct()
    {
        //$this->protect();
    }

    public function protect()
    {
        $user = auth()->user();

        if(!$user or !$user->is_admin){
            redirect('/');
        }
    }

    public function show()
    {
        $this->protect();

        $users = User::get();
        $no_of_users = $users->count();
        $events = \App\event::get();
        $no_of_events = $events->count();
        $signups = Signup::get();
        $no_of_signups = $signups->count();


        return view('admin', compact(['users', 'no_of_users', 'events', 'no_of_events', 'signups', 'no_of_signups']));
    }
}
