<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $primaryKey = 'car_id';
    protected $table = 'cars';

    protected $pick_up_date;
    protected $pick_up_time;
    protected $return_date;
    protected $return_time;
    protected $classification;
    protected $price;

    public function car_unavailabilities(){
        return $this->hasMany('App\CarUnavailability');
    }
}
