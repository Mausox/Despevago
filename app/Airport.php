<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Airport extends Model
{
    /**
     * @var string
     */
    protected $primaryKey = 'airport_id';

    /**
     * @var string
     */
    protected $table = 'airports';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function flights()
    {
        return $this->hasMany('App\Flight');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function city()
    {
        return $this->belongsTo('App\Flight');
    }
}
