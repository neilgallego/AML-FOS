<?php

		$dbhost = 'localhost';
		$dbuser = 'root';
		$dbpass = '';
		$connection = mysqli_connect($dbhost,$dbuser,$dbpass,'aml_db');
			
		if(! $connection){
			die('Could not Connect to Database' . mysql_error());
		}

 		if(isset($_POST['quantity'])){

 		$varid = $_POST['id'];
 		$varmenuid = $_POST['id'];
		$varmname = $_POST['menuname' ];
		$varmprice = $_POST['menuprice'];
		$varnewquantity = $_POST['neworderquantity'];
		$varoldquantity = $_POST['oldorderquantity']; 
	    $varname = $_POST['ordername'];
	    $varprice = $_POST['orderprice']; 
	    $varcode= $_POST['ordercode'];
	    $vartable = $_POST['ordertable'];
   		$varwaiter = $_POST['orderwaiter'];
   		$vartype = $_POST['ordertype'];
   		$varpriority = '2';

   		//dbnames
	    $vardb = $_POST['vardb'];
	    $vardbquantity = $_POST['vardbquantity'];
	    $vardbid = $_POST['vardbid'];
	    $vardbname = $_POST['vardbname'];
	    $vardbtable = $_POST['vardbtable'];
	    $vardbcode = $_POST['vardbcode'];
	    $vardbprice = $_POST['vardbprice'];
	    $vardbwaiter = $_POST['vardbwaiter'];
	    $vardbdate= $_POST['vardbdate'];
	    $vardbtime = $_POST['vardbtime'];
	    $vardbtype = $_POST['vardbtype'];
	    $vardbtotalprice = $_POST['vardbtotalprice'];
	    $vardbpriority = $_POST['vardbpriority'];


	    if ($varoldquantity != $varnewquantity){ 
	    	$varoldquantity = $varoldquantity - $varnewquantity ;

	    	$vartprice = $varnewquantity * $varmprice;
	    	$varnewtprice = $varoldquantity * $varprice;

	    if($vardb == 'order_db'){
	    			// insert new values
	    		$sql = "INSERT INTO $vardb ($vardbcode, $vardbtable, $vardbwaiter, $vardbtime, $vardbdate, $vardbquantity, $vardbname, $vardbprice ,$vardbtype, $vardbtotalprice, $vardbpriority) VALUES ('$varcode', '$vartable', '$varwaiter',  NOW(),       NOW(), '$varnewquantity', '$varmname', '$varmprice' ,'$vartype', '$vartprice', '$varpriority');";


				if ($connection->query($sql) === TRUE) {

			$sql1 = "UPDATE $vardb SET $vardbquantity = '$varoldquantity',$vardbprice ='$varprice',$vardbtotalprice='$varnewtprice', $vardbpriority = '$varpriority', $vardbtype = '$vartype' WHERE $vardbid = $varid";

			   			if ($connection->query($sql1) === TRUE) {

					   	echo '<script> window.top.location.reload(); </script>';
						} else {
					    echo "Error updating record: " . $connection->error;
						}
				} else {
			    echo "Error updating record: " . $connection->error;
				}
			}else{

			}

			
	    }else{ 
	    	$varoldquantity = $varoldquantity; 
	    	$vartprice = $varnewquantity * $varmprice;

	     $sql = "UPDATE $vardb SET $vardbname = '$varmname' , $vardbquantity = '$varoldquantity', $vardbprice = '$varmprice', $vardbtotalprice = '$vartprice' , $vardbpriority = '$varpriority' WHERE $vardbid = $varid";

		   		 $result = mysqli_query( $connection , $sql );
			    if ($result == TRUE ) {
				    echo '<script> window.top.location.reload(); </script>';
				} else {
				    echo "Error updating record: " . $connection->error;
				}
		}
mysqli_close($connection);
}
?>