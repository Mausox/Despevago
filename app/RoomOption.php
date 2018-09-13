<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomOption extends Model
{
    protected $fillable =[
        'name', 'feature',
    ];

    public function rooms()
    {
        $this->belongsToMany(Room::class);
    }
}
