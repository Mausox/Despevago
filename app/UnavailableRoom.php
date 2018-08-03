<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UnavailableRoom extends Model
{
    protected $date;

    public function reservations ()
    {
        $this->belongsTo(Reservation::class);
    }



}
