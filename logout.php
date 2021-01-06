<?php
include ("core/init.php");

if ( !isset( $_SESSION[ 'user' ] ) ) {
    header( "Location: http://localhost/library/home/" );
} else if ( isset( $_SESSION[ 'user' ] ) != "" ) {
    header( "http://localhost/library/home/" );
}

unset( $_SESSION[ 'user' ] );
session_unset();
session_destroy();
header( "Location: http://localhost/library/home/" );
exit;
?>