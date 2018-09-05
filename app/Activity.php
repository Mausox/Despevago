<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $fillable = [
      'address', 'date', 'hour', 'price_adult', 'price_child',  'description', 'city_id',
    ];

    public function reservations()
    {
        return $this->belongsToMany(Reservation::class)->withTimestamps();
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
