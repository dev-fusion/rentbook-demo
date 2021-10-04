<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::with('author')->get()->toArray();

        return $books;
    }

    public function store(Request $request)
    {
        $book = new Book([
            'title' => $request->input('title'),
            'author_id' => $request->input('author_id'),
            'is_borrowed' => $request->input('is_borrowed') == true,
        ]);
        $book->save();

        return response()->json('Book created!');
    }

    public function show($id)
    {
        $book = Book::find($id);

        return response()->json($book);
    }

    public function update($id, Request $request)
    {
        $book = Book::find($id);
        $book->update($request->all());

        return response()->json('Book updated!');
    }

    public function destroy($id)
    {
        $book = Book::find($id);
        $book->delete();

        return response()->json('Book deleted!');
    }
}
