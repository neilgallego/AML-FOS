

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
    height:30px; 
    width: 250px; 
    font-size: 22px;
    -webkit-appearance: none;
    margin: 0;
}
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

	<div>
<?php
session_start();
error_reporting(0);
$waiter = $_SESSION['varname'];
$table = $_SESSION['varname2'];

echo "
<div class = 'textt'>
ADDITIONAL CHARGES
<br>
Table :  $table
<br>
Waiter : $waiter
</div>
<form class = 'form' action ='insertcustomcharges.php' method='post'>
	<div class = 'textt' >ENTER CUSTOM CHARGES
	<br>
	DESCRIPTION: <input class = 'textbox' type='text' name='newdesc' placeholder='Enter Description' required>
	<br>
   &nbsp&nbsp&nbsp&nbsp&nbsp QUANTITY: <input class = 'textbox' type='number' name='customchargequantity' placeholder='Quantity' value ='1' required>
    <br>
	&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp AMOUNT: <input  class = 'textbox'  type='number' name='newvalue' placeholder='Enter Amount' required>
	<br>
	<input class = button type='submit' name='charge' value = 'SUBMIT' >
	<input class = button3 type='submit' name='no' value = 'CANCEL' >
	</div>
</form>
";

?>
<div>

</body>
</html>
