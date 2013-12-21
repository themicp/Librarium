<?php
    class BookController {
        public static function view( $id ) {
            $book = Book::item( $id );
            $book[ 0 ][ 'text' ] = htmlspecialchars( $book[ 0 ][ 'text' ] );
            $book[ 0 ][ 'title' ] = htmlspecialchars( $book[ 0 ][ 'title' ] );

            $categories = Category::listing();

            $temp = $book[ 0 ][ 'text' ];
            $temp = explode( " ", $temp );

            view( 'book/view', compact( "book", "temp", "categories" ), true );
        }
        public static function listing( $initial = "true" ) {
            $books = Book::listing();

            $categories = Category::listing();

            $initial = ( $initial == 'true' || $initial == NULL ? true : false );
            view( 'book/listing', compact( "books", "categories" ), $initial );
        }
        public static function item( $id ) {
            $book = Book::item( $id );
            $book = $book[ 0 ];

            echo $book[ 'title' ] . "@@" . $book[ 'text' ] . "@@" . $book[ 'category' ];
        }
        public static function create( $title, $text, $category ) {
            Book::create( $title, $text, $category );
        }
        public static function update( $title, $text, $category, $id ) {
            Book::update( $title, $text, $category, $id );
        }
        public static function delete( $id ) {
            Book::delete( $id );
        }
    }
?>
