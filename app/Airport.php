<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Airport extends Model
{
    protected $fillable =[
        'name', 'address',
    ];

    public function transfers()
    {
        return $this->hasMany(Transfer::class);
    }

    public function flights()
    {
        return $this->hasMany(Flight::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function departure_journeys()
    {
        return $this->hasMany(Journey::class, 'departure_airport_id');
    }

    public function arrival_journeys()
    {
        return $this->hasMany(Journey::class, 'arrival_airport_id');
    }
}
