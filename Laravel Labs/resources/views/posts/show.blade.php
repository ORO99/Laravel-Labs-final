@extends("layouts.app")



@section('content')
    <div class="card w-50 m-auto text-center">
        <div class="card-body">
            <h2 class="card-title text-xl">{{ $post->title }}</h2>
            <p class="card-text">{{ $post->desc }}</p>
            <div class="input-group has-validation my-3 w-50 m-auto">
                <span class="input-group-text" id="inputGroupPrepend">Created At</span>
                <input type="text" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" value="{{ $post->created_at}}">
              </div>
            <a href="{{ route('posts.index') }}" class="btn btn-primary btn-lg">Back</a>
        </div>
    </div>
@endsection("content")
