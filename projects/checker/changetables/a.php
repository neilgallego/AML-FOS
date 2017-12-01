<?php
 require_once('dbconfig.php');

?>
<!DOCTYPE html>
<html>
<link rel="stylesheet" href="bootstrap/bootstrap-3.3.7/dist/css/bootstrap.min.css">
<script src="bootstrap/bootstrap-3.3.7/dist/js/jquery-3.2.1.min.js"></script>
<script src="bootstrap/bootstrap-3.3.7/dist/js/bootstrap.min.js"></script>

<script>
function showDiv() {
    document.getElementById('option').style.display = "block";
}

</script>
<style>
body {
	background-color: #dadee5; 
}
.blank_row
{
    height: 10px !important; /* overwrites any other rules */
    background-color: #FFFFFF;
}
table 
{
	empty-cells: show;
	 border-collapse: separate;
  border-spacing: 35px 35px;
}
</style>


<div name="table_list">
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
		$query = "SELECT table_id,table_name,table_column 
						 FROM table_db where table_column ='A'";
		$result = mysqli_query( $connection , $query );
		if(! $result){
			die('Could not get data from database : ' . mysql_error() );
		}
		$vartableid = '';
		$varletter = '';
		$vartablename = '';
		$varwaitername = '';
		$varwaiterid = '';
		

		$varid = $_POST['id'];

		//dbnames
		$vardb = $_POST['vardb'];
		$vardbid = $_POST['vardbid'];
		$vardbtable = $_POST['vardbtable'];
		$varchange = $_POST['varchange'];
		
	 	while($tables = mysqli_fetch_array($result , MYSQL_NUM)){

		 $varhash = '#';
         $varmodal = 'myModal';
         $vartableid = $tables[0];
         $vartablename = $tables[1];
         $varletter = $tables[2];
         
		   echo	"<td>

		   <form method ='post' action = '../changetableauth.php'>

		   <input type='hidden' name ='id' value='$varid'>

		   <!-- dbase names -->
		   <input type='hidden' name ='vardb' value='$vardb'>
		   <input type='hidden' name ='vardbid' value='$vardbid'>
		   <input type='hidden' name ='vardbtable' value='$vardbtable'>
		   <!-- dbase names -->
		
			<input type='hidden' name ='varchange' value='$varchange'>
			
		   <input type='submit' class='btn btn-warning btn-lg' 
		    name='newtable' value=' $vartablename'>

			<form>
		   </td>";
		   }
       ?>	

</div>  

		</div>
	</div>	  
    </tr>
			</table>
 </div>	<!-- end of div modal-->	

</body>
</html>



