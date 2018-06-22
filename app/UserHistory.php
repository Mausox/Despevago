<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserHistory extends Model
{
    protected $primaryKey = 'user_history_id';

    protected $table = 'user_histories';

    public function users(){
        return $this->hasMany('App/User');
    }
}
