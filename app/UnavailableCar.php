<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UnavailableCar extends Model
{
    protected $date;

    public function car(){
        return $this->belongsTo(Car::class);
    }

    public function car_flight_packages(){
        return $this->hasMany(CarFlightPackage::class);
    }

    public function reservations(){
        return $this->belongsToMany(Reservation::class);
    }
}
