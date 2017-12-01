<?php
	require_once 'dbconfig.php';

	if (!isset($_GET['id'])){
		exit;
	}
	
	$id = $_GET['id'];
	
	$sql = "insert into served_db (served_id,served_code, served_table,served_waiter,served_time,served_date,served_quantity,served_name,served_price,served_type,served_tprice,served_priority)
	select order_id,order_code,order_table,order_waiter,now(),order_date,order_quantity,order_name,order_price,order_type,order_tprice, order_priority
	from order_db where order_id = $id";
	if ($con->query($sql) === TRUE) {
		//header("Location: /amlfos/amlfos/checker/prototype2/prototype2/augment/apply/order_queue.php");
	} else {
		echo "Error recording record: " . $con->error;
	}
	
	$sql3 = "DELETE FROM order_db WHERE order_id = $id";
	if ($con->query($sql3) === TRUE) {
		//header("Location: /amlfos/amlfos/checker/prototype2/prototype2/augment/apply/order_queue.php");
	} else {
		echo "Error deleting record: " . $con->error;
	}
	
	$con->close();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="refresh" content="0; url=order_queue.php" />
	</head>
	
	<body>
	</body>
</html>