<?php
	include('dbcon.php');



	if (isset($_POST['delete'])){

		$id=$_POST['selector'];

		$N = count($id);
		for($i=0; $i < $N; $i++){
			
				
			$query = "DELETE FROM served_db where served_id='$id[$i]'";

			$result = mysqli_query($conn, $query) or die (mysql_error());
		}

		$query = "insert into transaction (transac_time, transac_date, transac_table, transac_cash, transac_total) VALUES (now(), curdate(),'OnTheHouse', 0, 0);";
				
		$result = mysqli_query($conn, $query) or die (mysql_error());
			echo
			("<SCRIPT LANGUAGE='JavaScript'>
			 window.alert('Transaction Complete!')
			
			</SCRIPT>");
		header('Location:a.php');
		
		
	}
?>
