<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    public function passenger()
    {
        return $this->hasOne('App\Passenger');
    }

    public function class_type()
    {
        return $this->belongsTo('App\ClassType');
    }

    public function flight()
    {
        return $this->belongsTo('App\Flight');
    }

    public function car_flight_packages()
    {
        return $this->belongsToMany('App\CarFlightPackage');
    }
}
