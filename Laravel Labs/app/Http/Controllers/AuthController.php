<?php

namespace App\Http\Controllers;
use  App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function countPosts()
    {
     dd( Auth::user()->posts );
    }
}
