<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $date;
    protected $hour;
    protected $current_balance;
    protected $new_balance;
    protected $user_id;
    protected $closed;

    protected $fillable = [
        'date', 'hour', 'current_balance', 'new_balance', 'user_id','closed'
        ];

    public function user(){
        return $this->hasMany(User::class);
    }
    public function activities(){
        return $this->belongsToMany(Activity::class);
    }
    public function seats(){
        return $this->belongsToMany(Seat::class);
    }
    public function ReservationTransfers(){
        return $this->hasMany(ReservationTransfer::class);
    }
    public function unavailable_rooms(){
        return $this->hasMany(UnavailableRoom::class);
    }
    public function unavailable_cars(){
        return $this->hasMany(UnavailableCar::class);
    }
    public function car_flight_packages(){
        return $this->belongsToMany(CarFlightPackage::class);
    }
    public function room_flight_packages(){
        return $this->belongsToMany(RoomFlightPackage::class);
    }
}
