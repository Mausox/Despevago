<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FinancialInformation extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'bank_name', 'number_account', 'balance', 'user_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'bank_name', 'number_account', 'balance',
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

}
