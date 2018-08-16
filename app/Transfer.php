<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{
    protected $fillable = [
        'start_date', 'end_date', 'number_people', 'price', 'hotel_id',
    ];

    public function reservations()
    {
        return $this->belongsToMany(Reservation::class);
    }
    public function airports()
    {
        return $this->belongsToMany(Airport::class);
    }
    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }
    public function transfer_cars()
    {
        return $this->hasMany(TransferCar::class);
    }
}
