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

     /**
     * POST DETAIL
     */

    public function show($slug) {
        // $posts = Post::orderbY('created_at', 'desc')->get();

        $post = Post::where('slug', $slug)->first();

        if(empty($post)){
            abort('404');
        }

        return view('guests.posts.show', compact('post'));
    }

}
