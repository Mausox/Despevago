<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UnavailableRoom extends Model
{

    protected $fillable = [
        'date', 'closed', 'reservation_id', 'room_id'
    ];

    public function reservation()
    {
        return $this->belongsTo(Reservation::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id', 'id');

    }



}
