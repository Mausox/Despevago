<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $primaryKey = 'city_id';

    protected $table = 'cities;';

    public function activities(){
        return $this->hasMany('App/Activity');
    }
    public function airports(){
        return $this->hasMany('App/Airport');
    }
    public function hotels(){
        return $this->hasMany('App/Hotel');
    }
    public function branch_offices(){
        return $this->hasMany('App/BranchOffice');
    }
    public function country(){
        return $this->hasOne('App/Country');
    }
}
