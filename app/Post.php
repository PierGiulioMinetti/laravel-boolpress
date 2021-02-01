<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
   /**
     * DB RELATIONS
     */

    //  user-posts
    public function posts() {
        return $this->belongsTo('App\User');
    }
}
