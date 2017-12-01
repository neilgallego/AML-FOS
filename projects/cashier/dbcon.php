<?php



$conn = mysqli_connect('localhost', 'root', '', "aml_db" );
	 if (!$conn){
	 	
	 die('Could not connect: ' . mysqli_error());
	}
?>