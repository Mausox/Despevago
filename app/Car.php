<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = [
        'brand', 'model' ,'type', 'capacity', 'price', 'branch_office_id',
    ];

    public function unavailable_cars()
    {
        return $this->hasMany(UnavailableCar::class);
    }

    public function car_options()
    {
        return $this->belongsToMany(CarOption::class);
    }

    public function branch_office()
    {
        return $this->belongsTo(BranchOffice::class);
    }
}
