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
.button2 {
    border: none;
    color: white;
    
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 22px;
    margin: 4px 2px;
    height: 45px;
    width: 45px;
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
 .tb{
 	-webkit-border-radius: 5px; 
    -moz-border-radius: 5px; 
    border-radius: 5px; 
    border: 1px solid #848484; 
    outline:0; 
    height:30px; 
    width: 250px; 
    font-size: 22px;
    -webkit-appearance: none;
    margin: 0;
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

if(isset($_POST['change'] )) {


	$varid = $_POST['orderid'];
	$vartable = $_POST['ordertable']; 
	$varwaiter = $_POST['orderwaiter']; 
	$varname = $_POST['ordername'];
	$varprice = $_POST['orderprice']; 
	$varcode= $_POST['ordercode'];
	$vartime = $_POST['ordertime'];
	$vartype = $_POST['ordertype'];
	$varchange = $_POST['varchange'];
	//$varquantity = $_POST['varquantity'];
	$varoldquantity = $_POST['oldorderquantity']; 

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

	if( $varcode === 'customcharges'){

		if($varchange == 'order'){
		
			echo "
			<div class = 'textt'>CHANGE ORDER
			DESCRIPTION : $varname	
			<form method='POST' action='changecorkage.php' target='iframe_c'>
			<input type='hidden' name ='id' value=$varid>
			SET NEW CUSTOM CHARGE<br>
			DESCRIPTION : <input class= 'tb' type='text' name='newdesc' required>
			<br>
			&nbsp&nbsp&nbsp&nbsp QUANTITY : <input class= 'tb' type='number' name='varnewquantity' value='1' required>
			<br>

			<!-- dbase names -->
	        <input type='hidden' name ='vardb' value='served_db'>
	        <input type='hidden' name ='vardbid' value='served_id'>
	        <input type='hidden' name ='vardbquantity' value='served_quantity'>
	        <input type='hidden' name ='vardbname' value='served_name'>
	        <input type='hidden' name ='vardbtable' value='served_table'>
	        <input type='hidden' name ='vardbcode' value='served_code'>
	        <input type='hidden' name ='vardbprice' value='served_price'>
	        <input type='hidden' name ='vardbwaiter' value='served_waiter'>
	        <input type='hidden' name ='vardbdate' value='served_date'>
	        <input type='hidden' name ='vardbtime' value='served_time'>
	        <input type='hidden' name ='vardbtype' value='served_type'> 
	        <input type='hidden' name ='vardbtotalprice' value='served_tprice'>
			<input type='hidden' name ='vardbpriority' value='served_priority'>	 
	        <!-- dbase names -->
			
			<input type='hidden' name='id' value='$varid'>
			<input type='hidden' name ='varoldquantity' value='$varoldquantity'>

			<input type='hidden' name ='varchange' value='$varchange'>

            <input type='hidden' name ='ordername' value='$varname'>
            <input type='hidden' name ='orderprice' value='$varprice'>
            <input type='hidden' name ='ordercode' value='$varcode'>
            <input type='hidden' name ='orderwaiter' value='$varwaiter'>
            <input type='hidden' name ='ordertable' value='$vartable'>
        	<input type='hidden' name ='ordertype' value='$vartype'>

			&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp PRICE : <input class= 'tb' type='number' name='newprice' required>
			<br>
			<input type='hidden' name ='orderid' value='$varid'>
			<input class = 'button'type='submit' name ='changecorkage' value='CHANGE'>
			<input  class = 'button3'type='submit' name = 'no' value='NO' >
			</form>";
		}else{

			echo "
			<div class = 'textt'>CHANGE ORDER
			DESCRIPTION : $varname	
			<form method='POST' action='changecorkage.php' target='iframe_c'>
			<input type='hidden' name ='id' value=$varid>
			SET NEW CUSTOM CHARGE<br>
			DESCRIPTION : <input class= 'tb' type='text' name='newdesc' required>
			<br>
			&nbsp&nbsp&nbsp&nbsp QUANTITY : <input class= 'tb' type='number' name='varnewquantity' value='1' required>
			<br>

			<!-- dbase names -->
	        <input type='hidden' name ='vardb' value='served_db'>
	        <input type='hidden' name ='vardbid' value='served_id'>
	        <input type='hidden' name ='vardbquantity' value='served_quantity'>
	        <input type='hidden' name ='vardbname' value='served_name'>
	        <input type='hidden' name ='vardbtable' value='served_table'>
	        <input type='hidden' name ='vardbcode' value='served_code'>
	        <input type='hidden' name ='vardbprice' value='served_price'>
	        <input type='hidden' name ='vardbwaiter' value='served_waiter'>
	        <input type='hidden' name ='vardbdate' value='served_date'>
	        <input type='hidden' name ='vardbtime' value='served_time'>
	        <input type='hidden' name ='vardbtype' value='served_type'> 
	        <input type='hidden' name ='vardbtotalprice' value='served_tprice'>
			<input type='hidden' name ='vardbpriority' value='served_priority'>	 
	        <!-- dbase names -->

	        <input type='hidden' name ='varoldquantity' value='$varoldquantity'>
	        <input type='hidden' name ='ordername' value='$varname'>
            <input type='hidden' name ='orderprice' value='$varprice'>
            <input type='hidden' name ='ordercode' value='$varcode'>
            <input type='hidden' name ='orderwaiter' value='$varwaiter'>
            <input type='hidden' name ='ordertable' value='$vartable'>
        	<input type='hidden' name ='ordertype' value='$vartype'>
	        <input type='hidden' name ='varchange' value='$varchange'>

			&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp PRICE : <input class= 'tb' type='number' name='newprice' required>
			<br>
			<input type='hidden' name ='orderid' value='$varid'>
			<input class = 'button'type='submit' name ='changecorkage' value='CHANGE'>
			<input  class = 'button3'type='submit' name = 'no' value='NO' >
			</form>";
		}	


	}else {
		   	$varoldquantity = $_POST['oldorderquantity']; 
			
			echo "
			<div class = 'textt'>CHANGE ORDER<br>
			DESCRIPTION : $varname
			<br>
			<div class='form'>
			<form method='POST' action='category.php' target='iframe_c'>

			<input type='hidden' name ='id' value=$varid>
			HOW MANY WOULD YOU LIKE TO CHANGE?
			<br>

			<input class= textbox type='number' style=' width: 80px;' class='form-control input-xs' name='neworderquantity' min='1' max='$varoldquantity'  value=$varoldquantity >

			<input type='hidden' name ='id' value='$varid'>
			<input type='hidden' name ='oldorderquantity' value='$varoldquantity'> 
			<input type='hidden' name ='ordername' value='$varname'>
			<input type='hidden' name ='orderprice' value='$varprice'>
			<input type='hidden' name ='ordercode' value='$varcode'>
			<input type='hidden' name ='orderwaiter' value='$varwaiter'>
			<input type='hidden' name ='ordertable' value='$vartable'>
			<input type='hidden' name ='ordertype' value='$vartype'>

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
		    <input type='hidden' name ='varchange' value='$varchange'>
		    <!-- dbase names -->
						
			<input class = button type='submit' class='btn btn-default btn-md' name ='change' value='CHANGE'>
			<input class = button3 type='submit' class='btn btn-default btn-md' name = 'no' value='NO' >
			<input class ='button2' type='checkbox' name='ordertype' value='Take Out' placeholder='TAKE OUT'/>TAKE OUT

		   	</form>
			</div>
			</div>
			<br>	

			<div class = 'textt'>CHANGE TABLE</div>";

			echo "
			<CENTER><table >
			<form method='POST' action='changetables/a.php' target ='iframe_c'> 
							   		
			<input type='hidden' name ='id' value='$varid'>

			<!-- dbase names -->
			<input type='hidden' name ='vardb' value='$vardb'>
			<input type='hidden' name ='vardbid' value='$vardbid'>
			<input type='hidden' name ='vardbtable' value='$vardbtable'>				   
			<!-- dbase names -->
			<input type='hidden' name ='varchange' value='$varchange'>

			<input  id = 'button'  type='submit' class='btn btn-warning btn-sm' name = 'change' value='A TABLES'>
			</form>

			<form method='POST' action='changetables/b.php' target ='iframe_c'> 
							   		
			<input type='hidden' name ='id' value='$varid'>

			<!-- dbase names -->
			<input type='hidden' name ='vardb' value='$vardb'>
			<input type='hidden' name ='vardbid' value='$vardbid'>
			<input type='hidden' name ='vardbtable' value='$vardbtable'>
			<!-- dbase names -->
			<input type='hidden' name ='varchange' value='$varchange'>

			<input id = 'button'  type='submit' class='btn btn-warning btn-sm' name = 'change' value='B TABLES'>
			</form>

			<form method='POST' action='changetables/c.php' target ='iframe_c'> 
							   		
			<input type='hidden' name ='id' value='$varid'>

			<!-- dbase names -->
			<input type='hidden' name ='vardb' value='$vardb'>
			<input type='hidden' name ='vardbid' value='$vardbid'>
			<input type='hidden' name ='vardbtable' value='$vardbtable'>
			<!-- dbase names -->
			<input type='hidden' name ='varchange' value='$varchange'>

			<input id = 'button'  type='submit' class='btn btn-warning btn-sm' name = 'change' value='C TABLES'>
			</form>
						
			<form method='POST' action='changetables/d.php' target ='iframe_c'> 
							   		
			<input type='hidden' name ='id' value='$varid'>

			<!-- dbase names -->
			<input type='hidden' name ='vardb' value='$vardb'>
			<input type='hidden' name ='vardbid' value='$vardbid'>
			<input type='hidden' name ='vardbtable' value='$vardbtable'>
			<!-- dbase names -->
			<input type='hidden' name ='varchange' value='$varchange'>

			<input id = 'button'  type='submit' class='btn btn-warning btn-sm' name = 'change' value='D TABLES'>
			</form>
			</table></CENTER>
			";				
		 }
}
?>
</div>


</body>
</html>

