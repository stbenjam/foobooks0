<?php require('getAllBooks.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>

    <title>Foobooks v0</title>
    <meta charset='utf-8'>

    <link href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' rel='stylesheet'>
    <link href='/css/styles.css' rel='stylesheet'>

</head>
<body>

    <h1><a href='/'>Foobooks v0</a></h1>

    <form method='GET'>

        <div class='form-group'>
            <label for='keyword'>Filter by keyword:</label>
            <input type='text' name='keyword' id='keyword' value='<?=sanitize($keyword)?>'>
        </div>

        <div class='form-group'>
            <input type='checkbox' name='caseSensitive' id='caseSensitive' <?=$caseSensitiveChecked?>>
            <label for='caseSensitive'>Case sensitive</label>
        </div>

        <div class='form-group'>
            <input type='submit' class='btn btn-primary btn-small' value='Filter books'>
        </div>

    </form>

    <?php if (!$hasResults) : ?>
        <div class='alert alert-warning'>Your keyword did not match any books.</div>
    <?php elseif ($keyword != '') : ?>
        <div class='alert alert-info'>You searched for: <strong><?=sanitize($keyword)?></strong></div>
    <?php endif; ?>

    <?php foreach ($books as $title => $book) : ?>
        <div class='book'>
            <h2><?=$title?></h2>
            <ul>
                <li>Author: <?=$book['author']?></li>
                <li>Published year: <?=$book['published']?></li>
            </ul>
            <img src='<?=$book['cover']?>' alt='Book cover for <?=$title?>'>
        </div>
    <?php endforeach; ?>

</body>
</html>
