<?php
    class CommentController {
        public function update( $word, $text ) {
            $word = htmlspecialchars( $word );
            $text = htmlspecialchars( $text );

            $word = strtolower( $word );
            $word = preg_replace( "#[^a-z]#", "", $word ); 

            Comment::save( $word, $text );
        }

        public function view( $word ) {
            $word = strtolower( $word );
            $word = preg_replace( "#[^a-z]#", "", $word ); 

            $comment = Comment::item( $word );

            view( 'comment/view', compact( "comment" ) );
        }
    }
?>
