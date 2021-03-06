<?php

//Author: Tomas Navarro

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;

class Product extends Model
{

    protected $fillable = ['user_id' ,'name', 'description', 'category', 'price', 'units', 'rating', 'image', 'created_at', 'updated_at'];

    public static function validateRules()
    {
        return [
            "name" => "required|min:4|max:40",
            "description" => "required|min:20|max:256",
            "category" => [
                "required",
                Rule::in(['veggies','tubers','legumes','fruits','nuts','cereals']),
            ],
            "price" => "required|numeric|gt:0",
            "units" => [
                "required",
                Rule::in(['unit','pound','kilogram']),
            ],
            "image" => "required",
        ];
    }

    public static function updateRules()
    {
        return [
            "name" => "required|min:4|max:40",
            "description" => "required|min:20|max:256",
            "category" => [
                "required",
                Rule::in(['veggies','tubers','legumes','fruits','nuts','cereals']),
            ],
            "price" => "required|numeric|gt:0",
            "units" => [
                "required",
                Rule::in(['unit','pound','kilogram']),
            ],
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

    public function setUserId($u_id)
    {
        $this->attributes['user_id'] = $u_id;
    }

    public function getName()
    {
        return $this->attributes['name'];
    }
    
    public function setName($name)
    {
        $this->attributes['name'] = $name;
    }
    
    public function getDescription()
    {
        return $this->attributes['description'];
    }
    
    public function setDescription($desc)
    {
        $this->attributes['description'] = $desc;
    }

    public function getCategory()
    {
        return $this->attributes['category'];
    }
    
    public function setCategory($cat)
    {
        $this->attributes['category'] = $cat;
    }
    
    public function getPrice()
    {
        return $this->attributes['price'];
    }
    
    public function setPrice($price)
    {
        $this->attributes['price'] = $price;
    }

    public function getUnits()
    {
        return $this->attributes['units'];
    }
    
    public function setUnits($units)
    {
        $this->attributes['units'] = $units;
    }

    public function getRating()
    {
        return $this->attributes['rating'];
    }
    
    public function setRating($rating)
    {
        $this->attributes['rating'] = $rating;
    }

    public function getImage()
    {
        return $this->attributes['image'];
    }

    public function setImage($image)
    {
        $this->attributes['image'] = $image;
    }

    public function getCreatedAt()
    {
        return $this->attributes['created_at'];
    }

    public function setCreatedAt($created_at)
    {
        $this->attributes['created_at'] = $created_at;
    }

    public function getUpdatedAt()
    {
        return $this->attributes['updated_at'];
    }

    public function setUpdatedAt($updated_at)
    {
        $this->attributes['updated_at'] = $updated_at;
    }

    public function user() 
    {
        return $this->belongsTo(User::class);
    }

    public function reviews() 
    {
        return $this->hasMany(Review::class);
    }

    public function whishList() 
    {
        return $this->hasMany(WhishList::class);
    }

    public function items()
    {
        return $this->hasMany(Item::class);
    }

}