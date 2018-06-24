<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $primaryKey = 'country_id';

    protected $table = 'countries';

    public function passengers(){
        return $this->hasMany('App/Passenger');
    }
    public function cities(){
        return $this->hasMany('App/City');
    }
}
