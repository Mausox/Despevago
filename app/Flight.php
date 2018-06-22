<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    /**
     * @var string
     */
    protected $primaryKey = 'flight_id';

    /**
     * @var string
     */
    protected $table = 'flights';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function seats()
    {
        return $this->hasMany('App\Seat');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function airline()
    {
        return $this->belongsTo('App\Airline');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function airport()
    {
        return $this->belongsTo('App\Airport');
    }
}
