<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRequest;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(5);
        return view('posts', ['posts' => $posts]);
    }

    public function show($id)
    {
        $post = Post::find($id);
        return view('view', ['post' => $post]);
    }

    public function create()
    {
        return view('create');
    }

    public function edit($id)
    {
        $post = Post::find($id);
        return view('edit', ['post' => $post]);
    }

    public function store(StoreRequest $request)
    {
        $data = $request->all();

        Post::create([
            "title" => $data['title'],
            "content" => $data['content'],
            'user_id' => auth()->id(),
        ]);

        return redirect('/posts');
    }

    public function update(StoreRequest $request, $id)
    {
        $data = $request->all();
        $post = Post::find($id);

        $post->title = $data['title'];
        $post->content = $data['content'];
        $post->user_id = auth()->id();

        $post->save();

        return redirect('/posts');
    }

    public function destroy($id)
    {
        Post::destroy($id);

        return redirect('/posts');
    }
}
