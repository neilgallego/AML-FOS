<?php  
	$conn = mysqli_connect('localhost', 'root', '', "aml_db" );
	 if (!$conn){
	 	
	 die('Could not connect: ' . mysqli_error());
	}

	/*$sel = mysqli_select_db("register", $conn);
	if(!$sel)
	{
	die('Could not select: ' . mysqli_error());
}*/

?>

