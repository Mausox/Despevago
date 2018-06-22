<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Airline extends Model
{
    /**
     * @var string
     */
    protected $primaryKey = 'airline_id';

    /**
     * @var string
     */
    protected $table = 'airlines';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function flights()
    {
        return $this->hasMany('App\Flight');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function airlines_contact()
    {
        return $this->hasMany('App\Flight');
    }
}
