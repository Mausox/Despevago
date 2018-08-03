<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomFlightPackage extends Model
{
    public function seats(){
        return $this->belongsToMany(Seat::class);
    }

    public function reservations(){
        return $this->belongsToMany(Reservation::class);
    }

    public function room(){
        return $this->belongsTo(Room::class);
    }
}
