<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class MyPostsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        // dd(auth()->user()->posts);

        $user_id = auth()->user()->id;
        $user = User::find($user_id)->posts()->orderBy('created_at', 'DESC')->with(['user', 'likes'])->paginate(20);
        $user_name = auth()->user()->username;
        $user_receivedLikes = auth()->user()->receivedLikes;
        // return $user->posts;
        return view('my_posts', ['user' => $user, 'user_name' => $user_name, 'user_receivedLikes' => $user_receivedLikes]);
    }
}
