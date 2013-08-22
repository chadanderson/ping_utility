<?php 
include('db/config.php');
include('functions.php');

$ID = $_POST['ID'];
$location = $_POST['DeviceLocation'];
$type = $_POST['Type'];
$ip_address = $_POST['IPAddress'];

update_device( $ID, $location, $type, $ip_address, $host, $database, $username, $password );

?>