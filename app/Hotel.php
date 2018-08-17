<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $name;
    protected $email;
    protected $score;
    protected $description;
    protected $city_id;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'score', 'description','city_id'
    ];

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
