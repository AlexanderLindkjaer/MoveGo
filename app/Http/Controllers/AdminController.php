<?php

namespace App\Http\Controllers;

use App\Signup;
use App\User;

class AdminController extends Controller
{
    public function __construct()
    {
        //$this->protect();
    }

    public function protect()
    {
        $user = auth()->user();

        if (!$user or !$user->is_admin) {
            return true;
        }

        return false;
    }

    public function show()
    {
        if ($this->protect()) {
            return redirect('/');
        }

        $users = User::get();
        $no_of_users = $users->count();
        $events = \App\event::get();
        $no_of_events = $events->count();
        $signups = Signup::get();
        $no_of_signups = $signups->count();

        return view('admin', compact(['users', 'no_of_users', 'events', 'no_of_events', 'signups', 'no_of_signups']));
    }
}
