<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    
    public function index()
    {
        return view('posts.index',['posts'=>auth()->user()->timeline()]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        request()->validate([
            'title' => 'string|required|max:255|',
            'body' => 'string|required|max:255|'
        ]);

        if(request('picture_path')){
            $picture = request('picture_path')->store('postsPictures');
        }else{
            $picture = null;
        }

        Post::create([
            'user_id' => auth()->id(),
            'title' => request('title'),
            'body' => request('body'),
            'picture_path' => $picture
        ]);

        return redirect()->route('posts');

    }

    public function delete(Post $post)
    {
        $this->authorize('delete',$post);
        $post->delete();
        return back();
    }

    public function edit(Post $post)
    {
        return view('posts.edit',['post'=>$post]);
    }

    public function update(Post $post)
    {
        // $this->authorize('update',$post);

        $attributes = request()->validate([
            'title' => 'string|required|max:255|',
            'body' => 'string|required|max:255|'
        ]);

        if(request('picture_path')){
            $attributes['picture_path'] = request('picture_path')->store('postsPictures');
        }

        $post->update($attributes);
        return redirect()->route('posts');

    }

    public function show($post)
    {
        $a = Post::where('id',$post)->withLikes()->get()->flatten();
        return view('posts.show',['posts'=>$a]);
    }

}
