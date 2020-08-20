@extends('books.bookLayouts')

@section('books')
    <h2>Book Lists</h2>
    <a href="/books/create">Add New</a>
    <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
        <thead>
            <tr>
                <th>Title</th>
                <th>Author</th>
                <th>Created At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($books as $book)
                <tr>
                    <td><a href="/books/{{$book->id}}">{{ $book->title }}</a></td>
                    <td>{{ $book->author }}</td>
                    <td>{{ $book->created_at }}</td>
                    <td><a href="/books/{{ $book->id}}/edit">Edit</a> |
                            <form action="/books/{{$book->id}}" method="POST" id="myform" style="display: inline">
                                @csrf
                                @method('DELETE')
                                <a href="" onclick="deleteItem()">Delete</a>
                            </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <script>
        function deleteItem() {
            if (confirm('Are sure wnat to delete this book ?')) {
                document.getElementById('myform').submit();
            }
        }
    </script>
@endsection
