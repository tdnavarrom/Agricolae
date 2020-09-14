<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Validation\Rule;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'last_name', 'cell_phone', 'email', 'user_type', 'password', 'image'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function updateRules($userId)
    {
        return [
            'name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'cell_phone' => 'required|string|max:50',
            'email' => ['required', Rule::unique('users')->ignore($userId)],
            'password-new' => 'nullable|confirmed|min:8',
            'password-current' => 'nullable|password|min:8',
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

    public function getLastName() 
    {
        return $this->attributes['last_name'];
    }

    public function setLastName($last_name)
    {
        $this->attributes['last_name'] = $last_name;
    }

    public function getCellPhone() 
    {
        return $this->attributes['cell_phone'];
    }

    public function setCellPhone($cell_phone)
    {
        $this->attributes['cell_phone'] = $cell_phone;
    }

    public function getEmail() 
    {
        return $this->attributes['email'];
    }

    public function setEmail($email)
    {
        $this->attributes['email'] = $email;
    }

    public function getType() 
    {
        return $this->attributes['user_type'];
    }

    public function setType($user_type)
    {
        $this->attributes['user_type'] = $user_type;
    }

    public function getPassword() 
    {
        return $this->attributes['password'];
    }

    public function setPassword($password)
    {
        $this->attributes['password'] = $password;
    }

    public function getImage()
    {
        return $this->attributes['image'];
    }

    public function setImage($image)
    {
        $this->attributes['image'] = $image;
    }

    public function whishList() {
        return $this->hasMany(WhishList::class);
    }
}
