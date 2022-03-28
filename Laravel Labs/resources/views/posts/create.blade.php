@extends("layouts.app")


@section('content')

    <form method="POST" action="{{ route('posts.store') }}" class="w-50 m-auto" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="postTitle" class="form-label">Post Title</label>
            <input type="text" class="form-control " name="title" id="postTitle" placeholder="Post Title" value="{{ old('title') }}">
            @if ($errors->has('title'))
                <div class="" style="color:red">{{ $errors->first('title') }}</div>
            @endif
        </div>
        <div class="mb-3">
            <label for="postDescription" class="form-label">Post Description</label>
            <textarea class="form-control" name="desc" id="postDescription" rows="3">{{ old('desc') }}</textarea>
            @if ($errors->has('desc'))
                <div class="" style="color:red">{{ $errors->first('desc') }}</div>
            @endif
        </div>
        <select class="form-select my-3" aria-label="Default select example" name="user_id">
            @foreach ($users as $user )
                <option value="{{$user->id}}">{{$user->name}}</option>
            @endforeach
          </select>

        {{-- <input type="button" value="Submit" class="btn btn-outline-success"> --}}
        <button type="submit" class="col-12 btn btn-outline-success">Submit</button>
    </form>
@endsection("content")
