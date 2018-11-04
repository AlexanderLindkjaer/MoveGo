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
    ];


}
