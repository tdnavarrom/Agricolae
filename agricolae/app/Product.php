<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;

class Product extends Model
{

    //attributes id, name, price, created_at, updated_at
    protected $fillable = ['name', 'description', 'category', 'price', 'units', 'listed'];

    public static function validateRules()
    {

        return [
            "name" => "required|min:8|max:40",
            "description" => "required|min:128|max:256",
            "category" => [
                "required",
                Rule::in(['veggies','tubers','legumes','fruits','nuts','cereals']),
            ],
            "price" => "required|numeric|gt:0",
            "units" => "required|numeric|gt:0"
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

    public function getListed()
    {
        return $this->attributes['listed'];
    }
    
    public function setListed($listed)
    {
        $this->attributes['listed'] = $listed;
    }

    public function reviews() {
        return $this->hasMany(Review::class);
    }

    public function whishList() {
        return $this->hasMany(WhishList::class);
    }

}