<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    public function passengers(){
        return $this->hasMany(Passenger::class);
    }
    public function cities(){
        return $this->hasMany(City::class);
    }
}
