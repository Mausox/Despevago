<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarFlightPackage extends Model
{
    public function seats(){
        return $this->belongsToMany(Seat::class);
    }

    public function unavailable_car(){
        return $this->belongsTo(UnavailableCar::class);
    }

    public function reservations(){
        return $this->belongsToMany(Reservation::class);
    }

    public function city(){
        return $this->belongsTo(City::class);
    }
}
