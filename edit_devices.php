<?php 
	require_once('header.php');
?>
	<body>
		<h1>Edit Devices</h1>
		<?php 
			echo $message;
		?>
		<form action="" method="post">
			<p><label for="ip_address">IP Address:</label><br />
			<input type="text" id="ip_address" name="ip_address"></p>

			<p><label for="type">Type of Device:</label><br />
			<input type="text" id="type" name="type"></p>

			<p><label for="location">Location of the Device:</label><br />
			<input type="text" id="location" name="location"></p>

			<p><input type="submit" id="submit" value="Add" name="submit"></p>
		</form>
		<?php
			$results = get_devices( $host, $database, $username, $password ); 
		?>
		<div id="update-message"><span></span></div>
		<form action="" method="post" id="delete-form">
			<table id="device-table">
				<tr>
					<th>Device ID</th>
					<th>IP Address</th>
					<th>Type</th>
					<th>Location</th>
					<th>Update</th>
				</tr>
		<?php
			foreach ($results as $row) : 
	  			echo '<tr>';
	  			echo '<td><input type="text" name="id" value="' . htmlentities($row['ID']) . '" class="' . htmlentities($row['ID']) . '"></td>';
	  			echo '<td><input type="text" name="ip_address" value="' . htmlentities($row['ip_address']) . '" class="' . htmlentities($row['ID']) . '"</td>';
	  			echo '<td><input type="text" name="type" value="' . htmlentities($row['type']) . '" class="' . htmlentities($row['ID']) . '"</td>';
	  			echo '<td><input type="text" name="location" value="' . htmlentities($row['location']) . '" class="' . htmlentities($row['ID']) . '"</td>';
	  			echo '<td><input type="submit" name="update" class="' . htmlentities($row['ID']) . '" value="Update"><input type="submit" name="delete" class="' . htmlentities($row['ID']) . '" value="Delete"></td>';
			    echo '<tr>';
			endforeach; 
		?>		
			</table>
		</form>
	</body>
</html>