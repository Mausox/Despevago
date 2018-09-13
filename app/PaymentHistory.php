<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentHistory extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'bank_name', 'account_number', 'amount', 'date', 'hour',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
