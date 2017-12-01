<?php

	
		$dbhost = 'localhost';
		$dbuser = 'root';
		$dbpass = '';
		$connection = mysqli_connect($dbhost,$dbuser,$dbpass,'aml_db');


		if(! $connection){
			die('Could not Connect to Database' . mysql_error());
		}

		//dbnames
		$vardb = $_POST['vardb'];
		$vardbquantity = $_POST['vardbquantity'];
		$vardbid = $_POST['vardbid'];
		$varchange = $_POST['varchange'];

		$varid = $_POST['orderid'];
 		$varquantity = $_POST['orderqty'];
 		$varqty = $_POST['varqty'];

 		$newquantity =  $varqty - $varquantity;



if (isset($_POST['cancel']) && $newquantity != 0){

	if($varchange == 'order'){

		$sql = "UPDATE $vardb SET $vardbquantity = '$newquantity' WHERE $vardbid = $varid";

		if ($connection->query($sql) === TRUE) {
		    echo '<script> window.top.location.reload(); </script>';
			
		} else {
		    echo "Error updating record: " . $connection->error;
		}

	}else{
		$sql = "UPDATE served_db SET served_quantity = '$newquantity' WHERE served_id = $varid";

		if ($connection->query($sql) === TRUE) {
		    echo '<script> window.top.location.reload(); </script>';
			
		} else {
		    echo "Error updating record: " . $connection->error;
		}
	}

mysqli_close($connection);

}elseif(isset($_POST['cancel']) && $newquantity == 0){


		$varid = $_POST['orderid'];
		if($varchange == 'order'){
		$query = "DELETE FROM $vardb WHERE $vardbid = $varid";

		$result = mysqli_query( $connection , $query );

		if ($connection->query($query) === TRUE) {
		   echo '<script> window.top.location.reload(); </script>';
		} else {
		    echo "Error updating record: " . $connection->error;
		}


	}else{
		$query = "DELETE FROM served_db WHERE served_id = $varid";

		$result = mysqli_query( $connection , $query );

		if ($connection->query($query) === TRUE) {
		   echo '<script> window.top.location.reload(); </script>';
		} else {
		    echo "Error updating record: " . $connection->error;
		}

	}
		mysqli_close($connection);
	


}else {

	//echo "ORDER NOT CANCELLED";
	header("Location: /item category/appetizzer.php");
}

?>
