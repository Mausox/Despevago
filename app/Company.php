<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $primaryKey = 'company_id';
    protected $table = 'companies';

    protected $address;
    protected $email;

    public function cars(){
        return $this->hasMany('App\Car');
    }

    public function branch_offices(){
        return $this->hasMany('App\BranchOffice');
    }

}
