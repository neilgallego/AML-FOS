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
}

.button {
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
    height:80px; 
    width: 275px; 
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
    height:80px; 
    width: 275px; 
}
.textbox { 
    -webkit-border-radius: 5px; 
    -moz-border-radius: 5px; 
    border-radius: 5px; 
    border: 1px solid #848484; 
    outline:0; 
    height:80px; 
    width: 275px; 
    font-size: 22px;
 }
 .form{
 	text-align: center ;

 }
 .textt{
 	text-align: center ;
 	font-size: 22px;
 	font-family: verdana;
 }
</style>

</head>
<body>

	<div  style=" color:black; height="1200px" ">
<?php

if(isset($_POST['cancel'] )) {

	$varid = $_POST['orderid'];
	$varoldquantity = $_POST['oldorderquantity'];
	$varname = $_POST['ordername'];
	$varcode = $_POST['ordercode'];
	$varchange = $_POST['varchange'];

	//dbnames
	$vardb = $_POST['vardb'];
	$vardbquantity = $_POST['vardbquantity'];
	$vardbid = $_POST['vardbid'];

	if($varcode == 'customcharges'){
		
		echo "
		<div class = 'textt'>
		CANCEL CUSTOM CHARGES
		<br>
		DESCRIPTION : $varname
		<br> 
		<form method='POST' action='cancelcorkage.php' target='iframe_c'>  
		CANCEL ORDER?
		<br>
		<!-- dbase names -->
		<input type='hidden' name ='vardb' value='$vardb'>
		<input type='hidden' name ='vardbid' value='$vardbid'>

		<input type='hidden' name ='orderid' value=$varid>
		<input class = button type='submit' name ='cancelcorkage' value='YES'>
		<input class = button3 type='submit' name = 'no' value='NO' >
		</form>
		</div>";
	}else{

			echo "
		<div class = 'form'>
			<h2>CANCEL ORDER</h2>
			 <p>DESCRIPTION : $varname </p>";
			 
			echo "<form method='POST' action='cancelorder.php' target='iframe_c'>  
					<input type='hidden' name ='orderid' value=$varid>

					<p>HOW MANY WOULD YOU LIKE TO CANCEL?</p>
					<input class = textbox type='number'  style=' width: 80px;' name='orderqty' min='0' max=$varoldquantity value=$varoldquantity >
				
					<!-- dbase names -->
					<input type='hidden' name ='vardb' value='$vardb'>
					<input type='hidden' name ='vardbquantity' value='$vardbquantity'>
					<input type='hidden' name ='vardbid' value='$vardbid'>
					<!-- dbase names -->

					<input type='hidden' name ='varchange' value='$varchange'>

					<input type='hidden' name ='varqty' value=$varoldquantity>
			   		<input  class = button type='submit' name ='cancel' value='CANCEL'>
			   		<input class = button3 type='submit' name = 'no' value='NO' >
		   		  </form>
					</div>
		   		  ";
		

	}

}
?>

</div>
</body>
</html>

