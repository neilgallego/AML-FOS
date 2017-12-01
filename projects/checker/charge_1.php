<?php
    session_start();
	require_once 'dbconfig.php';


	if (!isset($_GET['ch1'])){
		exit;
	}
	
	$id1 = $_GET['ch1'];
	$wtr1 = $_SESSION['varname'];
	$sql = "UPDATE served_db set served_waiter='$wtr1', served_priority='1' where served_code = $id1";
	if ($con->query($sql) === TRUE) {
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
	
	/**$sql3 = "DELETE FROM order_db WHERE order_id = $id";
	if ($con->query($sql3) === TRUE) {
		//header("Location: /amlfos/amlfos/checker/prototype2/prototype2/augment/apply/order_queue.php");
	} else {
		echo "Error deleting record: " . $con->error;
	}**/
	
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