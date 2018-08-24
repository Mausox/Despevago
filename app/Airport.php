<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Airport extends Model
{
    protected $fillable =[
        'name', 'address',
    ];

    public function transfers()
    {
        return $this->belongsToMany(Transfer::class);
    }
    public function flights()
    {
        return $this->hasMany(Flight::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
