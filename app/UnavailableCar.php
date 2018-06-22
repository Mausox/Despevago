<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UnavailableCar extends Model
{
    protected $primaryKey = 'unavailable_cars_id';
    protected $table = 'unavailable_cars';

    protected $date;

    public function car(){
        return $this->belongsTo('App\Car');
    }
}
