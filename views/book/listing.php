<?php
    if ( $initial ) {
?>
    <div id='list_home' >
        <h1>Επέλεξε ένα κείμενο</h1>
<?php
    }
    foreach ( $categories as $cat ) {
        if ( $initial ) {
            echo "<h2>" . $cat[ 'title' ] . "</h2>";
        }
?>
        <ul class='book_list' >
        <?php
            foreach ( $books as $book ) {
                if ( $book[ 'category' ] != $cat[ 'id' ] ) {
                    continue;
                }
                $book[ 'text' ] = htmlspecialchars( $book[ 'text' ] );
                $book[ 'title' ] = htmlspecialchars( $book[ 'title' ] );
        ?>
            <li id='book_<?=$book[ 'id' ];?>' ><a href='book/<?=$book[ 'id' ];?>'><?=$book[ 'title' ];?></a></li>
        <?php
            }
        ?>
        </ul>
<?php
    }
    if ( $initial ) {
?>
    </div>
<?php
    }
?>
