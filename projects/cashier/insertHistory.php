
	<?php
		include 'db.php';

		$query = "insert into transaction_History (transacH_time, transacH_date, transacH_table, transacH_cash, transacH_card, transacH_total, transacH_change) 
					select transac_time, transac_date, transac_table, transac_cash, transac_card, transac_total, transac_change
						from transaction;";
		
		$query .= "Delete from transaction;";
		
		$query .= "insert into charge_history (chargedid_history, chargedcode_history, chargedtable_history, chargedwaiter_history, chargedtime_history, chargeddate_history, chargedquantity_history,
					chargedname_history, chargedprice_history, chargedtype_history, chargedtprice_history, chargedpriority_history)
						select * from charge_db;";
			
		$query .= "Delete from charge_db;";
		
		$query .= "insert into waitercomm_history (itemcomm_history, itemtype_history, time_history, date_history, waitername_history, iname_history)
						select item_comm, item_type, time, date, waiter_name, i_name  from waiter_commission;";
			
		$query .= "Delete from waiter_commission;";
		
		$query .= "insert into item_histroy (itemH_name, itemH_qty, itemH_date)
					select  paid_name, paid_quantity, CURDATE() - INTERVAL 1 DAY from paid_db";
					
		$result = mysqli_multi_query($conn, $query) or die (mysql_error());
		
		if($result){												
			echo
				("<SCRIPT LANGUAGE='JavaScript'>
				window.alert('CLOSED!')
				window.location.href='a.php';
				</SCRIPT>");
		}
		mysqli_close($conn);
	?>