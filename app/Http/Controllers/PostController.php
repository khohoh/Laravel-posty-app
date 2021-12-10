<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{
    public function __construct()
    {
        // $this->middleware(['auth'])->only(['create', 'store', 'edit', 'update', 'destroy']);
        $this->middleware(['auth'])->except('index');
    }

    public function index()
    {
        // $posts = Post::orderBy('created_at', 'desc')->with(['user', 'likes'])->paginate(20); orderBy 와 아래가 같은 코드
        $posts = Post::latest()->with(['user', 'likes'])->paginate(20);

        return view('posts.index', ['posts' => $posts]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'image' => 'image|nullable',
        ]);
        // dd(request('title'));
        // dd($request->title);
        // dd($request->image->store('uploads', 'public'));

        // $request->user()->posts()->create([
        //     'body' => $request->body,
        // ]);  밑에 코드와 같은 코드

        // $request->user()->posts()->create($request->only('body'));

        if ($request->hasFile('image')) {
            $imagePath = request('image')->store('uploads', 'public');
            // dd($imagePath);
            $image = Image::make(public_path("storage/{$imagePath}"));
            $image->save();
        }
    
        $post = new Post();
        $post->title = $request->title;
        $post->body = $request->body;
        $post->user_id = auth()->user()->id;
        if ($request->hasFile('image')) {
            $post->image = $imagePath;
        }
        $post->save();

        return redirect('/posts')->with('success', 'Your post has been posted successfully');
    }

    public function show(Post $post)
    {
        return view('posts.show', ['post' => $post]);
    }

    public function edit(Post $post)
    {
        return view('posts.edit', ['post' => $post]);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'image' => 'image|nullable', 
        ]);

        if ($request->hasFile('image')) {
            $imagePath = request('image')->store('uploads', 'public');
            // dd($imagePath);
            $image = Image::make(public_path("storage/{$imagePath}"));
            $image->save();
        }

        $post = Post::find($request->id);
        $post->title = $request->title;
        $post->body = $request->body;
        if ($request->hasFile('image')) {
            $post->image = $imagePath;
        };
        $post->save();

        return redirect('/posts')->with('success', 'Your post has been updated successfully');
    }

    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);
        
        $post->delete();

        return redirect('/posts')->with('success', 'Your post has been deleted successfully.');
    }
}
