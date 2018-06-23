<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $primaryKey = 'hotel_id';
    protected $table = 'hotels';

    protected $name;
    protected $email;
    protected $score;
    protected $description;

    public function rooms()
    {
        $this->hasMany('App\Room');
    }

    public function hotelContacts()
    {
        $this->hasMany('App\HotelContact');
    }

    public function transfers()
    {
        $this->hasMany('App\Transfer');
    }

    public function city()
    {
        $this->belongsTo('App\City');
    }

}
