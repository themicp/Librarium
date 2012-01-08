<?php
    class Book {
        public static function create( $title, $text ) {
            return db( "INSERT INTO
                    books
                SET
                    title = :title,
                    text = :text
                    ", compact( 'title', 'text' ) );
        }
        public static function item( $id ) {
            return db_select( "books", compact( "id" ) );
        }
        public static function listing() {
            $res = db( "
                SELECT
                    *
                FROM
                    books
                ");
            return db_fetch( $res );
        }
        public static function update( $title, $text, $id ) {
            return db( "UPDATE
                    books
                SET
                    title = :title,
                    text = :text
                WHERE
                    id = :id
                LIMIT 1
                    ", compact( 'title', 'text', 'id' ) );
        }
        public static function delete( $id ) {
            return db( "DELETE
                        FROM
                            books
                        WHERE
                            id = :id
                        LIMIT 1
                        ", compact( 'id' ) );
        }
    }
?>
