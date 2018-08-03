<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $pick_up_date;
    protected $pick_up_time;
    protected $return_date;
    protected $return_time;
    protected $classification;
    protected $price;

    public function unavailable_cars(){
        return $this->hasMany(UnavailableCar::class);
    }

    public function car_options(){
        return $this->belongsToMany(CarOption::class);
    }

    public function company(){
        return $this->belongsTo(Company::class);
    }
}
