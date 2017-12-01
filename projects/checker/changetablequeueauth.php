<?php

		$dbhost = 'localhost';
		$dbuser = 'root';
		$dbpass = '';
		$connection = mysqli_connect($dbhost,$dbuser,$dbpass,'aml_db');
			
		if(! $connection){
			die('Could not Connect to Database' . mysql_error());
		}

 		if(isset($_POST['newtable'])){

 		$varid = $_POST['orderid'];
 		$vartable = $_POST['newtable'];

		$sqlupdate = "UPDATE order_db SET order_table='$vartable' WHERE order_id=$varid";

		$result = mysqli_query( $connection , $sql );
		if ($connection->query($sqlupdate) === TRUE) {
			
			echo '<script> window.top.location.reload(); </script>';
		 
		} else {
		    echo "Error updating record: " . $connection->error;
		}


		mysqli_close($connection);
		}
?>

