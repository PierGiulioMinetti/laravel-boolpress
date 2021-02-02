<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    /**
     * MASS ASSIGNEMENT
     */
    protected $fillable=[
        'user_id',
        'title',
        'body',
        'slug'
    ];

   /**
     * DB RELATIONS
     */

    //  user-posts
    public function posts() {
        return $this->belongsTo('App\User');
    }
}
