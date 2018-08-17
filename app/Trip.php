<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    protected $fillable = [
        'departure_city',
        'departure_date',
        'departure_hour',
        'arrival_city',
        'arrival_date',
        'arrival_hour',
        'direct',
    ];

    public function flights()
    {
        return $this->belongsToMany(Flight::class);
    }
}