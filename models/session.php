<?php
    class Session {
        public static function create( $user, $pass ) {
            if ( $user == 'librarium' && $pass == 'szindros' ) {
                $_SESSION[ 'admin' ] = 'szindros';
            }
            return isset( $_SESSION[ 'admin' ] );
        }
    }
?>
