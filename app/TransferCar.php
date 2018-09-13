<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransferCar extends Model
{
    protected $fillable = [
        'vehicle_registration_number', 'capacity', 'category', 'company',
        ];
    public function transfer(){
        return $this->hasMany(Transfer::class);
    }
}
