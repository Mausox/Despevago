<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $name;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    public function passengers(){
        return $this->hasMany(Passenger::class);
    }
    public function cities(){
        return $this->hasMany(City::class);
    }
}
