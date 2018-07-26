<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarFlightPackage extends Model
{
    public function seats(){
        return $this->belongsToMany('App\Seat');
    }

    public function unavailable_car(){
        return $this->belongsTo('App\UnavailableCar');
    }

    public function reservations(){
        return $this->belongsToMany('App\Reservation');
    }

    public function city(){
        return $this->belongsTo('App\City');
    }
}
