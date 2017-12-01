<?php

	
		$dbhost = 'localhost';
		$dbuser = 'root';
		$dbpass = '';
		$connection = mysqli_connect($dbhost,$dbuser,$dbpass,'aml_db');


		if(! $connection){
			die('Could not Connect to Database' . mysql_error());
		}


if(isset($_POST['cancelcorkage'])) {

 		$varid = $_POST['orderid'];

		$query = "DELETE FROM served_db WHERE served_id = $varid";

		$result = mysqli_query( $connection , $query );

		if ($connection->query($query) === TRUE) {
		    echo '<script> window.top.location.reload(); </script>';
		} else {
		    echo "Error updating record: " . $connection->error;
		}

		mysqli_close($connection);



}
?>