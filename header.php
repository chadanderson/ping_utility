<?php 
	include('db/config.php');
	include('functions.php');

	if(isset($_POST['submit'])) {
		$message = insert_device( $host, $database, $username, $password );
	}
?>
<!DOCTYPE HTML>
<html lang="en-US">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="content-type" content="text/html">
		<title>Ping Utility</title>
		<link rel="stylesheet" href="style.css">
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
		<script type="text/javascript" src="js/scripts-min.js"></script>
	</head>
	<body>
		<section class="wrapper">
			<?php include('nav_bar.php'); ?>