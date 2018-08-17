<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AirlineContact extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'telephone', 'airline_id',
    ];

    public function airline()
    {
        return $this->belongsTo(Airline::class);
    }
}
