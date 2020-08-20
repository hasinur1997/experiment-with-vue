<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    public function create()
    {
        return view('books.create');
    }

    public function store()
    {
        request()->validate([
            'title' => 'required',
            'author'    =>  'required'
        ]);

        Book::create([
            'title' =>  request('title'),
            'author'    =>  request('author'),
            'description'   =>  request('description')
        ]);

        return redirect('/books');
    }

    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    public function update(Book $book)
    {
        $validateAttribute = request()->validate([
            'title' => 'required',
            'author'    =>  'required'
        ]);
        
        $book->update([
            'title' =>  request('title'),
            'author'    =>  request('author'),
            'description'   =>  request('description')
        ]);

        return redirect('/books');
    }

    public function destroy(Book $book)
    {
        $book->delete();

        return redirect('/books');
    }
}
