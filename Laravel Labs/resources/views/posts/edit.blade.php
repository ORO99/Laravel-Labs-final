@extends("layouts.app");


@section('content')
    <form method="POST" action="{{ route('posts.update', $post->id) }}" class="w-50 m-auto" enctype="multipart/form-data">
        @csrf
        @method("put")
        <div class="mb-3">
            <label for="postTitle" class="form-label">Post Title</label>
            <input type="text" class="form-control" name="title" id="postTitle" placeholder="Post Title"
                value="{{ old('title') ?? $post->title }}">
            @if ($errors->has('title'))
                <div class="" style="color:red">{{ $errors->first('title') }}</div>
            @endif
        </div>
        <div class="mb-3">
            <label for="postTitle" class="form-label">Post Description</label>
            <textarea class="form-control" name="desc" id="postTitle"
                rows="3">{{ old('desc') ?? $post->desc }}</textarea>
            @if ($errors->has('desc'))
                <div class="" style="color:red">{{ $errors->first('desc') }}</div>
            @endif
        </div>
        <button type="submit" class="col-12 btn btn-outline-success">Update</button>
    </form>
@endsection("content")
