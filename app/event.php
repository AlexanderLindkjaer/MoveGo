<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class event extends Model
{
    protected $fillable = [
        'headline',
        'description',
        'adress',
        'no_of_signups',
        'long',
        'lat',
        'start_of_event_date',
        'start_of_event_clock',
        'user_id'
    ];

    public function signups()
    {
        return $this->hasMany(Signup::class);
    }

    public function getNoOfSignupsAttribute()
    {
        return $this->signups->count();
    }

    public function event_chats()
    {
        return $this->hasMany(EventChat::class);
    }

    public function userIsSignedUp($user)
    {
        foreach ($this->signups as $signup) {
            if($signup->user_id == $user->id) return true;
        }
        return 0;
    }

    public function signOff($user)
    {
        foreach ($this->signups as $signup) {
            if($signup->user_id == $user->id){
                $signup->delete();
            }
        }
    }



}
