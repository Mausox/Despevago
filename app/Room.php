<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $capacity;
    protected $priceAdult;
    protected $priceChild;
    protected $description;

    public function roomOptions()
    {
        $this->belongsToMany('App\RoomOption');
    }

    public function hotel()
    {
        $this->belongsTo('App\Hotel');
    }
}
