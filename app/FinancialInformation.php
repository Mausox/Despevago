<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FinancialInformation extends Model
{
    public function user(){
        return $this->belongsTo('App/User');
    }

}
