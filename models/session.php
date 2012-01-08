<?php
    class Session {
        public static function create( $user, $pass ) {
            if ( $user == 'user' && $pass == 'pass' ) {
                $_SESSION[ 'admin' ] = 'user';
            }
            return isset( $_SESSION[ 'admin' ] );
        }
    }
?>
