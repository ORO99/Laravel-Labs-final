<?php

namespace App\Http\Requests;

use App\Rules\MaxPosts;
use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'title' => 'required|string|min:3|unique:posts,title',
            'desc' => 'required|string|min:10',
            'user_id' => [new MaxPosts]
        ];
    }
    public function messages()
    {

        return [
            'title.required' => 'The Title Field is Required',
        ];
    }
}
