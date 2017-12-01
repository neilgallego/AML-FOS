
	<?php
		include 'db.php';


		$query = "insert into transaction (transac_time, transac_date, transac_table, transac_cash, transac_card, transac_total) 
					select now(), curdate(), table_no,cash_rcvd, transac_no, total_bill
						from billing where table_no like 'B%';";
		
		$query .= "update `transaction` set `transac_change` = `transac_cash` - `transac_total` where transac_card='';";
													
																
		$query .= "Delete from billing where table_no like 'B%'";	
				
		$result = mysqli_multi_query($conn, $query) or die (mysql_error());
		
		if($result){												
			echo
				("<SCRIPT LANGUAGE='JavaScript'>
				 window.alert('Transaction Complete!')
				 window.location.href='b.php';
				</SCRIPT>");
		}
	?>