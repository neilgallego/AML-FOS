<?php

		$dbhost = 'localhost';
		$dbuser = 'root';
		$dbpass = '';
		$connection = mysqli_connect($dbhost,$dbuser,$dbpass,'aml_db');
			
		if(! $connection){
			die('Could not Connect to Database' . mysql_error());
		}
	
		echo "<h1>CHANGE ORDERS</h1>";

 		if(isset($_POST['quantity'])) {

 		$varmenuid = $_POST['menuid'];
		$varmname = $_POST['menuname' ];
		$varmprice = $_POST['menuprice' ];
		$varid = $_POST['orderid'];
	    $varquantity = $_POST['orderquantity'];
	    $varid = $_POST['orderid'];
	    $varname = $_POST['ordername'];
	    $varprice = $_POST['orderprice']; 
	    $varcode = $_POST['ordercode'];
	    $vartable = $_POST['ordertable'];
	    $varwaiter = $_POST['orderwaiter'];
	    $vartype = $_POST['ordertype'];

	    //dbnames
	    $vardb = $_POST['vardb'];
	    $vardbid = $_POST['vardbid'];
	    $vardbname = $_POST['vardbname'];
	  
		$sqlupdate = "UPDATE $vardb SET  $vardbname = '$varmname'  WHERE $vardbid = $varid";

			if($vardb = 'served_db'){
				$sql = " INSERT INTO order_db (order_quantity, order_price, order_name, order_code, order_waiter, order_date, order_time, order_type, order_table, order_tprice, order_priority)
				VALUES ('$varquantity','$varprice','$varmname', '$varcode', '$varwaiter', NOW(),NOW(), '$vartype', '$vartable', '',2);";
				$result = mysqli_query( $connection , $sql );
			}

			if ($connection->query($sqlupdate) === TRUE ) {
			   echo '<script> window.top.location.reload(); </script>';
			}else{
			    echo "Error updating record: " . $connection->error;
			}

mysqli_close($connection);
}

?>