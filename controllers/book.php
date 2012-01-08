<?php
    class BookController {
        public static function view( $id ) {
            $book = Book::item( $id );

            $temp = $book[ 0 ][ 'text' ];
            $temp = explode( " ", $temp );

            view( 'book/view', compact( "book", "temp" ), true );
        }
        public static function listing( $initial = "true" ) {
            $books = Book::listing();

            $initial = ( $initial == 'true' || $initial == NULL ? true : false );
            view( 'book/listing', compact( "books" ), $initial );
        }
        public static function item( $id ) {
            $book = Book::item( $id );
            $book = $book[ 0 ];

            echo $book[ 'title' ] . "@@" . $book[ 'text' ];
        }
        public static function create( $title, $text ) {
            $title = htmlspecialchars( $title );
            $text = htmlspecialchars( $text );


            Book::create( $title, $text );
        }
        public static function update( $title, $text, $id ) {
            $title = htmlspecialchars( $title );
            $text = htmlspecialchars( $text );

            Book::update( $title, $text, $id );
        }
        public static function delete( $id ) {
            Book::delete( $id );
        }
    }
?>
