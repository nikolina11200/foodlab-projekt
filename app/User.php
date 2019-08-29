<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'user_id',
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
    /*
    public function setPasswordAttribute($password)
    {   
        $this->attributes['password'] = bcrypt($password);
    }*/
    public function setPasswordAttribute($value)
    {
    return $this->attributes['password'] = Hash::needsRehash($value) ? Hash::make($value) : $value;
    }

    //user_id foreign key
    
    public function posts() {
        return $this->hasMany('App\Post');
    }
}
