<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomFlightPackage extends Model
{
    protected $fillable = [
        'name', 'start_date', 'start_hour', 'end_date', 'end_hour', 'discount', 'unavailable_room_id', 'city_id',
    ];
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
