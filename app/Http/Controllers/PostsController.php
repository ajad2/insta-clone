<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;

use App\Post;

use App\User;

class PostsController extends Controller
{
 
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        return view('posts.create');
    }


    public function store(Request $request)
    {
       $data = $request->validate([
            'caption'=>'required',
            'image'=>'required|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $imagePath = request('image')->store('uploads','public');

        auth()->user()->posts()->create([
            'caption' => $data['caption'],
            'image' => $imagePath,
        ]);
        
        return redirect('/profile/'. auth()->user()->id);
    }

    public function show(\App\Posts $post)
    {
        return view('posts.show', compact('post'));
    }
}
