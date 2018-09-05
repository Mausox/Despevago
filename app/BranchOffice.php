<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BranchOffice extends Model
{
    protected $fillable = [
        'address', 'company_id', 'city_id','telephone'
    ];

    public function city()
    {
        return $this->belongsTo(Flight::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function cars()
    {
        return $this->hasMany(Car::class);
    }
}
