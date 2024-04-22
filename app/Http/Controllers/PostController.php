<?php

// app/Http/Controllers/Writer/PostController.php

namespace App\Http\Controllers\Writer;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = auth()->user()->posts()->latest()->get();
        return view('writer.posts.index', compact('posts'));
    }

    public function create()
    {
        return view('writer.posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'caption' => 'required',
        ]);

        auth()->user()->posts()->create($request->only('title', 'caption'));

        return redirect()->route('writer.posts.index')->with('success', 'Post created successfully.');
    }
}
