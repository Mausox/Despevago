<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClassType extends Model
{
    /**
     * @var string
     */
    protected $primaryKey = 'class_type_id';

    /**
     * @var string
     */
    protected $table = 'class_types';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function seats()
    {
        return $this->hasMany('App\Seat');
    }
}
