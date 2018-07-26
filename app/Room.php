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
        return $this->belongsToMany('App\RoomOption');
    }

    public function hotel()
    {
        return $this->belongsTo('App\Hotel');
    }

    public function room_flight_packages(){

        return $this->hasMany('App\RoomFlightPackage');
    }
}
