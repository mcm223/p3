<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request)
    {
        // Page variables
        $url = 'http://p3.mcm223.me';
        $githubUrl = 'https://github.com/mcm223/p3';
        $title = 'Blind Date with a Book';

        // Extract form inputs
        $genre = $request->input('genre');
        $ebooks = $request->has('ebook');
        $pageLimit = $request->input('pageLimit');


        // Validate text input
        if ($pageLimit) {
            $this->validate($request, [
                'pageLimit' => 'required|alpha_num'
            ]);
        }


        return view('books.show')->with([
            'url' => $url,
            'githubUrl' => $githubUrl,
            'title' => $title,
            'request' => $request,
            'genre' => $genre,
            'ebook' => $ebooks,
            'pageLimit' => $pageLimit]);
    }

    public function fetchBook()
    {
        return 'This will trigger an action to return a book';
    }

    public function show($title)
    {
        return view('books.show')->with(['title' => $title]);
    }
}