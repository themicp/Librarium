<?php
    include 'models/session.php';
    class SessionController {
        public static function create( $user, $pass ) {
            $user = mysql_real_escape_string( $user );
            $pass = mysql_real_escape_string( $pass );

            echo Session::create( $user, $pass );
        }
        public static function delete() {
            unset( $_SESSION[ 'admin' ] );
        }
    }
?>
