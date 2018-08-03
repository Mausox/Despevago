<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Airport extends Model
{
    public function flights()
    {
        return $this->hasMany(Flight::class);
    }

    public function city()
    {
        return $this->belongsTo(Flight::class);
    }
}
