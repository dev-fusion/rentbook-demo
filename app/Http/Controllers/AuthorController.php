<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::with('books')->get()->toArray();

        return $authors;
    }

    public function store(Request $request)
    {
        $author = new Author([
            'name' => $request->input('name'),
            'surname' => $request->input('surname'),
        ]);
        $author->save();

        return response()->json('Author created!');
    }

    public function show($id)
    {
        $author = Author::find($id);

        return response()->json($author);
    }

    public function update($id, Request $request)
    {
        $author = Author::find($id);
        $author->update($request->all());

        return response()->json('Author updated!');
    }

    public function destroy($id)
    {
        $author = Author::find($id);
        $books = $author->books();
        $author->delete();
        $books->delete();

        return response()->json('Author deleted!');
    }
}
