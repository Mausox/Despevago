<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UnavailableCar extends Model
{
    protected $date;

    public function car(){
        return $this->belongsTo('App\Car');
    }

    public function car_flight_packages(){
        return $this->belongsToMany('App\CarFlightPackage');
    }

    public function reservations(){
        return $this->belongsToMany('App\Reservation');
    }
}
