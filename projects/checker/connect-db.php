<?php
/* 
 CONNECT-DB.PHP
 Allows PHP to connect to your database
*/

 // Database Variables (edit with your own server information)
 
 // Connect to Database
 $connection = mysqli_connect('localhost', 'root', '','aml_db'); 
 if (!$connection) {
	 die ("Could not connect to server ... \n" . mysql_error ());
 }

?>