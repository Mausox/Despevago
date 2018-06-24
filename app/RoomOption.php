<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomOption extends Model
{
    protected $primaryKey = 'room_option_id';
    protected $table = 'room_options';

    protected $name;
    protected $feature;

    public function rooms()
    {
        $this->belongsToMany('App\Room');
    }
}
