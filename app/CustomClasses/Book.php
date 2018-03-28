<?php

namespace App\CustomClasses;

class Book
{

    // Changed this to protected so it's available to ProcessBook extension
    public $books;
    public $haveResults = false;
    public $output = [];

    // Constructor that takes the JSON file
    public function __construct($dataFile)
    {
        $booksJson = file_get_contents($dataFile);
        $this->books = json_decode($booksJson, true);
    }

    // Return all entries in JSON file
    public function getAll()
    {
        return $this->books;
    }

    // Return a list of books that match the search criteria
    public function getByTitle($genre, $pageLimit = 0, $ebook = false)
    {
        $results = [];

        foreach ($this->books as $bookTitle => $book) {

            # Does the genre match?
            if ($genre == 'all') {
                $match = true;
            } else {
                $match = $genre == $book['genre'];
            }

            # Does the book's length exceed the specified page limit
            if ($match && $pageLimit > 0) {
                $match = $book['length'] <= $pageLimit;
            }

            # Does the book need to have an ebook available?
            if ($match && $ebook) {
                $match = $ebook == $book['hasEbook'];
            }

            # If all of the above are true, then return the book as an option
            if ($match) {
                $results[$bookTitle] = $book;
            }
        }
        return $results;
    }

    public function getRandomEntry($arr)
    {
        if (count($arr) > 0) {
            $this->haveResults = true;
            $choice = array_rand($arr);
            $output = [$choice];
            array_push($output, $this->books[$choice]);
            //$output = $this->books[$choice];
        } else {
            $output = [];
            $this->haveResults = false;
        }
        return $output;
    }
}