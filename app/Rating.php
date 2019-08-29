<?php

namespace App;

use willvincent\Rateable\Rateable;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable = ['rating'];

    /**
     * @return mixed
     */
    public function rateable()
    {
        return $this->morphTo();
    }

    /**
     * Rating belongs to a user.
     *
     * @return User
     */
    //user_id foreign key
    public function users() {
        return $this->belongsToMany('App\User');
    }

    public function posts() {
        return $this->belongsTo('App\Post');
    }
}