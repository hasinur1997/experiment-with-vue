@extends('books.bookLayouts')

@section('books')
    <div class="card">
        <div class="card-header">
            <p class="card-header-title">
                Create Book
            </p>
        </div>
        <div class="card-content">

            <div class="content">
                <form action="/books" method="POST">
                    @csrf
                    <div class="field">
                        <label class="label">Title</label>
                        <div class="control">
                            <input class="input" type="text" placeholder="Enter book title" name="title" value="{{ old('title') }}">
                        </div>
                        @if($errors->has('title'))
                            <p class="help is-danger">{{ $errors->first('title') }}</p>
                        @endif
                    </div>

                    <div class="field">
                        <label class="label">Author</label>
                        <div class="control">
                            <input class="input" type="text" placeholder="Enter book author" name="author" value="{{ old('author') }}">
                        </div>
                        @if($errors->has('author'))
                            <p class="help is-danger">{{ $errors->first('author') }}</p>
                        @endif
                    </div>

                    <div class="field">
                        <label class="label">Description</label>
                        <div class="control">
                            <textarea class="textarea" placeholder="Enter book description" name="description">{{ old('description')}}</textarea>
                        </div>
                    </div>

                    <div class="field is-grouped">
                        <div class="control">
                            <button class="button is-link">Submit</button>
                        </div>
                        <div class="control">
                            <button class="button is-link is-light">Cancel</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
