<?php

require('helpers.php');

$booksJson = file_get_contents('books.json');

$books = json_decode($booksJson, true);

#dump($books);
#dump($books['The Bell Jar']['author']);
