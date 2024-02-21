<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function dashboard() {
        $posts = Post::all();

        return view('dashboard')
            ->with(['posts' => $posts]);
    }

    public function show_user(Post $post) {
        $id = $post->user_id;
        $user_post = Post::where('user_id', $id)->get();

        return view('post.show_user', ['user_post' => $user_post]);
    }

    public function create() {
        return view('post.create');
    }

    public function store(Request $request) {
        $user_id = auth()->id();

        $store = new Post();
        $store->title = $request->title;
        $store->content = $request->content;
        $store->user_id = $user_id;
        $store->save();

        return redirect()
            ->route('dashboard');
    }
}
