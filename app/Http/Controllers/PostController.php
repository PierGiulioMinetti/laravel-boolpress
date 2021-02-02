<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;


class PostController extends Controller
{
    /**
     * POST ARCHIVE
     */

     public function index() {
         $posts = Post::orderbY('created_at', 'desc')->get();
         return view('guests.posts.index', compact('posts'));
     }
}
