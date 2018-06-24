<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $primaryKey = 'user_id';

    protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function reservations(){
        return $this->hasMany('App/Reservation');
    }
    public function user_type(){
        return $this->belongsTo('App/UserType');
    }
    public function financial_information(){
        return $this->hasOne('App/FinancialInformation');
    }
    public function user_history(){
        return $this->belongsTo('App/UserHistory');
    }

}
