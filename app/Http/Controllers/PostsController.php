<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Intervention\Image\Facades\Image;
use App\Models\Post;

class PostsController extends Controller
{
    public function __constructor()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = auth()->user()->following()->pluck('profiles.user_id');

        $posts = Post::whereIn('user_id', $users)->with('user')->latest()->paginate(5);

        return view ('posts.index', compact('posts'));
    }

    public function create ()
    {
       return view('posts.create');
    }

    public function store()
    {
        // Here we are just validating the image and the caption
        $data = request()->validate([
            'caption' => 'required',
            'image' => ['required', 'image']
        ]);

        // storing of the images
        $imagePath = request('image')->store('uploads', 'public');

        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);

        $image->save();

        // Getting the authenticated User (easy pessy)
        auth()->user()->posts()->create([
            'caption' =>$data['caption'],
            'image' => $imagePath,
        ]);

        // Here we are just dumping everything that we are doing in our system 
        return redirect('/profile/ ' . auth()->user()->id);
    }

    public function show( \App\Models\Post $post)
    {
        return view('posts.show', compact('post'));
    }
}
