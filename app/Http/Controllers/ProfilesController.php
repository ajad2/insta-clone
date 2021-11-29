<?php

namespace App\Http\Controllers;
use App\User;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProfilesController extends Controller
{
    public function index(\App\User $user)
    {
       
        // dd($data);
        return view('profiles.index', compact('user'));
    }

    public function edit(\App\User $user)
    {
        $this->authorize('update',$user->profile);

        return view('profiles.edit', compact('user'));
    }

    public function update(\App\User $user)
    {
        $this->authorize('update',$user->profile);

        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'url' => 'url',
            'image' => '',

        ]);

    
        auth()->user()->profile->update($data);

       /* if (request('image')){
            $imagePath = request('image')->store('storage','public');

            // dd($imagePath);

            $user = auth()->user()->profile();

            // dd($user);
            
            $user->image = $imagepath;
        //     ->update(
        //     ['image' => $imagepath]
        //    );
        }*/
        // dd($data);
        

        return redirect("/profile/{$user->id}");
    }
}
