<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::where('user_id', Auth::id())
                ->orderBy('created_at', 'desc')
                ->get();

        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $request->validate([
            'title'=>'required',
            'body'=>'required',
        ]);

        // Get Logged User
        $data['user_id'] = Auth::id();
        $data['slug'] = Str::slug($data['title'], '-');

        // Creazione instanza
        $newPost = new Post();
        // Salvataggio
        $newPost->fill($data); //-->fillable nel model
            // Controllo salvataggio
        $saved = $newPost->save();

        // Redirect
        if($saved){
            return redirect()->route('admin.posts.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $data = $request->all();

        // VALIDAZIONE
        $request->validate([
            'title'=>'required',
            'body'=>'required',
        ]);

        // MODIFICA SLUG
        $data['slug'] = Str::slug($data['title'], '-');

        // UPDATE
        $updated = $post->update($data); //-->fillable nel model 

        // REDIRECT IF UPDATED
        if($updated) {
            return redirect()->route('posts.show', $post->slug);
        } return redirect()->route('posts.index', $post->slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
