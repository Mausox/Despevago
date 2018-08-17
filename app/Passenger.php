<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Passenger extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'dni',
    ];

    public function seat()
    {
        return $this->hasOne(Seat::class);
    }
}
