<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserType extends Model
{

    protected $fillable = [
      'name', 'description',
    ];

    public function users(){
        return $this->belongsToMany(User::class)->withtimestamps();
    }

}
