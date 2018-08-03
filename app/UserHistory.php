<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserHistory extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'date', 'hour', 'action',
    ];

    /**
     * Relationship with users
     */
    public function user(){
        return $this->belongsTo(User::class);
    }
}
