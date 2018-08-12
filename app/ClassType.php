<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClassType extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    public function seats()
    {
        return $this->hasMany(Seat::class);
    }
}
