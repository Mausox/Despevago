<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $fillable = [
      'address', 'date', 'hour', 'price', 'description', 'city_id',
    ];

    public function reservations()
    {
        return $this->belongsToMany(Reservation::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
