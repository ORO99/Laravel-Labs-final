<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiPostController;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//! API Requests
//* Posts Read
Route::get('/posts', [ApiPostController::class, 'index'])->middleware('auth:sanctum');
Route::get('/posts/show/{id}', [ApiPostController::class, 'show'])->middleware('auth:sanctum');
//* posts Create
// Route::get('/posts/create', [ApiPostController::class, 'create'])->name('posts.create');
Route::post('/posts/store', [ApiPostController::class, 'store'])->middleware('auth:sanctum');
//* posts Update
// Route::get('/posts/edit/{id}', [ApiPostController::class, 'edit'])->name('posts.edit');
Route::post('/posts/update/{id}', [ApiPostController::class, 'update'])->middleware('auth:sanctum');
//* posts Delete
Route::post('/posts/delete/{id}', [ApiPostController::class, 'delete'])->middleware('auth:sanctum');




//! API Sanctum Authentication
//* Issuing Token to Registered or Logged in Client
//? Like Register and Login Function in API Authentication Manually

Route::post('/sanctum/token', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
        'device_name' => 'required',
    ]);

    $user = User::where('email', $request->email)->first();

    if (! $user || ! Hash::check($request->password, $user->password)) {
        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.'],
        ]);
    }

    return $user->createToken($request->device_name)->plainTextToken;
});

