<?php

namespace App;

use willvincent\Rateable\Rateable;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use Rateable;
    //user_id foreign key
    public function users() {
        return $this->belongsTo('App\User');
    }

    public function rating(){
        return $this->hasMany('App\Rating');
    }
}
