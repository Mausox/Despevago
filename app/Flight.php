<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    protected $fillable =[
        'flight_number',
        'cabin_baggage',
        'capacity',
        'airplane_model',
    ];
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
