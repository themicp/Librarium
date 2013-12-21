<?php
    require_once( "db.php" );
    class Comment {
        public static function save( $word, $text ) {
            db( "INSERT INTO
                    comments
                SET
                    word = :word,
                    text = :text
                ON DUPLICATE KEY UPDATE
                    text = :text", compact( 'word', 'text' ) );
        }

        public static function item( $word ) {
            return db_select( "comments", compact( "word" ) );
        }
    }
?>
