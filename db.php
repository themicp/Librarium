<?php
    mysql_connect( "localhost", "librarium", "librarium" ) || $return = false;
    mysql_select_db( "librarium" ) || $return = false;
    mysql_query( 'SET NAMES utf8' ) || $return = false;
?>
