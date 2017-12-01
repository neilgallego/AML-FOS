<?php

	


if(isset($_POST['cancel'] )) {
	$varid = $_POST['orderid'];

		echo "CANCEL ORDER WITH ORDER ID $varid?";
			echo "<form method='POST' action=''> 
		   		 <input type='submit' name ='YES' value='YES'>
		   		 <input type='submit' name = 'NO' value='NO' >";
		   echo "</form>";


	if($_POST['YES'] == 'YES'){


		$dbhost = 'localhost';
		$dbuser = 'root';
		$dbpass = '';
		$connection = mysqli_connect($dbhost,$dbuser,$dbpass,'aml_db');


		if(! $connection){
			die('Could not Connect to Database' . mysql_error());
		}

		$sql = "SELECT queue_table,queue_waiter,queue_quantity,queue_name,queue_price, queue_time,queue_date, queue_type FROM queue_db WHERE queue_id=$varid";

		$result = mysqli_query( $connection , $sql );

		if(! $result){
			die('Could not get data from database : ' . mysql_error() );
		}

			$vartable = '';
			$varwaiter = '';
			$varquantity ='';
			$varname = '';
			$varprice = '';
			$varcode = '';	
			$vartype = '';
			$vartime = '';
			$vardate = '';
			$sql='';
	
	 	while($row = mysqli_fetch_array($result , MYSQL_NUM)){

			$vartable = $row[0];
			$varwaiter = $row[1];
			$varquantity = $row[2];
			$varname = $row[3];
			$varprice = $row[4];	
			$vartime = $row[5];
			$vardate = $row[6];
			$vartype = $row[7];
			}


		$query = "DELETE FROM queue_db WHERE queue_id=$varid";

		$result1 = mysqli_query( $connection , $query );

		if ($connection->query($query) === TRUE) {
		    echo "<h1> ORDER CANCELLED</h1>";
		} else {
		    echo "Error updating record: " . $connection->error;
		}

		mysqli_close($connection);
}else {

	echo "ORDER NOT CANCELLED";
}


}


?>