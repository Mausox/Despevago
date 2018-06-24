<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarOption extends Model
{
    protected $primaryKey = 'car_option_id';
    protected $table = 'car_options';

    protected $name;
    protected $feature;

    public function cars(){
        return $this->belongsToMany('App\Car');
    }
}
