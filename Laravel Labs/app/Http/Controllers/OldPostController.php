<!-- <?php

namespace App\Http\Controllers;
use  App\Models\Post;
use  App\Models\User;

use Illuminate\Http\Request;

class PostController extends Controller
{
    // public function index(){
    //     $posts = Post::select("id", "title", "desc", "created_at")->paginate(3);
    //     // dd($books);
    //     return view('posts.index', compact('posts'));
    // }

    // public function show($id){
    //     $post = Post::find($id);
    //     // dd($books);
    //     return view('posts.show', compact('post'));
    // }
    // public function create(){
    //     $users = User::select("id", "name")->get();
    //     return view('posts.create', compact('users'));
    // }


    // public function store(Request $request){
    //     $request->validate([
    //         'title'=>'required|string|max:100',
    //         'desc'=>'required|string|max:100',
    //     ]);
    //     Post::create([
    //         'title'=>$request->title,
    //         'desc'=>$request->desc,
    //         'user_id'=>$request->get('user'),
    //     ]);
    //     return redirect(route('posts.index') );
    // }


    // public function edit($id){
    //     $post = Post::findOrFail($id);
    //     // dd($books);
    //     return view('posts.edit', compact('post'));
    // }


    // public function update(Request $request, $id){
    //     $request->validate([
    //         'title'=>'required|string|max:100',
    //         'desc'=>'required|string|max:100',
    //     ]);

    //     $post=  Post::findOrFail($id);

    //     $post->update([
    //         'title'=>$request->title,
    //         'desc'=>$request->desc,
    //     ]);
    //     return redirect(route('posts.index') );
    // }


    // public function delete($id){

    //     $post=  Post::findOrFail($id);

    //     $post->delete();
    //     return redirect(route('posts.index') );
    // }

}

