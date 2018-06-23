<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $primaryKey = 'room_id';
    protected $table = 'rooms';

    protected $capacity;
    protected $priceAdult;
    protected $priceChild;
    protected $description;

    public function roomOptions()
    {
        $this->belongsToMany('App\RoomOption');
    }
}
