<?php
require('Form.php');
require('helpers.php');
require('Book.php');

use DWA\Form;
use Foobooks\Book;

$form = new Form($_GET);
$book = new Book('books.json');

if ($form->isSubmitted()) {
    # Retrieve data from form
    $keyword = $form->get('keyword', '');
    $caseSensitive = $form->isChosen('caseSensitive');

    # Validate
    $errors = $form->validate([
        'keyword' => 'required'
    ]);

    # If there were no validation errors, proceed...
    if (empty($errors)) {
        
        $books = $book->getByTitle($keyword, $caseSensitive);

        if ((count($books) == 0)) {
            $haveResults = false;
        } else {
            $haveResults = true;
        }
    }
}
