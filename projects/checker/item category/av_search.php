<!DOCTYPE html> 
<html> 
<link rel="stylesheet" href="../../bootstrap-3.3.7/dist/css/bootstrap.min.css">
<script src="../../bootstrap-3.3.7/dist/js/jquery-3.2.1.min.js"></script>
<script src="../../bootstrap-3.3.7/dist/js/bootstrap.min.js"></script>
 <body style=" background-color :white">
 <div>
	<div>
	<div style="position:fixed; left:300px;">
  <form action="item category/av_search.php" target="iframe_5" method="post"> 
    <input type="text"  name="term" placeholder="Name or Code..." style="width: 130px; top:0px; ">
    <input type="submit"  value="Search" style="position:absolute; top:0px; left:120px;" />  
    </form>
</div>

<form action="default.php" method="post">
		<label class="heading">Select a dish/drink to Enable/Disable:</label><br/><br/>
		<table  class="table table-hover table-condensed table-striped" align="center" border="0">
		<tr>
		<th>Dish/Drink</th><th>Status</th>
		</tr>
		<tr>
		<?php
        $connection=mysqli_connect("localhost","root","","aml_db");
    // Check connection
    if (mysqli_connect_errno())
      {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }

    $result = mysqli_query($connection,"SELECT * FROM menu_db where code  LIKE '%".$_POST["term"]."%' OR name LIKE '%".$_POST["term"]."%'");

    while($row = mysqli_fetch_array($result))
    {
		$ia = $row['item_availability'];
		/**if($ia == "available"){
			echo "<font color=\"008000\">"; 
		}else{
			if($ia == "not available"){
			echo	"<font color=\"FF0000\">"; 
			}
		}**/
       ?>
	   <tr>
	   <td>
		
		<input type="checkbox" name="check_list[]" value="<?php echo $row['name']; ?>"><b><?php echo $row['name']; ?></b><br/>
		
		</td>  
		
		<td>
		
		<b><?php echo $ia;?></b>
		
		</td>
		</tr>
		   <?php
}
    ?>
	
	</table>
	<div style="position: fixed; bottom:2.5%; width:100%;">
        <center>
		<input type="submit" name="activate" Value="Available"/>
		<input type="submit" name="deactivate" Value="Not Available"/>
		</center>
		</div>
		<!-----Including PHP Script----->
		<?php include '../update_availability.php';?>
		</form>



	
	</div>
	

 </div>
</body>
</html>
