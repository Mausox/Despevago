<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UnavailableRoom extends Model
{
    protected $primaryKey = 'unavailable_room_id';
    protected $table = 'unavailable_rooms';

    protected $date;

    public function reservations ()
    {
        $this->belongsTo('App\Reservation');
    }



}
