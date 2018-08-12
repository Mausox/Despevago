<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarOption extends Model
{
    protected $fillable = [
        'name', 'description',
    ];

    public function cars(){
        return $this->belongsToMany(Car::class);
    }
}
