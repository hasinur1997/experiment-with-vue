@extends('books.bookLayouts')

@section('books')
    <h2>{{ $book->title }}</h2> <a href="/books/{{$book->id}}/edit" style="display:inline">Eidt</a>
    <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
        <tbody>
            <tr>
                <th>Title</th>
                <td>{{$book->title}}</td>
            </tr>
            <tr>
                <th>Author</th>
                <td>{{$book->author}}</td>
            </tr>
            <tr>
                <th>Description</th>
                <td>{{$book->description}}</td>
            </tr>
            <tr>
                <th>Created Date</th>
                <td>{{$book->created_at}}</td>
            </tr>
        </tbody>
    </table>
    <a href="/books">Back to list</a>
@endsection
