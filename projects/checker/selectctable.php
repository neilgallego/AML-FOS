<!DOCTYPE html>
<html>
<head>
	<title></title>

	<style type="text/css">
    #button {
    background-color: #4CAF50;
    border: none;
    color: white;
    text-align: center;
    text-decoration: none;
    font-size: 20px;
    height: 100px;
    width: 200px;
    position: relative;
    margin: 0;
}
    </style>
</head>
<body>

<?php


echo "<CENTER><div><h1>CHANGE TABLE</h2></div></CENTER>
";

$varid = $_POST['servedid'];

echo "
<CENTER><table >
	<form method='POST' action='changetables/a.php' target ='iframe_c'> 
		   		
		   		<input type='hidden' name ='servedid' value='$varid'>

		   		<input  id = 'button'  type='submit' class='btn btn-warning btn-sm' name = 'change' value='A TABLES'>
		   		</form>
	<form method='POST' action='changetables/b.php' target ='iframe_c'> 
		   		
		   		<input type='hidden' name ='servedid' value='$varid'>

		   		<input id = 'button'  type='submit' class='btn btn-warning btn-sm' name = 'change' value='B TABLES'>
		   		</form>

	<form method='POST' action='changetables/c.php' target ='iframe_c'> 
		   		
		   		<input type='hidden' name ='servedid' value='$varid'>

		   		<input id = 'button'  type='submit' class='btn btn-warning btn-sm' name = 'change' value='C TABLES'>
		   		</form>
	<form method='POST' action='changetables/d.php' target ='iframe_c'> 
		   		
		   		<input type='hidden' name ='servedid' value='$varid'>

		   		<input id = 'button'  type='submit' class='btn btn-warning btn-sm' name = 'change' value='D TABLES'>
		   		</form>
</table></CENTER>
";

	
?>
</body>
</html>

