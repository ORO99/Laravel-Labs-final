<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use  App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Access\Gate;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::select("id", "title", "desc", "created_at")->paginate(3);
        // dd($books);
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        $users = User::select("id", "name")->get();
        return view('posts.create', compact('users'));
    }


    public function store(PostRequest $request)
    {
        // $request->validate([
        //     'title' => 'required|string|max:100',
        //     'desc' => 'required|string|max:100',
        // ]);
        // Post::create([
        //     'title' => $request->title,
        //     'desc' => $request->desc,
        //     'user_id' => $request->get('user_id'),
        // ]);
        // dd($request);
        Post::create($request->all());
        return redirect(route('posts.index'));
    }
    public function UpdateSlug()
    {
        $posts = Post::get();
        foreach ($posts as $post) {
            $post->update([
                'title' => $post->title,
                'user_id' => $post->user_id
            ]);
        }
        echo $post->slug;
    }


    public function show(Post $post)
    {
        // $post = Post::findOrFail($post);
        // dd($books);
        return view('posts.show', compact('post'));
    }


    public function edit(Post $post)
    {
        // $post = Post::findOrFail($post);
        if ($post->user_id == Auth::user()->id) {
            return view('posts.edit',  compact('post'));
        }
        return abort(403);
    }


    public function update(Request $request, Post $post)
    {
        // $request->validate([
        //     'title'=>'required|string|max:100',
        //     'desc'=>'required|string|max:100',
        // ]);

        // $post=  Post::findOrFail($post);
        // if (!Gate::allows('updateOrDelete-post', $post)) {
        //     abort(403);
        // }
        if ($request->user()->cannot('update', $post)) {
            abort(403);
        }
        $post->update($request->all());
        return redirect(route('posts.index'));
    }

    public function destroy(Request $request, Post $post)
    {
        // $post=  Post::findOrFail($post);
        // if (!Gate::allows('updateOrDelete-post', $post)) {
        //     abort(403);
        // }
        if ($request->user()->cannot('update', $post)) {
            abort(403);
        }
        $post->delete();
        return redirect(route('posts.index'));
    }
}
