<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function signups()
    {
        return $this->hasMany(Signup::class);
    }

    public function eventActions($event_id = 0)
    {
        $allowed = false;

        if ($this->is_admin) {
            $allowed = true;
        }

        $event = event::find($event_id);
        if (!$event) {
            return false;
        }

        if ($event->user_id == $this->id) {
            $allowed = true;
        }

        return $allowed;
    }
}
