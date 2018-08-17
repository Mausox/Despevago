<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    protected $fillable =[
        'card_name', 'account_number', 'expiration_date',
    ];

    public function users()
    {
    	return $this->belongsToMany(User::class);
    }
}
