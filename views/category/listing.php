<?php
    echo '[';
    $i = 0;
    foreach ( $categories as $cat ) { 
        if ( $i ) {
            echo ",";
        }
        echo '{ "title": "' . $cat[ 'title' ] . '", "dictionary": "' . $cat[ 'dictionary' ] . '", "id": "' . $cat[ 'id' ] . '" }';
        ++$i;
    }
    echo ']';
?>
