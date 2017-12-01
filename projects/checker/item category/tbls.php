
<!DOCTYPE html>
<html>
<head>
	<title>
		Tables
	</title>

	 <meta charset="utf-8">
	 <meta name="viewport" content="width=device-width, initial-scale=1">
	  
	<link rel="stylesheet" href="../../bootstrap-3.3.7/dist/css/bootstrap.min.css">
	<script src="../../bootstrap-3.3.7/dist/js/jquery-3.2.1.min.js"></script>
	<script src="../../bootstrap-3.3.7/dist/js/bootstrap.min.js"></script>

	<style>
		.blank_row
		{
			height: 10px !important; /* overwrites any other rules */
			background-color: #FFFFFF;
		}
		body {
			background-color:#c6c6c6;
		}
		table 
		{
			empty-cells: show;
			 border-collapse: separate;
		  border-spacing: 35px 35px;
		} 
	</style>
</head>

<body width="50px" style="position: relative;">
<div name="table_list" style="position: relative; float:left;">
	<table align="center">
		<tr>	
		<?php
		$dbhost = 'localhost';
		$dbuser = 'root';
		$dbpass = '';
		$connection = mysqli_connect($dbhost,$dbuser,$dbpass,'aml_db');

		if(! $connection){
			die('Could not Connect to Database' . mysql_error());
		}
		if(!isset($_GET['cat'])){
			echo "something.";
		}else{
		$query = "SELECT table_name,table_column 
						 FROM table_db where table_column ='".$_GET["cat"]."' ";

		$result = mysqli_query( $connection , $query );

		if(! $result){
			die('Could not get data from database : ' . mysql_error() );
		}

	 	while($row = mysqli_fetch_array($result)){

		extract($row);
           ?>
		   
<td id="tbname" style="float:left; padding-left: 10px; padding-right: 10px; padding-top: 10px; padding-bottom: 10px;">

 <input  data-toggle="modal" data-target="#clickTable"  type="button" class="butt btn btn-danger btn-lg" id="lol" name="tbbutton" value="<?php echo $table_name;?>" style="padding-left: 10px; padding-right: 10px;" 
 </td>

 <div class="modal fade" id="clickTable" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content" style="width:100%;">
  		<div id="thebutton"><center>
		<h2>Select a Waiter: </h2>
		<br>
			
					  <table>
					  <tr>
					  <td style="float:left; padding-left: 10px; padding-right: 10px; padding-top: 10px; padding-bottom: 10px;">
					  <?php
			  $query = mysqli_query($connection,'SELECT waiter, date from assigned_waiters where date = CURRENT_DATE');
				while($row=mysqli_fetch_array($query))
				{
				  extract($row);
				  ?>
						<input style="padding-left: 10px; padding-right: 10px;"  type="button" class="wbutton btn btn-primary btn-lg" name="waiters" id="myselect" onclick="dothis()" value="<?php echo $waiter; ?>" >
					  	  <?php
				}
			?>
					  </td>
					   
					    
						</tr>
						</table>
			                 
		</div>
<script>
	$( ".wbutton").click(function(){
			 $.post('test.php', 'val=' + $(this).val());
	})
</script>
<script>
	$( "#thebutton" ).change(function()
	{
			$.post('test.php', 'val=' + $('input:radio[name=waiters]:checked').val(), function (response) {
		
	   });
	})
</script>
           

        <div class="modal-footer" style="height: 10px;">

        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
     						
</div>  

<div> <!-- start of div modal-->  

 <?php
	
     }   
		}
	mysqli_close($connection);
    ?>
	
    </tr>
			</table>
 </div>	<!-- end of div modal-->	
<script>
	$( ".butt" ).click(function()
	{
			$.post('../tb.php', 'val2=' + $(this).val(), function (response) {
		
			});
			
			
	})
</script>
<script>
function dothis() {
window.location='../view.php';
		
}
</script>
 
</body>
</html>