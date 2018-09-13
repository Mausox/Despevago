<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password', 'first_name', 'last_name', 'telephone', 'address', 'current_balance',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'current_balance',
    ];

    public function reservations(){
        return $this->hasMany(Reservation::class);
    }

    public function user_histories(){
        return $this->hasMany(UserHistory::class);
    }

    public function user_types(){
        return $this->belongsToMany(UserType::class)->withTimestamps();
    }

    public function payment_methods()
    {
        return $this->belongsToMany(PaymentMethod::class)->withTimestamps();
    }

    public function payment_histories()
    {
        return $this->hasMany(PaymentHistory::class);
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
}
