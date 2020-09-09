<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    //attributes id, name, price, created_at, updated_at
    protected $fillable = ['name', 'description', 'category', 'price', 'units', 'listed'];

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

    /**public function whishList() {
        return $this->belongsTo(WhishList::class);
    }**/

}