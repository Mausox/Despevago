<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BranchOfficeContact extends Model
{
    protected $primaryKey = 'branch_office_contact_id';
    protected $table = 'branch_offices_contact';

    protected $telephone;

    public function branch_office(){
        return $this->belongsTo('App\BranchOffice');
    }
}
