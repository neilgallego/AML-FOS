

<?php

	include 'db.php';
		
	$query = "SELECT COUNT(*) FROM `served_db`"; 
	
	$result = mysqli_query($conn, $query) or die (mysql_error());
	$row=mysqli_fetch_row($result);
	$cnt = $row[0];

	if($result){
		if($cnt != 0){
			echo
				("<SCRIPT LANGUAGE='JavaScript'>
				 window.alert('WARNING! THERE ARE STILL TABLES TO BE BILLED OUT!!!')
				 window.location.href='a.php';
				</SCRIPT>");
		}else{
			include 'prompt.php';
		}
	}else
		die('Could not get data from database : ' . mysql_error());

?>

