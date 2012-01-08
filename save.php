<?php
    include 'db.php';

    $word = mysql_escape_string( $_POST[ 'word' ] );
    $text = mysql_escape_string( $_POST[ 'text' ] );

    $query = mysql_query( "
        INSERT INTO
            comments
        SET
            comment_word = '$word',
            comment_text = '$text'
        " );

    echo $query;
?>
