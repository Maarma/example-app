<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('books.index', [
            'books' => Book::paginate(25)
        ]);
        //return Author::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book): View
    {
        //$book = Book::with('authors')->where('id', $book->id)->first();
        return view('books.show', [
            'book' => $book,
            'authors' => $book -> authors
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book): View
    {
        return view('books.edit', [
            'book' => $book,
            'authors' => Author::orderBy('first_name')->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'release_date' => 'required|integer|between:1901,2155',
            //'cover_path' => 'required|string|max:255',
            'language' => 'required|string|max:255',
            'summary' => 'required|string|max:255',
            'price' => ['required', 'regex:/^\d+(,\d$|,\d{2})?$/i'],
            //'stock_saldo' => 'required|integer',
            'pages' => 'required|integer:11',
            'type' => 'required|string|max:255',
        ],
    [
        'release_date.required' => 'This release year field is required.',
        'release_date.between' => 'This release year field must be between 1901 and 2155.',
    ]);
        $book->update($validated);

        return redirect(route('books.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect('/books');
    }

    public function detachAuthor(Request $request, Book $book): RedirectResponse
    {
        $book->authors()->detach($request->author_id);
        return redirect()->back();
    }

    public function attachAuthor(Request $request, Book $book): RedirectResponse
    {
        $book->authors()->attach($request->author_id);
        return redirect()->back();
    }

}
