<?php

require('helpers.php');

$booksJson = file_get_contents('books.json');

$books = json_decode($booksJson, true);

if (isset($_GET['keyword'])) {
    $keyword = $_GET['keyword'];
} else {
    $keyword = '';
}

$hasResults = true;

if ($keyword == '') {
    return $books;
}


foreach ($books as $title => $book) {
    if ($title != $keyword) {
        unset($books[$title]);
    }
}

if (count($books) == 0) {
    $hasResults = false;
}


#dump($books);
#dump($books['The Bell Jar']['author']);
