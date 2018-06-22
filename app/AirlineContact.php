<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AirlineContact extends Model
{
    /**
     * @var string
     */
    protected $primaryKey = 'airline_contact_id';

    /**
     * @var string
     */
    protected $table = 'airlines_contact';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function airline()
    {
        return $this->belongsTo('App\Airline');
    }
}
