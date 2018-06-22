<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BranchOffice extends Model
{
    protected $primaryKey = 'branch_office_id';
    protected $table = 'branch_offices';

    protected $address;

    public function company(){
        return $this->belongsTo('App\Company');
    }

    public function branch_offices_contact(){
        return $this->hasMany('App\BranchOfficeContact');
    }
}
