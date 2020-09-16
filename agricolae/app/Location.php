<?php

//Author: Carlos Mesa

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{

    protected $fillable = ["user_id", "street_name","street_number", "city", "state", "country"];

    public static function validateRules()
    {
        return [
            "street_name" => 'required|string|min:2|max:30',
            "street_number" => 'required|string|min:2|max:30',
            "city" => 'required',
            "state" => 'required',
            "country" => 'required',
        ];
    }

    public function getId()
    {
        return $this->attributes['id'];
    }

    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }

    public function getUserId()
    {
        return $this->attributes['user_id'];
    }

    public function setUserId($user_id)
    {
        $this->attributes['user_id'] = $user_id;
    }

    public function getStreetName()
    {
        return $this->attributes['street_name'];
    }

    public function setStreetName($street_name)
    {
        $this->attributes['street_name'] = $street_name;
    }

    public function getStreetNumber()
    {
        return $this->attributes['street_number'];
    }

    public function setStreetNumber($street_number)
    {
        $this->attributes['street_number'] = $street_number;
    }

    public function getCity()
    {
        return $this->attributes['city'];
    }

    public function setCity($city)
    {
        $this->attributes['city'] = $city;
    }

    public function getState()
    {
        return $this->attributes['state'];
    }

    public function setState($state)
    {
        $this->attributes['state'] = $state;
    }

    public function getCountry()
    {
        return $this->attributes['country'];
    }

    public function setCountry($country)
    {
        $this->attributes['country'] = $country;
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}