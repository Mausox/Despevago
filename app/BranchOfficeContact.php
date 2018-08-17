<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BranchOfficeContact extends Model
{
    protected $fillable = [
        'telephone', 'branch_office_id',
    ];

    public function branch_office(){
        return $this->belongsTo(BranchOffice::class);
    }
}
