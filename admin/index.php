<?php
    session_start();
    if ( isset( $_SESSION[ 'admin' ] ) ) {
        if ( $_SESSION[ 'admin' ] == "szindros" ) {
            include '../views/admin/home.php';
            return false;
        }
    }
    include '../views/admin/login.php';
?>
