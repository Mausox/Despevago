<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BranchOfficeContact extends Model
{
    protected $telephone;

    public function branch_office(){
        return $this->belongsTo('App\BranchOffice');
    }
}
