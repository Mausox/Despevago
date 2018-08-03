<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    public function passenger()
    {
        return $this->hasOne(Passenger::class);
    }

    public function class_type()
    {
        return $this->belongsTo(ClassType::class);
    }

    public function flight()
    {
        return $this->belongsTo(Flight::class);
    }

    public function car_flight_packages()
    {
        return $this->belongsToMany(CarFlightPackage::class);
    }

    public function room_flight_packages()
    {
        return $this->belongsToMany(RoomFlightPackage::class);
    }
}
