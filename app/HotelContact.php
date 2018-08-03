<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HotelContact extends Model
{
    protected $telephone;

    public function hotel()
    {
        $this->belongsTo(Hotel::class);
    }

}
