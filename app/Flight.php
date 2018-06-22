<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    protected $primaryKey = 'flight_id';
    protected $table = 'flights';

    public function seats()
    {
        return $this->hasMany('App\Seat');
    }
}
