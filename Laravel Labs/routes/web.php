<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

// Posts Read
// Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
// Route::get('/posts/show/{id}', [PostController::class, 'show'])->name('posts.show');
// // posts Create
// Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
// Route::post('/posts/store', [PostController::class, 'store'])->name('posts.store');
// // posts Update
// Route::get('/posts/edit/{id}', [PostController::class, 'edit'])->name('posts.edit');
// Route::post('/posts/update/{id}', [PostController::class, 'update'])->name('posts.update');
// // posts Delete
// Route::get('/posts/delete/{id}', [PostController::class, 'delete'])->name('posts.delete');
// Route::resource('posts', PostController::class);

Auth::routes();


Route::resource("posts", PostController::class)->middleware('auth');











//! Slug Package
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/postsUpdate', [PostController::class, 'UpdateSlug']);
//! Social Media Authentication
Route::get('/auth/redirect', function () {
    return Socialite::driver('github')->redirect();
});
Route::get('/auth/callback', function () {
    $githubUser = Socialite::driver('github')->user();
    $user = User::where('email', $githubUser->email)->first();
    if ($user != null) {
        $user->update([
            'remember_token' => $githubUser->token,
        ]);
    } else {
        $user = User::create([
            'name' => $githubUser->name,
            'email' => $githubUser->email,
            'password' => Hash::make('123456789'),
            'remember_token' => $githubUser->token,
        ]);
    }
    Auth::login($user);
    return redirect('/posts');
});


// Test
Route::get('/test', [AuthController::class, 'countPosts']);
