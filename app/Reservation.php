<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    public function user(){
        return $this->hasMany(User::class);
    }
    public function activities(){
        return $this->belongsToMany(Activity::class);
    }
    public function seats(){
        return $this->belongsToMany(Seat::class);
    }
    public function transfers(){
        return $this->belongsToMany(Transfer::class);
    }
    public function unavailable_rooms(){
        return $this->hasMany(UnavailableRoom::class);
    }
    public function unavailable_cars(){
        return $this->hasMany(UnavailableCar::class);
    }
    public function car_flight_packages(){
        return $this->belongsToMany(CarFlightPackage::class);
    }
    public function room_flight_packages(){
        return $this->belongsToMany(RoomFlightPackage::class);
    }
}
