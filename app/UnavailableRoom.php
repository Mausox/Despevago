<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UnavailableRoom extends Model
{
    protected $date;
    protected $closed;
    protected $reservation_id;
    protected $room_id;

    protected $fillable = [
        'date', 'closed', 'reservation_id', 'room_id'
    ];

    public function reservations ()
    {
        $this->belongsTo(Reservation::class);
    }

    public function room()
    {
        $this->belongsTo(Room::class);

    }



}
