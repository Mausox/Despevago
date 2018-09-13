<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomFlightPackage extends Model
{
    protected $fillable = [
        'name', 'start_date', 'start_hour', 'end_date', 'end_hour', 'discount', 'room_id', 'city_id', 'seat_id'
    ];
    public function seat(){
        return $this->belongsTo(Seat::class);
    }

    public function reservations(){
        return $this->belongsToMany(Reservation::class);
    }

    public function room(){
        return $this->belongsTo(Room::class);
    }

    public function city(){
        return $this->belongsTo(City::class);
    }
}
