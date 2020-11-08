<?php

//Author: Carlos Mesa

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Item;

class Order extends Model
{
    //attributes id, user_id,total, created_at, updated_at
    protected $fillable = ['total', 'user_id', 'created_at'];

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

    public function getTotal()
    {
        return $this->attributes['total'];
    }

    public function setTotal($total)
    {
        $this->attributes['total'] = $total;
    }

    public function getDate()
    {
        return $this->attributes['created_at'];
    }

    public function items(){
        return $this->hasMany(Item::class);
    }

}
