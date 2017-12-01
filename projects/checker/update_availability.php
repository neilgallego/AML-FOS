<?php

      $connection=mysqli_connect("localhost","root","","aml_db");
    // Check connection
    if (mysqli_connect_errno())
      {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }
	  
	if(isset($_POST['activate'])){
	if(!empty($_POST['check_list'])) {
	
	
	
	//Loop to store and display values of individual checked checkbox
		foreach($_POST['check_list'] as $selected) {
				$sql = "UPDATE menu_db SET item_availability= 'available' WHERE name='".$selected."'";
	if ($connection->query($sql) === TRUE) {
		
		
	} else {
		echo "Error recording record: " . $connection->error;
	}
				
		}
	echo "<script>

window.location.href='default.php';
</script>";
	}
	/**else{
		
	echo "<b>Please Select Atleast One Option.</b>";
	}**/
}else {//deactivate
	if(isset($_POST['deactivate'])){
	if(!empty($_POST['check_list'])) {
	
	
	
	//Loop to store and display values of individual checked checkbox
		foreach($_POST['check_list'] as $selected) {
				$sql = "UPDATE menu_db SET item_availability= 'not available' WHERE name='".$selected."'";
	if ($connection->query($sql) === TRUE) {
		
		
	} else {
		echo "Error recording record: " . $connection->error;
	}
				
		}
echo "<script>

window.location.href='default.php';
</script>";
	}
}
}
?>