<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransferCar extends Model
{
    protected $primaryKey = 'transfer_car_id';

    protected $table = 'transfer_cars';

    public function transfer(){
        return $this->belongsTo('App/Transfer');
    }
}
