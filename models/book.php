<?php
    class Book {
        public static function create( $title, $text, $category ) {
            return db( "INSERT INTO
                    books
                SET
                    title = :title,
                    text = :text,
                    category = :category
                    ", compact( 'title', 'text', 'category' ) );
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
        public static function update( $title, $text, $category, $id ) {
            return db( "UPDATE
                    books
                SET
                    title = :title,
                    text = :text,
                    category = :category
                WHERE
                    id = :id
                LIMIT 1
                    ", compact( 'title', 'text', 'category', 'id' ) );
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
