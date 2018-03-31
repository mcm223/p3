<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CustomClasses\Book;

class BookController extends Controller
{
    /* Return the index on first page land */
    public function index()
    {
        return view('books.show')->with([
            'url' => $url = config('app.url'),
            'githubUrl' => config('app.githubUrl'),
            'title' => config('app.name'),
            'genre' => 'all',
            'pageLimit' => '0',
            'ebook' => false,
            'request' => false,
            'bookResult' => true,
            'haveResults' => false
        ]);
    }

    /* Process form request */
    public function fetchBook(Request $request)
    {
        // Extract form inputs
        $genre = $request->input('genre');
        $ebooks = $request->has('ebook');

        // Validate user input and extract the validated value
        $pageLimit = $request->validate([
            'pageLimit' => 'required|numeric'
        ])['pageLimit'];

        // JSON file path
        $datafile = database_path('/books.json');

        // Create new Book object and process user input
        $book = new Book($datafile);
        $bookResult = $book->getRandomEntry($book->getByTitle($genre, $pageLimit, $ebooks));

        return view('books.show')->with([
            'url' => $url = config('app.url'),
            'githubUrl' => config('app.githubUrl'),
            'title' => config('app.name'),
            'request' => $request,
            'genre' => $genre,
            'ebook' => $ebooks,
            'pageLimit' => $pageLimit,
            'bookResult' => $bookResult,
            'haveResults' => $book->haveResults
        ]);
    }
}