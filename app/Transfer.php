<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{
    protected $fillable = [
        'start_date', 'start_hour', 'number_people', 'price', 'route', 'hotel_id', 'airport_id', 'transfer_car_id',
    ];

    public function reservations()
    {
        return $this->belongsToMany(Reservation::class)->withTimestamps();
    }

    public function airport()
    {
        return $this->belongsTo(Airport::class);
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
