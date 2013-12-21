<?php
    class CategoryController {
        public static function view( $id ) {
        }
        public static function listing() {
            $categories = Category::listing();

            view( 'category/listing', compact( "categories" ) );
        }
        public static function item( $id ) {
        }
        public static function create( $title, $dictionary ) {
            Category::create( $title, $dictionary );
        }
        public static function update( $title, $dictionary, $id ) {
            Category::update( $title, $dictionary, $id );
        }
        public static function delete( $id ) {
            Category::delete( $id );
        }
    }
?>
