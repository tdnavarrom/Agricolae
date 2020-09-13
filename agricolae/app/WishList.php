<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WishList extends Model
{

    protected $fillable = ["title", "user_id", "product_id"];

    public static function validateRules()
    {
        return [
            "title" => 'required|min:1|max:40',
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

    public function getProductId()
    {
        return $this->attributes['product_id'];
    }

    public function setProductId($product_id)
    {
        $this->attributes['product_id'] = $product_id;
    }

    public function getTitle()
    {
        return $this->attributes['title'];
    }

    public function setTitle($ttl)
    {
        $this->attributes['title'] = $ttl;
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}