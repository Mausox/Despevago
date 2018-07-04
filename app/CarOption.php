<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarOption extends Model
{
    protected $name;
    protected $feature;

    public function cars(){
        return $this->belongsToMany('App\Car');
    }
}
