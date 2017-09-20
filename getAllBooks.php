<?php
require('helpers.php');
require('Book.php');

use Foobooks\Book;

$book = new Book('books.json');

# Logical defaults
$hasResults = true;
$caseSensitiveChecked = '';

# Retrieve data from the form
if (isset($_GET['keyword'])) {
    $keyword = $_GET['keyword'];
} else {
    $keyword = '';
}

if (isset($_GET['caseSensitive'])) {
    $caseSensitive = true;
} else {
    $caseSensitive = false;
}

# No filtering is necessary if no keyword is specificed
if ($keyword == '') {
    $books = $book->getAll();
    return $books;
}

$books = $book->getByTitle($keyword, $caseSensitive);


# Some display-specific helper code
if (count($books) == 0) {
    $hasResults = false;
}

if ($caseSensitive) {
    $caseSensitiveChecked = 'CHECKED';
}
