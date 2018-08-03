<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    public function seats()
    {
        return $this->hasMany(Seat::class);
    }

    public function airline()
    {
        return $this->belongsTo(Airline::class);
    }

    public function airport()
    {
        return $this->belongsTo(Airport::class);
    }
}
