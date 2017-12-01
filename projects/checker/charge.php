<?php
    session_start();
	require_once 'dbconfig.php';


	if (!isset($_GET['ch'])){
		exit;
	}
	
	$id = $_GET['ch'];
	$wtr = $_SESSION['varname'];
	$sql = "UPDATE served_db set served_waiter='$wtr', served_priority='1' where served_id = $id";
	if ($con->query($sql) === TRUE) {
		//header("Location: /amlfos/amlfos/checker/prototype2/prototype2/augment/apply/order_queue.php");
	} else {
		echo "Error recording record: " . $con->error;
	}
	
	
	$sql2 = "insert into order_db (order_id,order_code, order_table,order_waiter,order_time,order_date,order_quantity,order_name,order_price,order_type,order_tprice,order_priority)
	select served_id,served_code,served_table,served_waiter,now(),served_date,served_quantity,served_name,served_price,served_type,served_tprice, served_priority
	from served_db where served_id = $id";
	if ($con->query($sql2) === TRUE) {
		//header("Location: /amlfos/amlfos/checker/prototype2/prototype2/augment/apply/order_queue.php");
	} else {
		echo "Error recording record: " . $con->error;
	}
	
	$sql3 = "insert into charge_db (charged_id,charged_code, charged_table,charged_waiter,charged_time,charged_date,charged_quantity,charged_name,charged_price,charged_type,charged_tprice,charged_priority)
	select served_id,served_code,served_table,served_waiter,now(),served_date,served_quantity,served_name,served_price,served_type,served_tprice, served_priority
	from served_db where served_id = $id";
	if ($con->query($sql3) === TRUE) {
		//header("Location: /amlfos/amlfos/checker/prototype2/prototype2/augment/apply/order_queue.php");
	} else {
		echo "Error recording record: " . $con->error;
	}
	/**$sql2 = "insert into notification (idProducts,dateadded,iduser,message,deletionDate) select idProducts,dateadded,iduser,'Your product has been deleted because of some violations. Please review the website POLICIES. You have TWO WEEKS to file a complaint before the PERMANENT DELETION of your product.',date_add(now(), interval 14 day) from products where idProducts = $id";
	if ($con->query($sql2) === TRUE) {
		echo "Recorded uccessfully";
	} else {
		echo "Error recording record: " . $con->error;
	}**/
	
	$sql4 = "DELETE FROM served_db WHERE served_id = $id";
	if ($con->query($sql4) === TRUE) {
		//header("Location: /amlfos/amlfos/checker/prototype2/prototype2/augment/apply/order_queue.php");
	} else {
		echo "Error deleting record: " . $con->error;
	}
	
	$con->close();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="refresh" content="0; url=/checker/served.php" />
	</head>
	
	<body>
	</body>
</html>