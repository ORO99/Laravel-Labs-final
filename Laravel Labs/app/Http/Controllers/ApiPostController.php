<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class ApiPostController extends Controller
{
    public function index()
    {
        $posts = Post::get();
        // dd($books);
        // return response()->json($posts);
        return PostResource::collection($posts);
    }

    public function show($id)
    {
        $post = Post::find($id);
        // dd($books);
        return new PostResource($post );
    }
    // public function create()
    // {
    //     $users = User::select("id", "name")->get();
    //     return view('posts.create', compact('users'));
    // }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:100',
            'desc' => 'required|string|max:100',
        ]);
        Post::create([
            'title' => $request->title,
            'desc' => $request->desc,
            'user_id' => $request->get('user_id'),
        ]);
        $success = "Book Created Successfully";
        return response()->json($success);
    }



    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:100',
            'desc' => 'required|string|max:100',
        ]);

        $post =  Post::findOrFail($id);

        $post->update([
            'title' => $request->title,
            'desc' => $request->desc,
        ]);
        $success = "Book Updated Successfully";
        return response()->json($success);
    }


    public function delete($id)
    {

        $post =  Post::findOrFail($id);

        $post->delete();
        $success = "Book Deleted Successfully";
        return response()->json($success);
    }
}
