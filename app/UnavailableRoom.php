<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UnavailableRoom extends Model
{
    protected $primaryKey = 'unavailable_room';
    protected $table = 'unavailable_rooms';

    protected $date;

    public function reservations ()
    {
        $this->belongsTo(Reservation::class);
    }

}
