<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $name;
    protected $country_id;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','country_id'
    ];

    public function activities(){
        return $this->hasMany(Activity::class);
    }
    public function airports(){
        return $this->hasMany(Airport::class);
    }
    public function hotels(){
        return $this->hasMany(Hotel::class);
    }
    public function branch_offices(){
        return $this->hasMany(BranchOffice::class);
    }
    public function country(){
        return $this->hasOne(Country::class);
    }
    public function car_flight_packages(){
        return $this->belongsToMany(CarFlightPackage::class);
    }
}
