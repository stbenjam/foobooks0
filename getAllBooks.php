<?php
require('helpers.php');

# Get our data and convert it to a JSON object
$booksJson = file_get_contents('books.json');
$books = json_decode($booksJson, true);

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
    return $books;
}

# Book filtering
foreach ($books as $title => $book) {
    if ($caseSensitive) {
        $match = $title == $keyword;
    } else {
        $match = strtolower($title) == strtolower($keyword);
    }

    if (!$match) {
        unset($books[$title]);
    }
}

# Some display-specific helper code
if (count($books) == 0) {
    $hasResults = false;
}

if ($caseSensitive) {
    $caseSensitiveChecked = 'CHECKED';
}
