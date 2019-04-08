<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Signup extends Model
{
    protected $fillable = [
        'event_id',
        'user_id',
    ];

    public function event()
    {
        return $this->belongsTo(event::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
