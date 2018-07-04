<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomOption extends Model
{
    protected $name;
    protected $feature;

    public function rooms()
    {
        $this->belongsToMany('App\Room');
    }
}
