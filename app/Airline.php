<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Airline extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'address', 'score', 'description',
    ];

    public function flights()
    {
        return $this->hasMany(Flight::class);
    }
}
