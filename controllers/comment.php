<?php
    class CommentController {
        public static function update( $word, $text ) {
            if ( $text != "" ) {
                $word = htmlspecialchars( $word );
                $text = htmlspecialchars( $text );

                $word = strtolower( $word );
                $word = preg_replace( "#[,+\"\]\[\]\.\;\!]#", "", $word ); 

                Comment::save( $word, $text );
            }
        }

        public static function view( $word ) {
            $word = strtolower( $word );
            $word = preg_replace( "#[,+\"\]\[\]\.\;\!]#", "", $word ); 

            $comment = Comment::item( $word );

            view( 'comment/view', compact( "comment" ) );
        }
    }
?>
