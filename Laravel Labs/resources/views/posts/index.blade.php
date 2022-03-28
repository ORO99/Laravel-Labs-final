@extends("layouts.app")


@section('content')
    <a class="btn btn-primary btn-lg m-2" href="{{ route('posts.create') }}">Create Post</a>
    <table class="table table-dark table-hover table-striped w-100  text-center">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">View</th>
                <th scope="col">Update</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <td class="align-middle">{{ $post->id }}</td>
                    <td class="align-middle">{{ $post->title }}</td>
                    <td class="align-middle">{{ $post->desc }}</td>
                    <td class="align-middle"><a href="{{ route('posts.show', $post->id) }}"
                            class="btn btn-primary">View</a></td>
                    <td class="align-middle"><a href="{{ route('posts.edit', $post->id) }}"
                            class="btn btn-warning">Update</a></td>
                    {{-- <td class="align-middle"><a href="{{ route('posts.delete', $post->id) }}"
                            class="btn btn-danger">Delete</a></td> --}}
                    <td>

                        <form method="POST" action="{{ route('posts.destroy', $post->id) }}">
                            @csrf
                            @method('delete')
                            <input name="_method" type="hidden" value="DELETE">
                            <button type="submit" class="btn btn-danger btn-flat show_confirm" data-toggle="tooltip"
                                title='Delete'>Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
    <div class="footer alert alert-light position-fixed pagination-lg" style="bottom: 0px; left:39%">
        {{ $posts->onEachSide(5)->links() }}
    </div>
    {{-- <nav aria-label="Page navigation example">
        <ul class="pagination">

            <li class="page-item"><a class="page-link" href="#">{{ $posts->->links() }}</a></li>
            {{-- <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">Next</a></li>
        </ul> --}}
    </nav>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script type="text/javascript">

        $('.show_confirm').click(function(event) {
             var form =  $(this).closest("form");
             var name = $(this).data("name");
             event.preventDefault();
             swal({
                 title: `Are you sure you want to delete this record?`,
                 text: "If you delete this, it will be gone forever.",
                 icon: "warning",
                 buttons: true,
                 dangerMode: true,
             })
             .then((willDelete) => {
               if (willDelete) {
                 form.submit();
               }
             });
         });

   </script>
@endsection("content")
