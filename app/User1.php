<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User1 extends Model
{
    public function posts() {
        return $this->hasMany('App\Post');
    }
}
