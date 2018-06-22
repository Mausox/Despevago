<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $primaryKey = 'activity_id';
    protected $table = 'activities';

    protected $address;
    protected $date;
    protected $hour;
    protected $price;
    protected $description;

    public function reservations()
    {
        return $this->belongsToMany(Reservation::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
