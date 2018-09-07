<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActivityReservation extends Model
{
    protected $fillable = [
        'reservation_id', 'activity_id', 'closed', 
      ];
}
