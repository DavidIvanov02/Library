<?php

include "config.php";

include "dbconnection.php";
include "functions.php";

session_start();

$db = new DB($config['db_opts']);

if( isset($_SESSION['user']) ) {
    $userRow = $db->getUserById($_SESSION['user']);
}


?>