<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Airline extends Model
{
    public function flights()
    {
        return $this->hasMany('App\Flight');
    }

    public function airlines_contact()
    {
        return $this->hasMany('App\Flight');
    }
}
