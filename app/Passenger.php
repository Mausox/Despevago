<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Passenger extends Model
{
    public function seat()
    {
        return $this->hasOne(Seat::class);
    }
}
