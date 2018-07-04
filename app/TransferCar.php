<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransferCar extends Model
{
    public function transfer(){
        return $this->belongsTo('App/Transfer');
    }
}
