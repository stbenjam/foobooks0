<?php

namespace Foobooks;

class Book
{

    # Properties
    private $books;

    # Methods
    public function __construct($jsonPath)
    {

        # Get our data and convert it to a JSON object
        $booksJson = file_get_contents($jsonPath);
        $this->books = json_decode($booksJson, true);
    }


    public function getAll()
    {
        return $this->books;
    }


    public function getByTitle($keyword, $caseSensitive = false)
    {

        $filteredBooks = [];

        foreach ($this->books as $title => $book) {
            if ($caseSensitive) {
                $match = $title == $keyword;
            } else {
                $match = strtolower($title) == strtolower($keyword);
            }

            if ($match) {
                $filteredBooks[$title] = $book;
            }
        }

        return $filteredBooks;
    }
}
