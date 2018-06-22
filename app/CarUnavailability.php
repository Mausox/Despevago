<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarUnavailability extends Model
{
    protected $primaryKey = 'car_unavailability_id';
    protected $table = 'cars_unavailability';

    protected $date;

    public function car(){
        return $this->belongsTo('App\Car');
    }
}
