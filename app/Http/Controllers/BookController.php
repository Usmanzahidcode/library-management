<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::simplePaginate(10);
        return view('catalog', ['books' => $books]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('add_book');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'string',
            'rating' => 'required|integer|min:0|max:5',
            'author_name' => 'required|string|max:255',
            'pages' => 'required|integer|min:0',
            'language' => 'required|string|max:255',
            'ISBN' => 'required|string|max:255',
            'publish_date' => 'required|date',
            'genre' => 'required|string|max:255',
            'type' => 'required|string|max:255',
        ]);


        $name = time() . '_cover_' . $request->book_cover->getClientOriginalName();
        $request->file('book_cover')->storeAs('public/covers', $name);

        $book = new Book();

        $book->title = $request->input('title');
        $book->description = $request->input('description');
        $book->rating = $request->input('rating');
        $book->author_name = $request->input('author_name');
        $book->pages = $request->input('pages');
        $book->language = $request->input('language');
        $book->ISBN = $request->input('ISBN');
        $book->publish_date = $request->input('publish_date');
        $book->genre = $request->input('genre');
        $book->type = $request->input('type');

        $book->book_cover = $name;

        $book->save();

        return redirect(route('books.show', ['book' => $book->id]));

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $book = Book::find($id);

        // If a user manually tries to go to a book by passing id in url
        if (empty($book)) {
            return 'No book found';
        }

        return view('singular_book', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('edit-book', ['book' => Book::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'string',
            'rating' => 'required|integer|min:0|max:5',
            'author_name' => 'required|string|max:255',
            'pages' => 'required|integer|min:0',
            'language' => 'required|string|max:255',
            'ISBN' => 'required|string|max:255',
            'publish_date' => 'required|date',
            'genre' => 'required|string|max:255',
            'type' => 'required|string|max:255',
        ]);

//        return $request;



        $book = Book::find($id);
        $name =  $book->book_cover;

        if ($request->hasFile('book_cover')) {
            $name = time() . '_cover_' . $request->book_cover->getClientOriginalName();
            $request->file('book_cover')->storeAs('public/covers', $name);
        }


        $book->title = $request->input('title');
        $book->description = $request->input('description');
        $book->rating = $request->input('rating');
        $book->author_name = $request->input('author_name');
        $book->pages = $request->input('pages');
        $book->language = $request->input('language');
        $book->ISBN = $request->input('ISBN');
        $book->publish_date = $request->input('publish_date');
        $book->genre = $request->input('genre');
        $book->type = $request->input('type');
        $book->book_cover = $name;

        $book->save();

        return redirect(route('books.show', ['book' => $book->id]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return 'Lets just say that the book is deleted: ' . Book::find($id)->title;
    }
}
