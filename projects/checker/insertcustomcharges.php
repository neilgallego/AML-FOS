<?php
session_start();
if(isset($_POST['charge'])){

$waiter = $_SESSION['varname'];
$table = $_SESSION['varname2'];

$varname = $_POST['newdesc'];
$varprice = $_POST['newvalue'];
$vartype = 'Dine In';
$vartime = '';
$vardate = '';
$varcode = 'customcharges';
$varquantity = $_POST['customchargequantity'];
$varpriority = '1';
$vartprice = $varquantity * $varprice;

		$dbhost = 'localhost';
		$dbuser = 'root';
		$dbpass = '';
		$connection = mysqli_connect($dbhost,$dbuser,$dbpass,'aml_db');


		if(! $connection){
			die('Could not Connect to Database' . mysql_error());
		}
	
		$sql = " INSERT INTO order_db (order_quantity, order_price, order_name, order_code, order_waiter, order_date, order_time, order_type, order_table, order_tprice, order_priority)
								VALUES ('$varquantity','$varprice','$varname', '$varcode', '$waiter', NOW(),NOW(), '$vartype', '$table', $vartprice, $varpriority);";



  		$result = mysqli_query( $connection , $sql );

		if ($result === TRUE) {
		    echo '<script> window.top.location.reload(); </script>';
		} else {
		    echo "Error updating record: " . $connection->error;
		}
		mysqli_close($connection);

}else{
	header("Location: item category/appetizzer.php");
}


?>