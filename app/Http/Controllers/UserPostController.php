<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserPostController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);    
    }
    
    public function index(User $user)
    {
        $posts = $user->posts()->orderBy('created_at', 'DESC')->with(['user', 'likes'])->paginate(20);

        return view('users.posts.index', [
            'user' => $user,
            'posts' => $posts
        ]);
    }
}
