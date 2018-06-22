<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClassType extends Model
{
    protected $primaryKey = 'class_type_id';
    protected $table = 'class_types';

    public function seats()
    {
        return $this->hasMany('App\Seat');
    }
}
