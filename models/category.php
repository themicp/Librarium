<?php
    class Category {
        public static function create( $title, $dict ) {
            return db( "INSERT INTO
                    categories
                SET
                    title = :title,
                    dictionary = :dict
                    ", compact( 'title', 'dict' ) );
        }
        public static function item( $id ) {
            return db_select( "categories", compact( "id" ) );
        }
        public static function listing() {
            $res = db( "
                SELECT
                    *
                FROM
                    categories
                ");
            return db_fetch( $res );
        }
        public static function update( $title, $dict, $id ) {
            return db( "UPDATE
                    categories
                SET
                    title = :title,
                    dictionary = :dict
                WHERE
                    id = :id
                LIMIT 1
                    ", compact( 'title', 'dict', 'id' ) );
        }
        public static function delete( $id ) {
            return db( "DELETE
                        FROM
                            categories
                        WHERE
                            id = :id
                        LIMIT 1
                        ", compact( 'id' ) );
        }
    }
?>
