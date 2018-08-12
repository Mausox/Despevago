<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = [
        'pick_up_date', 'pick_up_time', 'return_date', 'return_time', 'classification', 'price', 'company_id',
    ];

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
