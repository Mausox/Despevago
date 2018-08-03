<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AirlineContact extends Model
{
    public function airline()
    {
        return $this->belongsTo(Airline::class);
    }
}
