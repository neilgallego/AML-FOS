<!DOCTYPE html>
<html>
<head>

	<title>Order Queue</title>

<link rel="stylesheet" href="../bootstrap-3.3.7/dist/css/bootstrap.min.css">
<script src="../bootstrap-3.3.7/dist/js/jquery-3.2.1.min.js"></script>
<script src="../bootstrap/bootstrap-3.3.7/dist/js/bootstrap.min.js"></script>

</head>
<body style="background-color: white;">
		<div name="table_list">
			<table class="table table-hover table-condensed table-striped" align="center" border="0">
				
					<center><B><h1>LIST OF ORDERS</h1></B></center>
					
				<th><center>TABLE</center></th><th><center>ORDER</center></th><th><center>QTY</center></th>
				<th><center>WAITER</center></th><th><center>TYPE</center></th><th><center>TIME</center></th>
				
			<tr>	
		<?php
		$dbhost = 'localhost';
		$dbuser = 'root';
		$dbpass = '';
		$connection = mysqli_connect($dbhost,$dbuser,$dbpass,'aml_db');

		if(! $connection){
			die('Could not Connect to Database' . mysql_error());
		}

		$query = "SELECT order_id, order_table,order_waiter,order_quantity,order_name,order_price,order_code, order_type, order_time, order_priority
						 FROM order_db ORDER BY order_priority ASC";

		$result = mysqli_query( $connection , $query );

		if(! $result){
			die('Could not get data from database : ' . mysql_error() );
		}
			$varid = '';
			$vartable = '';
			$varwaiter = '';
			$varquantity ='';
			$varname = '';
			$varprice = '';
			$varcode = '';	
			$vartype = '';
			$vartime = '';
			
	
	 	while($row = mysqli_fetch_array($result , MYSQL_NUM)){

			$varid    = $row[0];
			$vartable = $row[1];
			$varwaiter = $row[2];
			$varoldquantity = $row[3];
			$varname = $row[4];
			$varprice = $row[5];
			$varcode = $row[6];	
			$vartype = $row[7];
		    $vartime = $row[8];

		    //dbnames for order_db
		    $vardb = 'order_db';
		    $vardbid = 'order_id';
		    $vardbtable = 'order_table';
		    $vardbquantity ='order_quantity';
		    $vardbname = 'order_name';
			$vardbtype = 'order_type';
			$vardbcode = 'order_code';
			$vardbprice = 'order_price';
			$vardbwaiter = 'order_waiter';
			$vardbtime = 'order_time';
			$vardbdate = 'order_date';
			$vardbtotalprice = 'order_tprice';
			$vardbpriority = 'order_priority';
			$varchange = 'order';

		   echo "<tr>";
		   echo	"<td><center>$vartable</center></td>";
		   echo	"<td><center>$varname</center></td>";
		   echo	"<td><center>$varoldquantity</center></td>";
		   echo	"<td><center>$varwaiter
		   
			<form method='POST' action='cancelorderauth.php' target='iframe_c'>

				<input type='hidden' name ='oldorderquantity' value='$varoldquantity'>
				<input type='hidden' name ='ordername' value='$varname'>
		   		<input type='hidden' name ='orderid' value='$varid'>
		   		<input type='hidden' name ='ordercode' value='$varcode'>
		   		<input type='hidden' name ='varchange' value='$varchange'>

		   		<!-- dbase names -->
				<input type='hidden' name ='vardb' value='$vardb'>
				<input type='hidden' name ='vardbquantity' value='$vardbquantity'>
				<input type='hidden' name ='vardbid' value='$vardbid'>
				<!-- dbase names -->

		   		<input type='submit' class='btn btn-danger btn-sm' name ='cancel' value='Cancel' >
		    	</form>
				
		   </center></td>";

		   echo	"<td><center>$vartype
		   
		   <form method='POST' action='changeauth.php' target ='iframe_c'> 
		   		
		   		<input type='hidden' name ='orderid' value='$varid'>
				<input type='hidden' name ='ordertable' value='$vartable'>
				<input type='hidden' name ='orderwaiter' value='$varwaiter'>
				<input type='hidden' name ='oldorderquantity' value='$varoldquantity'>
				<input type='hidden' name ='ordername' value='$varname'>
				<input type='hidden' name ='orderprice' value='$varprice'>
				<input type='hidden' name ='ordercode' value='$varcode'>
				<input type='hidden' name ='ordertype' value='$vartype'>
				<input type='hidden' name ='ordertime' value='$vartime'>
				<input type='hidden' name ='varchange' value='$varchange'>

				<!-- dbase names -->
	            <input type='hidden' name ='vardb' value='$vardb'>
		        <input type='hidden' name ='vardbid' value='$vardbid'>
		        <input type='hidden' name ='vardbquantity' value='$vardbquantity'>
		        <input type='hidden' name ='vardbname' value='$vardbname'>
		        <input type='hidden' name ='vardbtable' value='$vardbtable'>
		        <input type='hidden' name ='vardbcode' value='$vardbcode'>
		        <input type='hidden' name ='vardbprice' value='$vardbprice'>
		        <input type='hidden' name ='vardbwaiter' value='$vardbwaiter'>
		        <input type='hidden' name ='vardbdate' value='$vardbdate'>
		        <input type='hidden' name ='vardbtime' value='$vardbtime'>
		        <input type='hidden' name ='vardbtype' value='$vardbtype'> 
		        <input type='hidden' name ='vardbtotalprice' value='$vardbtotalprice'>
		        <input type='hidden' name ='vardbpriority' value='$vardbpriority'> 
	            <!-- dbase names -->

		   		<input type='submit' class='btn btn-warning btn-sm' name = 'change' value='Change'>
		   		</form>

				</center></td>
				<td><center>$vartime<br>
				<a href='serve.php?id=$varid'><button type='submit' class='btn btn-success btn-sm' id='serv'>Serve</button></a>
				</center></td>
				</tr>			  
				<div>";  
     	}   
	mysqli_close($connection);
    ?>
    </tr>
		</table>
 </div>
</body>
</html>