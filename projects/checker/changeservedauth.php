<!DOCTYPE html>
<html>
<head>
	<title></title>

	<style>
body {
    background-color: lightblue;
}

h2 {
    text-align: center;
}

p {
    font-family: verdana;
    font-size: 20px;
    text-align: center;
}

.button {
	 text-align: center;
    background-color: #4CAF50;
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 22px;
    margin: 4px 2px;
    cursor: pointer;
    height: 90px;
    width: 200px;
}
.button3 {
	background-color: #f44336;
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 22px;
    margin: 4px 2px;
    cursor: pointer;
    height: 90px;
    width: 200px;
}
.textbox { 
    -webkit-border-radius: 5px; 
    -moz-border-radius: 5px; 
    border-radius: 5px; 
    border: 1px solid #848484; 
    outline:0; 
    height:100px; 
    width: 275px; 
    text-align: center;
    font-size: 22px;
 }

    #button {
    background-color: #4CAF50;
    border: none;
    color: white;
    text-align: center;
    text-decoration: none;
    font-size: 22px;
    height: 100px;
    width: 200px;
    position: relative;
    margin: 0;
}
	.form {
		text-align: center;
	}
    
</style>
</head>
<body>

	<div  style=" color:black; height="1200px" ">
<?php

if(isset($_POST['change'] )) {


	$varid = $_POST['orderid'];
	$vartable = $_POST['ordertable']; 
	$varwaiter = $_POST['orderwaiter']; 
	$varname = $_POST['ordername'];
	$varprice = $_POST['orderprice']; 
	$varcode= $_POST['ordercode'];
	$vartype = $_POST['ordertype']; 
	$vartime = $_POST['ordertime'];

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


  		echo "
				<h2>CHANGE TABLE</h2>


					<CENTER><table >
						<form method='POST' action='changetables/a.php' target ='iframe_c'> 
							   		
							   		<input type='hidden' name ='id' value='$varid'>

							   			<!-- dbase names -->
									   <input type='hidden' name ='vardb' value='$vardb'>
									   <input type='hidden' name ='vardbid' value='$vardbid'>
									   <input type='hidden' name ='vardbtable' value='$vardbtable'>
									   <!-- dbase names -->

							   		<input  id = 'button'  type='submit' class='btn btn-warning btn-sm' name = 'change' value='A TABLES'>
							   		</form>
						<form method='POST' action='changetables/b.php' target ='iframe_c'> 
							   		
							   		<input type='hidden' name ='id' value='$varid'>
							   		<!-- dbase names -->
								   <input type='hidden' name ='vardb' value='$vardb'>
								   <input type='hidden' name ='vardbid' value='$vardbid'>
								   <input type='hidden' name ='vardbtable' value='$vardbtable'>
								   <!-- dbase names -->

							   		<input id = 'button'  type='submit' class='btn btn-warning btn-sm' name = 'change' value='B TABLES'>
							   		</form>

						<form method='POST' action='changetables/c.php' target ='iframe_c'> 
							   		
							   		<input type='hidden' name ='id' value='$varid'>

							   		<!-- dbase names -->
									   <input type='hidden' name ='vardb' value='$vardb'>
									   <input type='hidden' name ='vardbid' value='$vardbid'>
									   <input type='hidden' name ='vardbtable' value='$vardbtable'>
									   <!-- dbase names -->

							   		<input id = 'button'  type='submit' class='btn btn-warning btn-sm' name = 'change' value='C TABLES'>
							   		</form>
						<form method='POST' action='changetables/d.php' target ='iframe_c'> 
							   		
							   		<input type='hidden' name ='id' value='$varid'>

							   		<!-- dbase names -->
									   <input type='hidden' name ='vardb' value='$vardb'>
									   <input type='hidden' name ='vardbid' value='$vardbid'>
									   <input type='hidden' name ='vardbtable' value='$vardbtable'>
									   <!-- dbase names -->

							   		<input id = 'button'  type='submit' class='btn btn-warning btn-sm' name = 'change' value='D TABLES'>
							   		</form>
					</table></CENTER>
					";
		   		  						
		   		}


?>

</div>


</body>
</html>

