<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostLikesController extends Controller
{
    public function store(Post $post)
    {
        $post->like(auth()->user());
        return back();
    }

    public function destroy(Post $post)
    {
        $post->dislike(auth()->user());
        return back();
    }
}
