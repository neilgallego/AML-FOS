<link rel="stylesheet" href="..//bootstrap-3.3.7/dist/css/bootstrap.min.css">
<script src="..//bootstrap-3.3.7/dist/js/jquery-3.2.1.min.js"></script>
<script src="..//bootstrap-3.3.7/dist/js/bootstrap.min.js"></script>

<?php
        $connection=mysqli_connect("localhost","root","","aml_db");
    // Check connection
    if (mysqli_connect_errno())
      {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }
	   $result = mysqli_query($connection,"SELECT id, firstname FROM waiter_db ORDER BY firstname ASC");
	   $result2= mysqli_query($connection,"SELECT id, firstname FROM waiter_db ORDER BY firstname ASC");
	   $result3 = mysqli_query($connection,"SELECT id, firstname FROM waiter_db ORDER BY firstname ASC");
	   $result4 = mysqli_query($connection,"SELECT id, firstname FROM waiter_db ORDER BY firstname ASC");

?>



<!DOCTYPE html>
<html>
<center>
<h1>ASSIGN WAITERS</h1>
	<div>
					<form action="" name="assigned" method="POST">
					<!--1-->
	Waiter 1: <select name="waiter1">
				<option value=""></option>
<?php
	while($row = mysqli_fetch_array($result))
    {
						?>		

						<option value="<?php echo $row['firstname']; ?>"> <?php echo $row['firstname']; ?></option>
					
	<?php
}
    ?>
</select>


<!--2-->
				Waiter 2: <select name="waiter2">
				<option value=""></option>
<?php
	while($row2 = mysqli_fetch_array($result2))
    {
						?>		

						<option value="<?php echo $row2['firstname']; ?>"> <?php echo $row2['firstname']; ?></option>
					
	<?php
}
    ?>
</select>

<!--3-->
				Waiter 3: <select name="waiter3">
				<option value=""></option>
<?php
	while($row3 = mysqli_fetch_array($result3))
    {
						?>		

						<option value="<?php echo $row3['firstname']; ?>"> <?php echo $row3['firstname']; ?></option>
					
	<?php
}
    ?>
</select>

<!--4-->
				Waiter 4: <select name="waiter4">
				<option value=""></option>
<?php
	while($row4 = mysqli_fetch_array($result4))
    {
						?>		

						<option value="<?php echo $row4['firstname']; ?>"> <?php echo $row4['firstname']; ?></option>
					
	<?php
}
    ?>

</select>

<br>
<br>
<br>
<br>
<input id="conf" type="submit" name="submit" value="Confirm" class="btn btn-warning btn-lg">
</form>
				</div>
<script>	
	$(document).ready(function()
 {
     $("#conf").button().click(function()
     {
         $.modal.close();
     }); 
 });			
</script>				
</html>
<?php
if(isset($_POST["submit"])){

$uid = 0;
$waiter1 = $_POST['waiter1'];
$waiter2 = $_POST['waiter2'];
$waiter3 = $_POST['waiter3'];
$waiter4 = $_POST['waiter4'];
//1
$sql = "UPDATE assigned_waiters 
SET waiter='".$waiter1."',time=NOW(), date=NOW() where d_id=0;";
//2
$sql .= "UPDATE assigned_waiters 
SET waiter='".$waiter2."' ,time=NOW(), date=NOW() where d_id=1;";
//3
$sql .= "UPDATE assigned_waiters 
SET waiter='".$waiter3."' ,time=NOW(), date=NOW() where d_id=2;";
//4
$sql .= "UPDATE assigned_waiters 
SET waiter='".$waiter4."' ,time=NOW(), date=NOW() where d_id=3";
$chk = NULL;
if(empty($waiter1)){
			$errMSG = "error!";
		}
		else if(empty($waiter2)){
			$errMSG = "error!";
			
		}
		else if(empty($waiter3) && empty($waiter4)){
			$sql = "UPDATE assigned_waiters 
SET waiter='".$waiter1."',time=NOW(), date=NOW() where d_id=0;";
//2
$sql .= "UPDATE assigned_waiters 
SET waiter='".$waiter2."' ,time=NOW(), date=NOW() where d_id=1;";
//3
$sql .= "UPDATE assigned_waiters 
SET waiter=NULL ,time=NULL, date=NULL where d_id=2;";
//4
$sql .= "UPDATE assigned_waiters 
SET waiter=NULL ,time=NULL, date=NULL where d_id=3";
		}else if(empty($waiter3)){
			$sql = "UPDATE assigned_waiters 
SET waiter='".$waiter1."',time=NOW(), date=NOW() where d_id=0;";
//2
$sql .= "UPDATE assigned_waiters 
SET waiter='".$waiter2."' ,time=NOW(), date=NOW() where d_id=1;";
//3
$sql .= "UPDATE assigned_waiters 
SET waiter=NULL ,time=NULL, date=NULL where d_id=2;";
//4
$sql .= "UPDATE assigned_waiters 
SET waiter='".$waiter4."' ,time=NOW(), date=NOW() where d_id=3";
		}else if(empty($waiter4)){
			$sql = "UPDATE assigned_waiters 
SET waiter='".$waiter1."',time=NOW(), date=NOW() where d_id=0;";
//2
$sql .= "UPDATE assigned_waiters 
SET waiter='".$waiter2."' ,time=NOW(), date=NOW() where d_id=1;";
//3
$sql .= "UPDATE assigned_waiters 
SET waiter='".$waiter3."' ,time=NOW(), date=NOW() where d_id=2;";

//4
$sql .= "UPDATE assigned_waiters 
SET waiter=NULL ,time=NULL, date=NULL where d_id=3";
		}
		
// if no error occured, continue ....
		   if(!isset($errMSG))
		{
			
			if (mysqli_multi_query($connection, $sql)) {
    echo "New records created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($connection);
}
			
		}		


}

?>