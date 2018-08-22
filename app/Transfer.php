<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{
    protected $fillable = [
        'start_date', 'end_date', 'number_people', 'price', 'route', 'hotel_id', 'airport_id', 'transfer_car_id',
    ];

    //public function ReservationTransfers(){return $this->hasMany(ReservationTransfer::class);}

    public function reservations()
    {
        return $this->belongsToMany(Reservation::class)->withTimestamps();
    }

    public function airports()
    {
        return $this->belongsToMany(Airport::class);
    }
    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }
    public function transfer_car()
    {
        return $this->belongsTo(TransferCar::class);
    }
}
