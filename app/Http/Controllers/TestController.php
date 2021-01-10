<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class TestController extends Controller
{
    public function index($id)
    {
        $dat = Post::where('id', $id)->withLikes()->get();
        return view('test',['data'=>$dat]);
    }
}
