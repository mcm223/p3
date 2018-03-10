<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        return 'This will show the index page of my site.';
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
