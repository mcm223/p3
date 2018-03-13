<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $url = 'http://p3.mcm223.me';
        $githubUrl = 'https://github.com/mcm223/p3';
        $title = 'Blind Date with a Book';
        return view('books.show')->with(['url' => $url, 'githubUrl' => $githubUrl, 'title' => $title]);
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