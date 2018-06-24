<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HotelContact extends Model
{
    protected $primaryKey = 'hotel_contact_id';
    protected $table = 'hotel_contacts';

    protected $telephone;

    public function hotel()
    {
        $this->belongsTo('App\Hotel');
    }

}
