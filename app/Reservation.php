<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    public function user(){
        return $this->hasMany('App\User');
    }
    public function activities(){
        return $this->belongsToMany('App\Activity');
    }
    public function seats(){
        return $this->belongsToMany('App\Seat');
    }
    public function transfers(){
        return $this->belongsToMany('App\Transfer');
    }
    public function unavailable_rooms(){
        return $this->hasMany('App\UnavailableRoom');
    }
    public function unavailable_cars(){
        return $this->hasMany('App\UnavailableCar');
    }
    public function car_flight_packages(){
        return $this->hasMany('App\CarFlightPackage');
    }
    public function room_flight_packages(){
        return $this->belongsToMany('App\RoomFlightPackage');
    }
}
