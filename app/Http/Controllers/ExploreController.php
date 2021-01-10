<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class ExploreController extends Controller
{
    
    public function index()
    {
        $users = User::where('id', '!=', auth()->id())->get();

        return view('users.explore',['users'=>$users]);
    }

}
