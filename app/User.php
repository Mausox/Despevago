<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    public function reservations(){
        return $this->hasMany('App/Reservation');
    }

    public function financial_information(){
        return $this->hasOne('App/FinancialInformation');
    }

    public function user_history(){
        return $this->belongsTo('App/UserHistory');
    }

    public function user_types(){
        return $this->belongsToMany('App\UserType')->withTimestamps();
    }

    public function authorize_user_types($user_types){
        if ($this->has_any_user_type($user_types)) {
            return true;
        }
        abort(401, 'This action is unauthorized.');
    }

    public function has_any_user_type($user_types){
        if (is_array($user_types)){
            foreach ($user_types as $user_type){
                if($this->has_user_type($user_type)){
                    return true;
                }
            }
        } else {
            if($this->has_user_type($user_types)){
                return true;
            }
        }
        return false;
    }

    public function has_user_type($user_type){
        if ($this->user_types()->where('name', $user_type)->first()){
            return true;
        }
        return false;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password', 'first_name', 'last_name', 'telephone', 'address',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
