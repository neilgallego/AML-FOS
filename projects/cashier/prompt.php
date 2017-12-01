	

<?php

	include 'db.php';
		
	$query = "SELECT username , password, position, status FROM users where position='Admin' AND status='Active'";
		
	$result = mysqli_query($conn, $query) or die (mysql_error());
	
	if($result){
		$row = mysqli_fetch_array($result);
			$pass = $row['password'];
			echo
				("<SCRIPT LANGUAGE='JavaScript'>
					var pass = prompt('Please enter password for authorization', '');
					if (pass != null && pass == $pass) {
						window.location.href='insertHistory.php';
					}else{
						alert('Authorization denied!');
						window.location.href='a.php';
					}
				</SCRIPT>");
		
	}else
		die('Could not get data from database : ' . mysql_error());
	
	mysqli_close($conn);

	?>