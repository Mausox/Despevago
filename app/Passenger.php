<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Passenger extends Model
{
    protected $primaryKey = 'passenger_id';
    protected $table = 'passengers';

    public function seat()
    {
        return $this->belongsTo('App/Seat');
    }
    //
}
