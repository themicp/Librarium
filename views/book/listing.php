<?php
    if ( $initial ) {
?>
    <div id='list_home' >
        <h1>Choose a book</h1>
<?php
    }
?>
        <ul id='book_list' >
        <?php
            foreach ( $books as $book ) {
        ?>
            <li id='book_<?=$book[ 'id' ];?>' ><a href='book/<?=$book[ 'id' ];?>'><?=$book[ 'title' ];?></a></li>
        <?php
            }
        ?>
        </ul>
<?php
    if ( $initial ) {
?>
    </div>
<?php
    }
?>
