<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{
    protected $primaryKey = 'transfer_id';

    protected $table = 'transfers';

    public function reservations(){
        return $this->belongsToMany('App/Reservation');
    }
    public function airports(){
        return $this->belongsToMany('App/Airport');
    }
    public function hotel(){
        return $this->belongsTo('App/Hotel');
    }
    public function transfer_cars(){
        return $this->hasMany('App/TransferCar');
    }
}
