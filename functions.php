<?php 

    /**
    *
    * Returns the connection status of the device
    *
    * @param string $ip IP address of the device to ping
    *
    */
    function get_device_status($ip) {

        $output = array();
        $result = null;

        // ping the ip address of the device
        exec("ping -c 1 " . $ip, $output, $result);

        if ($result == 0) {
            $status = 'Connected';
        } else {
            $status = 'Not Connected';
        }

        return $status;
    }

    /**
    *
    * Returns the connection status of the device
    *
    * @param string $ip IP address of the device to ping
    *
    */
    function fget_device_status($ip) {

        $output = array();
        $result = null;

        // ping the ip address of the device
        exec("ping -c 1 " . $ip, $output, $result);

        if ($result == 0) {
            $status = '<span class="success">Connected</span>';
        } else {
            $status = '<span class="failure">Not Connected</span>';
        }

        return $status;
    }

    /**
    *
    * Returns device information
    *
    * @param string $host Hostname for the database
    * @param string $database Database name
    * @param string $username Username
    * @param string $password User password
    *
    */
    function get_devices( $host, $database, $username, $password ) {

        try {
            // open new connection
            $dbh = new PDO("mysql:host=$host;dbname=$database", $username, $password);

            $stmt = $dbh->prepare("SELECT * FROM devices");
            $stmt->execute();
            
            $result = $stmt->fetchAll();

            // close db connection
            $dbh = null;

            return $result;

        }
        catch(PDOException $e) {
            echo $e->getMessage();
            die();
        }
   
    }

    /**
    *
    * Inserts a new device into the database
    *
    * @param string $host Hostname for the database
    * @param string $database Database name
    * @param string $username Username
    * @param string $password User password
    *
    */
    function insert_device( $host, $database, $username, $password ) {
                
        try {
            // open new connection
            $dbh = new PDO("mysql:host=$host;dbname=$database", $username, $password);

            // set the error reporting attribute
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // post variables and date
            $ip_address = $_POST['ip_address'];
            $type = $_POST['type'];
            $location = $_POST['location'];
            $date_added = date("Y-m-d H:i:s"); 

            // prepare the SQL statement
            $stmt = $dbh->prepare("INSERT INTO devices(ip_address, type, location, date_added) VALUES (:ip_address, :type, :location, :date_added)");

            // bind the paramaters
            $stmt->bindParam(':ip_address', $ip_address, PDO::PARAM_STR);
            $stmt->bindParam(':type', $type, PDO::PARAM_STR);
            $stmt->bindParam(':location', $location, PDO::PARAM_STR);
            $stmt->bindParam(':date_added', $date_added, PDO::PARAM_STR);

            // execute the prepared statement
            if($stmt->execute()) {
                // close db connection
                $dbh = null;
                return 'Device added successfully!';
            } else {
                // close db connection
                $dbh = null;
                return 'There was an error adding the device. Please try again.';
            }

        }
        catch(PDOException $e) {
            echo $e->getMessage();
            die();
        }

    }

    /**
    *
    * Updates the device information in the database
    *
    * @param string $host Hostname for the database
    * @param string $database Database name
    * @param string $username Username
    * @param string $password User password
    *
    */
    function update_device( $host, $database, $username, $password ) {
        try {
            // open new connection
            $dbh = new PDO("mysql:host=$host;dbname=$database", $username, $password);

            // set the error reporting attribute
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // $_POST variables
            $id = $_POST['ID'];
            $device_location = $_POST['DeviceLocation'];
            $device_type = $_POST['Type'];
            $IP_address = $_POST['IPAddress'];

            // prepare the SQL statement
            $stmt = $dbh->prepare("UPDATE devices SET ip_address=:IP_address, type=:device_type, location=:device_location WHERE ID=:id");

            // bind the paramaters
            $stmt->bindParam(':IP_address', $IP_address, PDO::PARAM_STR);
            $stmt->bindParam(':device_type', $device_type, PDO::PARAM_STR);
            $stmt->bindParam(':device_location', $device_location, PDO::PARAM_STR);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);


            // execute the prepared statement
            if($stmt->execute()) {
                // close db connection
                $dbh = null;
                echo 'Device updated successfully!';
            } else {
                // close db connection
                $dbh = null;
                echo 'There was an error updating the device. Please try again.';
            }


        }
        catch(PDOException $e) {
            echo $e->getMessage();
            die();
        }
    }


    /**
    *
    * Deletes the device from the database
    *
    * @param string $host Hostname for the database
    * @param string $database Database name
    * @param string $username Username
    * @param string $password User password
    *
    */
    function delete_device( $host, $database, $username, $password ) {
        try {
            // open new connection
            $dbh = new PDO("mysql:host=$host;dbname=$database", $username, $password);

            // set the error reporting attribute
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // $_POST variable
            $id = $_POST['ID'];

            // prepare the SQL statement
            $stmt = $dbh->prepare("DELETE FROM devices WHERE ID=:id");

            // bind the paramaters
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);

            // execute the prepared statement
            if($stmt->execute()) {
                // close db connection
                $dbh = null;
                echo 'The device has been deleted.';
            } else {
                // close db connection
                $dbh = null;
                echo 'There was an error deleting the device. Please try again.';
            }

        }
        catch(PDOException $e) {
            echo $e->getMessage();
            die();
        }

    }







?>
