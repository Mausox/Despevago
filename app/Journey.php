<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Journey extends Model
{
    protected $fillable = [
        'departure_date',
        'departure_hour',
        'arrival_date',
        'arrival_hour',
    ];

    public function flights()
    {
        return $this->belongsTo(Flight::class);
    }

    public function departure_airport()
    {
        return $this->belongsTo(Airport::class);
    }
    
    public function arrival_airport()
    {
        return $this->belongsTo(Airport::class);
    }
}
