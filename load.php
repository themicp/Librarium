<?php
    include 'db.php';

    $word = $_POST[ 'word' ];

    $query = mysql_query( "
        SELECT
            *
        FROM
            comments
        WHERE
            comment_word = '$word'
        " );


    $final = "";
    
    while( $results = mysql_fetch_array( $query ) ) {
        $final .= $results[ 'comment_text' ] . ", ";
    }

    $final = substr( $final, 0, -2 );

    if ( $final == "" ) {
        echo "EMPTY";
        return true;
    }

    echo $final;
?>
