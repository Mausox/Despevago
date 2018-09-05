<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $name;
    protected $email;
    protected $score;
    protected $description;
    protected $city_id;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'score', 'description','city_id', 'hotel_image','telephone'
    ];

    public function rules()
    {
        return
            [
                'hotel_image' => 'image'
            ];
    }

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }


    public function transfers()
    {
        return $this->hasMany(Transfer::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

}
