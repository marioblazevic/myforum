<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FollowingController extends Controller
{
    public function index()
    {
        // dd(auth()->user()->follows);
        return view('users.following', ['users'=>auth()->user()->follows]);
    }
}
