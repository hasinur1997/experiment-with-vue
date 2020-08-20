@extends('books.bookLayouts')

@section('books')
    @if(session('message'))
        <div class="notification is-primary is-light">
            {{ session('message') }}
        </div>

    @endif
    <form action="/mail" method="POST">
        @csrf
        <div class="field has-addons">
            <div class="control">
                <input class="input" name="email" type="text" placeholder="Eneter your email">
            </div>
            <div class="control">
                <input type="submit" value="Send" class="button is-info">
            </div>
        </div>
        @error('email')
            <p class="help is-danger">{{ $message }}</p>
        @enderror

    </form>

@endsection
