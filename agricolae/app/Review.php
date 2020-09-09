<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{

    protected $fillable = ['product_id','title', 'description', 'score'];


    public function getId()
    {
        return $this->attributes['id'];
    }

    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }

    public function getTitle()
    {
        return $this->attributes['title'];
    }

    public function setTitle($ttl)
    {
        $this->attributes['title'] = $ttl;
    }
    
    public function getDescription()
    {
        return $this->attributes['description'];
    }

    public function setDescription($desc)
    {
        $this->attributes['description'] = $desc;
    }

    public function getScore()
    {
        return $this->attributes['score'];
    }

    public function setScore($score)
    {
        $this->attributes['score'] = $score;
    }


    public function product(){
        return $this->belongsTo(Product::class);
    }
}