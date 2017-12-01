<?php
	$dbhost = 'localhost';
		$dbuser = 'root';
		$dbpass = '';
		$connection = mysqli_connect($dbhost,$dbuser,$dbpass,'aml_db');

		if(! $connection){
			die('Could not Connect to Database' . mysql_error());
		}

		$query = "SELECT waiter_name, waiter_comm from waiter_commission GROUP BY waiter_name";

		$result = mysqli_query( $connection , $query );

		if(! $result){
			die('Could not get data from database : ' . mysql_error() );
		}
	 
	 echo "
	 <table class='table table-striped table-hover' id='dataTables-example'>
        <tbody style='text-align: center;'><tr style=background-color:#C0C0C0;font-family:Open Sans;>
			<th style=text-align:center;width:40%;> WAITER </th>
			<th style=text-align:right;> TOTAL </th>
		</tr>";

	$varname= '';
	$varcolumn = '';
	$index = 0;
	$result_array = array();

	$array  = array();
	$count = 0;
	
	while($row = mysqli_fetch_array($result)){
		 $varname = $row[0];

		       echo '<tr>';
					echo'	<td><input id="'. $varname .'" type="button" class="btn btn-lg btn-default" data-toggle="modal" data-target="#myModal'.$varname.'"  style="margin-right:1%;margin-top:1%;"  onclick="showDiv()" value="'.$varname.'"></td>';
					echo '<td style=text-align:right;>'  . $row['sum'] . '</td>';
				echo '</tr>';
		

	}

		echo "</tbody>
		</table>";
		
	mysqli_close($connection);
?>
