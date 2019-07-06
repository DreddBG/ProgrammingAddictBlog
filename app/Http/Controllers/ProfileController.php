<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;

class ProfileController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);    
        $posts = Post::all();
        return view('profile')->with('posts', $user->posts)->with('user', $user);
    }

    public function show($id)
    {
        $user = User::find($id);    
        $posts = Post::all();
        return view('profile')->with('posts', $user->posts)->with('user', $user);
    }
}
