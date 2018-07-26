<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomFlightPackage extends Model
{
    public function seats(){
        return $this->belongsToMany('App\Seat');
    }

    public function reservations(){
        return $this->belongsToMany('App\Reservation');
    }

    public function room(){
        return $this->belongsTo('App\Room');
    }
}
