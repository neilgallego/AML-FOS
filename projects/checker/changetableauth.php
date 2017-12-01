<?php

		$dbhost = 'localhost';
		$dbuser = 'root';
		$dbpass = '';
		$connection = mysqli_connect($dbhost,$dbuser,$dbpass,'aml_db');
			
		if(! $connection){
			die('Could not Connect to Database' . mysql_error());
		}

 		if(isset($_POST['newtable'])){

 		$varid = $_POST['id'];

 		$vartable = $_POST['newtable'];
 		$varchange = $_POST['varchange'];


 		//dbnames
		$vardb = $_POST['vardb'];
		$vardbid = $_POST['vardbid'];
		$vardbtable = $_POST['vardbtable'];

		if($varchange == 'order'){
		$sqlupdate = "UPDATE $vardb SET $vardbtable ='$vartable' WHERE $vardbid= $varid";

		//$result = mysqli_query( $connection , $sqlupdate );
		if ($connection->query($sqlupdate) === TRUE) {
			
			echo '<script> window.top.location.reload(); </script>';
		 
		} else {
		    echo "Error updating record: " . $connection->error;
		}

		}else{
			$sqlupdate = "UPDATE served_db SET served_table ='$vartable' WHERE served_id = $varid";

			//$result = mysqli_query( $connection , $sqlupdate );
			if ($connection->query($sqlupdate) === TRUE) {
				
				echo '<script> window.top.location.reload(); </script>';
			 
			} else {
			    echo "Error updating record: " . $connection->error;
		}


		}
		mysqli_close($connection);
		}
?>

