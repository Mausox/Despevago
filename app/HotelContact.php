<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HotelContact extends Model
{
    protected $fillable =[
        'telephone', 'hotel_id',
    ];

    public function hotel()
    {
        $this->belongsTo(Hotel::class);
    }

}
