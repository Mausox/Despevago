<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UnavailableCar extends Model
{
    protected $fillable = [
        'pick_up_date', 'return_date' ,'closed', 'reservation_id', 'car_id',
    ];

    public function car(){
        return $this->belongsTo(Car::class);
    }

    public function car_flight_packages(){
        return $this->hasMany(CarFlightPackage::class);
    }

    public function reservations(){
        return $this->belongsToMany(Reservation::class);
    }
}
