<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    public function seats()
    {
        return $this->hasMany('App\Seat');
    }

    public function airline()
    {
        return $this->belongsTo('App\Airline');
    }

    public function airport()
    {
        return $this->belongsTo('App\Airport');
    }
}
