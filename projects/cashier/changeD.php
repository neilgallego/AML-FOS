	<?php
		include 'db.php';	
		include 'd.php';	
				
		$query = "SELECT * FROM billing where bill_id = 0";
		$change = 0;
		$result = mysqli_query($conn, $query);									
		
		if($result){									
			$row = mysqli_fetch_array($result);
			$change = $row['change'];												

		}else{
			printf("Errormessage: %s\n", mysqli_error($conn));
		}
				
		echo
			("<SCRIPT LANGUAGE='JavaScript'>
				alert ('TOTAL CHANGE IS: ₱ $change');
				window.location.href='insertTransD.php';
			</SCRIPT>");
	?>
			
			
									
													
												
														
														
												