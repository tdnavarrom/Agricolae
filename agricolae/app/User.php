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
        'name', 'last_name', 'cell_phone', 'email', 'user_type', 'password',
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
            'password-current' => 'nullable|password|min:8'    
        ];
    }
}
