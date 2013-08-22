<?php 
include('db/config.php');
include('functions.php');

$rows = get_devices( $host, $database, $username, $password );

// create log file
if ( !file_exists('logs/status_report_log.csv') ) {
		$handle = fopen('logs/status_report_log.csv', 'a');
        
        $data = array( 'Date', 'Device ID', 'IP Address', 'Type', 'Location' );

        fputcsv($handle, $data);

        fclose($handle);
	}

foreach ( $rows as $row ) {
	$results = get_device_status( $row['ip_address'] );

	if( $results == 'Not Connected' ) {
		$handle = fopen('logs/status_report_log.csv', 'a');
		$date = date("Y-m-d H:i:s"); 
        
        $data = array( $date, htmlentities($row['ID']), htmlentities($row['ip_address']), htmlentities($row['type']), htmlentities($row['location']) );

        fputcsv($handle, $data);

        fclose($handle);

	}
}

?>
