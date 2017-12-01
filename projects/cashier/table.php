<?php
	$dbhost = 'localhost';
	$dbuser = 'root';
	$dbpass = '';
	$connection = mysqli_connect($dbhost,$dbuser,$dbpass,'aml_db');

	if(! $connection){
		die('Could not Connect to Database' . mysql_error());
	}

	$query = "SELECT table_name,table_column FROM table_db where table_column ='A' ORDER BY table_name";

	$result = mysqli_query( $connection , $query );

	if(! $result){
		die('Could not get data from database : ' . mysql_error() );
	}

	$varletter = '';
	$varcolumn = '';
	$index = 0;
	$result_array = array();

	$array  = array();
	$count = 0;
	
	while($row = mysqli_fetch_array($result)){
		
		 $varhash = '#';
		 $varmodal = 'myModal';
		 $varcolumn = $row[0];
		 $varletter = $row[1];
		 
		 $tablemodal = $varmodal.$varcolumn;
		 
		echo'<td><input id="'. $varcolumn .' " type="button" class="btn btn-danger btn-lg" data-toggle="modal" data-target=" '. $varhash.$varmodal.$varcolumn .' "  style="margin-right:1%;margin-top:1%;"  onclick="showDiv()" value="'. $varcolumn .'"></td>';
 
	}


	mysqli_close($connection);
?>
