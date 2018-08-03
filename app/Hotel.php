<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $name;
    protected $email;
    protected $score;
    protected $description;

    public function rooms()
    {
        $this->hasMany(Room::class);
    }

    public function hotelContacts()
    {
        $this->hasMany(HotelContact::class);
    }

    public function transfers()
    {
        $this->hasMany(Transfer::class);
    }

    public function city()
    {
        $this->belongsTo(City::class);
    }

}
