<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $capacity;
    protected $priceAdult;
    protected $priceChild;
    protected $description;

    public function roomOptions()
    {
        return $this->belongsToMany(RoomOption::class);
    }

    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }

    public function room_flight_packages(){

        return $this->hasMany(RoomFlightPackage::class);
    }
}
