<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FinancialInformation extends Model
{
    protected $primaryKey = 'financial_information_id';

    protected $table = 'financial_information';

    public function user(){
        return $this->belongsTo('App/User');
    }

}
