<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    use AuthorizesRequests;
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $images=[];
        if($request->hasFile('images')){
            foreach($request->file('images') as $image)
            {
                $imageName = $image->getClientOriginalName() . "-" . time() . $image->getClientOriginalExtension();
                $image->move(public_path("/images/posts"), $imageName);
                $images[]=$imageName;
            }
            /* dd($images); */
        }
        Post::create([
            "title" => $request->title,
            "description" => $request->description,
            "images" => json_encode($images),
        ]);
        return redirect()->route("posts.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $existingImages = $request->input('existing_images', []);
        $newImages = [];
        if($request->hasFile('images')){
            foreach($request->file('images') as $image) { 
                $imageName = $image->getClientOriginalName() . "-" . time() . "." . $image->getClientOriginalExtension();
                $image->move(public_path("/images/posts"), $imageName);
                $newImages[] = $imageName;
                } 
                } 
        $allImages = array_merge($existingImages, $newImages);
        $post->update([ 
            "title" => $request->title, 
            "description" => $request->description,
            "images" => json_encode($allImages), 
        ]);
        return redirect()->route("posts.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $this->authorize("manegePost", User::class);
        $post->delete();
        return redirect()->route('posts.index');
    }
}
