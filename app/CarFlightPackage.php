<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarFlightPackage extends Model
{
    protected $fillable = [
        'name', 'start_date', 'start_hour', 'end_date', 'end_hour', 'discount', 'city_id', 'car_id', 'seat_id'
    ];
    public function seat(){
        return $this->belongsTo(Seat::class);
    }

    public function car(){
        return $this->belongsTo(UnavailableCar::class);
    }

    public function reservations(){
        return $this->belongsToMany(Reservation::class);
    }

    public function city(){
        return $this->belongsTo(City::class);
    }
}
