<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Post $post)
    {
        request()->validate([
            'body'=>'string|required'
        ]);

        Comment::create([
            'body' => request('body'),
            'user_id' => auth()->id(),
            'post_id' => $post->id
        ]);

        return back();
    }

    public function destroy(Comment $comment)
    {
        $this->authorize('delete',$comment);
        $comment->delete();
        return back();
    }
}
