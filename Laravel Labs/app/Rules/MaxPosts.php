<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\User;

class MaxPosts implements Rule
{

    public function __construct()
    {
        //
    }
    public function passes($attribute, $value)
    {
        $user = User::select("*")
                ->where("id", "=", $value)
                ->first();
        return count($user->posts) < 3;
    }
    public function message()
    {
        dd ( 'This User has reached Maximum Number of Posts') ;
    }
}
