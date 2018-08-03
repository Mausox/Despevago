<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BranchOffice extends Model
{
    protected $address;

    public function company(){
        return $this->belongsTo(Company::class);
    }

    public function branch_offices_contact(){
        return $this->hasMany(BranchOfficeContact::class);
    }
}
