<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Passenger extends Model
{
    /**
     * @var string
     */
    protected $primaryKey = 'passenger_id';

    /**
     * @var string
     */
    protected $table = 'passengers';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function seat()
    {
        return $this->belongsTo('App/Seat');
    }
    //
}
