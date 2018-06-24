<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserType extends Model
{
    protected $primaryKey = 'user_type_id';

    protected $table = 'user_types';

    public function users(){
        return $this->hasMany('App/User');
    }

}
