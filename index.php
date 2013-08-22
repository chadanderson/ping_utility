<?php 
	require_once('header.php');
?>

			<h1>Device Status</h1>
		<?php
			$results = get_devices( $host, $database, $username, $password ); 
		?>
			<table>
				<tr>
					<th>Device ID</th>
					<th>IP Address</th>
					<th>Type</th>
					<th>Location</th>
					<th>Status</th>
				</tr>
		<?php
			foreach ($results as $row) : 
	  			echo '<tr>';
	  			echo '<td>' . htmlentities( $row['ID'] ) . '</td>';
	  			echo '<td>' . htmlentities( $row['ip_address'] ) . '</td>';
	  			echo '<td>' . htmlentities( $row['type'] ) . '</td>';
	  			echo '<td>' . htmlentities( $row['location'] ) . '</td>';
			    echo '<td>' . fget_device_status( $row['ip_address'] ) . '</td>'; 
			    echo '<tr>';
			endforeach; 
		?>		
			</table>

		</section>
	</body>
</html>