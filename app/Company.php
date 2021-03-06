<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{

    protected $fillable = [
        'name', 'address', 'email',
    ];


    public function cars(){
        return $this->hasMany(Car::class);
    }

    public function branch_offices(){
        return $this->hasMany(BranchOffice::class);
    }

}
