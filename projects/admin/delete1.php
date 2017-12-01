<?php
$con=mysqli_connect("localhost", "root", "", "aml_db");
// Check connection
if (mysqli_connect_errno()) {
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$table_id = $_GET['table_id']; // $id is now defined

// or assuming your column is indeed an int
// $id = (int)$_GET['id'];

mysqli_query($con,"DELETE from table_db  WHERE table_id = '".$table_id."'");
mysqli_close($con);
header("Location: tables.php");
?> 