<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Signup extends Model
{
    protected $fillable = [
        'event_id',
        'name',
        'comment'
    ];

    public function event()
    {
        return $this->belongsTo(event::class);
    }
}
