<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CustomClasses\Book;

class BookController extends Controller
{
    /* Return the index on first page land */
    public function index()
    {
        // Page variables
        $url = config('app.url');
        $githubUrl = config('app.githubUrl');
        $title = config('app.name');

        return view('books.show')->with([
            'url' => $url,
            'githubUrl' => $githubUrl,
            'title' => $title,
            'genre' => 'all',
            'pageLimit' => '0',
            'ebook' => false,
            'request' => false
        ]);
    }

    /* Process form request */
    public function fetchBook(Request $request)
    {
        // Page variables
        $url = config('app.url');
        $githubUrl = config('app.githubUrl');
        $title = config('app.name');

        // Extract form inputs
        $genre = $request->input('genre');
        $ebooks = $request->has('ebook');
        $pageLimit = $request->input('pageLimit');

        // JSON file path
        $datafile = database_path('/books.json');

        // Create new Book object and call method to process user input
        $book = new Book($datafile);
        $bookResults = $book->getByTitle($genre, $pageLimit, $ebooks);

        // Validate text input
        if ($pageLimit) {
            $this->validate($request, [
                'pageLimit' => 'required|numeric'
            ]);
        }

        return view('books.show')->with([
            'url' => $url,
            'githubUrl' => $githubUrl,
            'title' => $title,
            'request' => $request,
            'genre' => $genre,
            'ebook' => $ebooks,
            'pageLimit' => $pageLimit,
            'bookResults' => $bookResults
        ]);
    }

    public function show($title)
    {
        return view('books.show')->with(['title' => $title]);
    }
}