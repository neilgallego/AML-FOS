<?php
	require_once 'dbconfig2.php';

	if (!isset($_GET['id'])){
		exit;
	}
	
	$id = $_GET['id'];
	
	$sql = "insert into paid_db (paid_id,paid_code, paid_table,paid_waiter,paid_time,paid_date,paid_quantity,paid_name,paid_price,paid_type,paid_tprice)
	select served_id,served_code,served_table,served_waiter,now(),served_date,served_quantity,served_name,served_price,served_type,served_tprice
	from served_db where served_id = $id";
	if ($con->query($sql) === TRUE) {
		//header("Location: b.php");
	} else {
		echo "Error recording record: " . $con->error;
	}
	
	/**$sql2 = "insert into notification (idProducts,dateadded,iduser,message,deletionDate) select idProducts,dateadded,iduser,'Your product has been deleted because of some violations. Please review the website POLICIES. You have TWO WEEKS to file a complaint before the PERMANENT DELETION of your product.',date_add(now(), interval 14 day) from products where idProducts = $id";
	if ($con->query($sql2) === TRUE) {
		echo "Recorded uccessfully";
	} else {
		echo "Error recording record: " . $con->error;
	}**/
	
	$sql3 = "DELETE FROM served_db WHERE served_id = $id";
	if ($con->query($sql3) === TRUE) {
		//header("Location: b.php");
	} else {
		echo "Error deleting record: " . $con->error;
	}
	
	$con->close();
?>