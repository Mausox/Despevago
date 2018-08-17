<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReservationTransfer extends Model
{
    protected $fillable = [
        'transfer_id', 'reservation_id','closed',
    ];

    public function reservation()
    {
        return $this->belongsTo(Reservation::class);
    }
    public function transfer()
    {
        return $this->belongsTo(Transfer::class);
    }


}
