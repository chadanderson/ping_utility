<?php 
include('db/config.php');
include('functions.php');

$ID = $_POST['ID'];

delete_device( $ID, $host, $database, $username, $password );

?>