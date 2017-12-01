<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>SERVED ORDERS</title>
	<link rel="stylesheet" href="../bootstrap-3.3.7/dist/css/bootstrap.min.css">
	<script src="../bootstrap-3.3.7/dist/js/jquery-3.2.1.min.js"></script>
	<script src="../bootstrap-3.3.7/dist/js/bootstrap.min.js"></script>

</head>

<body style="background-color: #f5fffa;">
<script>
	$( ".wbutton").click(function(){
			 $.post('test.php', 'val=' + $(this).val());
	})
</script>
		<div name="table_list">
			<table  class="table table-hover table-condensed table-striped" align="center" border="0">
				
					<center><B><h1>SERVED</h1></B></center>
				<tr>	
				<th>TABLE</th><th>QTY</th><th>ORDER</th><th>TYPE</th><th>WAITER</th><th>TIME</th>
				</tr>
		<?php
		$dbhost = 'localhost';
		$dbuser = 'root';
		$dbpass = '';
		$connection = mysqli_connect($dbhost,$dbuser,$dbpass,'aml_db');

		if(! $connection){
			die('Could not Connect to Database' . mysql_error());
		}

		$query = "SELECT served_id, served_table, served_waiter,served_quantity, served_name, served_price, served_type, served_time, served_code
						 FROM served_db";

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
			$scode = '';
	
	 	while($row = mysqli_fetch_array($result , MYSQL_NUM)){

			$varid    = $row[0];
			$vartable = $row[1];
			$varwaiter = $row[2];
			$varoldquantity = $row[3];
			$varname = $row[4];
			$varprice = $row[5];
			$vartype = $row[6];	
		    $vartime = $row[7];
			$varcode = $row[8];

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
			$varchange = 'served';

		   echo "<tr>
		   <td><center>$vartable</center></td>
		   <td><center>$varoldquantity</center></td>
		   <td><center>$varname</center></td>

		   <td><center>$vartype

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

		   		<input type='submit' class='btn btn-danger btn-sm'  name ='cancel' value='Cancel' >
		    	</form>
				</center></td>

				<td><center>$varwaiter
			 
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

		   		<input type='submit' class='btn btn-warning btn-sm'  name = 'change' value='Change'>
		   		</form>
		   		</center></td>

				<td><center>$vartime<br>

		   		 <button data-toggle='modal' data-target='#clickTable' type='button' class='btn btn-success btn-sm' id='lol' name='tbbutton'>Charge</button>

		   		 </center></td>

					 <div class='modal fade' id='clickTable' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>

						<div class='modal-dialog'>

						  <div class='modal-content'>

							<div id='thebutton'><center>
							<h2>Charge to Waiter: </h2>
							<br>";
							
							
							$query1 = "SELECT waiter, date from assigned_waiters where date = CURRENT_DATE";

							$result1 = mysqli_query( $connection , $query1 );
							while($row = mysqli_fetch_array($result1 , MYSQL_NUM)){
									$varwaiter1 = $row[0];
									//$varwaiter2 = $row[1];
									//$varwaiter3 = $row[2];
									//$varwaiter4 = $row[3];
							echo"
									<a href='charge.php?ch=$varid'>
										<strong><button type='submit' class='wbutton1 btn btn-primary btn-lg' name='waiter' id='myselect' onclick='dothis()' value='$varwaiter1'>$varwaiter1</button></strong>
									</a>
									
								";
							}
							echo "
							</div>
							 <div class='modal-footer'>
					        </div>
						</div>
					  </div>
					</div>";	
     	}   
	mysqli_close($connection);
    ?>
    </tr>
			</table>
 </div>
<script>
	$( ".wbutton1").click(function(){
			 $.post('item category/test.php', 'val=' + $(this).val());
	})
</script>




</body>

</html>