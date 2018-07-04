<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BranchOffice extends Model
{
    protected $address;

    public function company(){
        return $this->belongsTo('App\Company');
    }

    public function branch_offices_contact(){
        return $this->hasMany('App\BranchOfficeContact');
    }
}
