<!DOCTYPE html>

<?php
	 session_start();
	 if(!isset($_SESSION['username']))
		 header("location: ../index.php");
?>

<?php
	include_once 'db.php';
?>
	
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	    <meta charset="utf-8" />
	    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	    <meta name="description" content="cashier">
		<meta name="author" content="Cynlai Osorio, Princes Criste">

	
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


	    <title>CASHIER</title>

	    <!-- BOOTSTRAP STYLES-->
        <link href="assets/css/bootstrap.css" rel="stylesheet" />
         <!-- FONTAWESOME STYLES-->
        <link href="assets/css/font-awesome.css" rel="stylesheet" />
         <!-- MORRIS CHART STYLES-->
   
        <!-- CUSTOM STYLES-->
        <link href="assets/css/custom.css" rel="stylesheet" />
	     <!-- GOOGLE FONTS-->
	    <link href='assets/css/fontt.css' rel='stylesheet' type='text/css' />
        <!-- TABLE STYLES-->
        <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
		
		<style>
			.reveal-if-active {
			  opacity: 0;
			  max-height: 0;
			  overflow: hidden;
			}
			
			input[type="radio"]:checked ~ .reveal-if-active,
			input[type="checkbox"]:checked ~ .reveal-if-active {
			  opacity: 1;
			  max-height: 100px; /* little bit of a magic number :( */
			  overflow: visible;
			}
			
			.reveal-if-active {
			  opacity: 0;
			  max-height: 0;
			  overflow: hidden;
			  transform: scale(0.8);
			  transition: 0.5s;
			  input[type="radio"]:checked ~ &,
			  input[type="checkbox"]:checked ~ & {
				opacity: 1;
				max-height: 100px;
				overflow: visible;
				padding: 10px 20px;
				transform: scale(1);
			  }
			}
			

		</style>
	</head>
	
	<body>
		<div id="wrapper">
			<nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand"><small><span class="glyphicon glyphicon-shopping-cart" style="size:10%"></span></small>CASHIER</a> 
				</div>
				<div style="color: white;padding: 15px 50px 5px 50px;float: right;font-size: 16px;">
					<?php date_default_timezone_set("Asia/Manila"); 
						  echo $today = date("F j, Y g:i A");?> 
					&nbsp; <a href="logout.php" class="btn btn-danger square-btn-adjust">Logout</a> 
				</div>
			</nav>  

           <!-- /. NAV TOP  -->
            <nav class="navbar-default navbar-side" role="navigation">
				<div class="sidebar-collapse">
					<ul class="nav" id="main-menu">
						<li>
							<img src="assets/img/logoo.png" class="user-image img-responsive"/>
						</li>
						<li style="font-size: 16px;">
							<a><i class="fa fa-sitemap fa-2x"></i> BILLING <span></span></a>
							<ul class="nav nav-second-level">
								<li>
								   <a href="a.php"> A Tables </a>
								</li>
								<li>
									<a href="b.php">B Tables</a>
								</li>
								<li>
									<a href="c.php">C Tables</span></a>
								</li>
								<li>
									<a href="d.php">D Tables</span></a>
								</li>
								<li>
									<a href="s.php">BAR</span></a>
								</li>
							</ul>
						</li>  
						<li style="font-size: 16px;">
							<a><i class="fa fa-users fa-2x"></i>WAITERS</a>
							<ul class="nav nav-second-level">
								<li>
									<a href="waitercommission.php">Commission</a>
								</li>
								<li>
									<a  class="active-menu" href="waiterdeduction.php">Charges</a>
								</li>
							</ul>
						</li> 
						
						<li style="font-size: 16px;">
							<a href="closing.php"><i class="fa fa-times fa-1x"></i>CLOSE OPERATION</a>
						</li>						
					</ul>  
				</div>            
			</nav>  
    	<div>
               <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div class="row">
                <div class="col-md-12">
					<div class="row">
						<div class="col-md-12">
							<div class="panel panel-default">
								<div class="panel-heading" style="background-color: #B00000 ;color: white;">
									 <b>WAITER CHARGES</b>
								</div>
								<div class="panel-body">
									<div class="table-responsive">
									
										<?php  
											include 'wd.php';

												$dbhost = 'localhost';
												$dbuser = 'root';
												$dbpass = '';
												$connection = mysqli_connect($dbhost,$dbuser,$dbpass,'aml_db');

												if(! $connection){
													die('Could not Connect to Database' . mysql_error());
												}

												$query = "SELECT charged_waiter FROM charge_db group by charged_waiter";

												$result = mysqli_query( $connection , $query );

												if(! $result){
													die('Could not get data from database : ' . mysql_error() );
												}

												$array  = array();
												$i = 0;
												$name = '';
												$row_cnt = mysqli_num_rows($result);
											
												for($x=0; $x<$row_cnt; $x++){
													while ( $row = mysqli_fetch_array( $result )){
														array_push($array, $row[0]);
													   }
													$name = $array[$i];
											
													echo'<div class="modal fade" id="myModal'.$name.'" role="dialog">';

echo <<<FRAG
														<div class="modal-dialog modal-md">
															<div class="modal-content">
																<div class="panel-heading" style="background-color:#E0E0E0;">
FRAG;
																	echo '<h3 class="modal-title" style="text-align:center;">Charges Summary of '.$name.' </h3>';
echo <<<FRAG
																</div>
																		
																<div class="modal-body">
FRAG;
																	include 'db.php';
																	$query = "SELECT * FROM charge_db where charged_waiter= '$name'"; 
																	$result = mysqli_query($conn, $query);
echo <<<FRAG
																	<div style="width:100%; height:300px; overflow-y:scroll;"> 
																		<table class="table table-condensed" cellspacing="0" width="98%" align="center">
FRAG;
																			echo "<tr style=font-family:Open Sans;>
																					<th width=35% style=text-align:center;> Item Name </th>
																					<th width=20% style=text-align:right;> Charge Rate </th>
																				</tr>";
																		while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results
																			 echo "<tr>";
																				echo "<td style=text-align:center;>" . $row['charged_name'] . "</td>";
																				echo "<td style=text-align:right;>" .  number_format($row['charged_tprice'],2). "</td>";
																				echo "</tr>";
																		}   
echo <<<FRAG
																		</table> 
																	</div><br>
FRAG;
																	include 'db.php';
																	$query = "SELECT SUM(charged_tprice) as sum, charged_date, charged_waiter, charged_name FROM charge_db where charged_waiter='$name'"; 
																	$result = mysqli_query($conn, $query);
																	
																	while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results
																		echo "<tr>";
																			echo '<h3 id="total_bill" style="text-align:right;font-weight:bold;">' . 'Total: ₱ ' .  number_format($row['sum'],2) . '</h3>';
																		echo "</tr>";
																	}
echo <<<FRAG
																		
																	<div class="modal-footer">
																	   <button type="button" class="btn btn-default" data-dismiss="modal" style="background-color:white;">Close</button>
																	</div>
																	
																</div>
															</div> 
														</div>
													</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>	
			</div>
		</div>
FRAG;
												$i++;
										}
												 
												 mysqli_close($connection);
											?>
										
												
		<script>
			function show_alert() {
				var AlertBox = "";
				AlertBox=confirm("Are you sure you want to proceed?");
				return AlertBox;
			}
		</script>
								
		<script src="assets/js/jquery-1.10.2.js"></script>
		  <!-- BOOTSTRAP SCRIPTS -->
		<script src="assets/js/bootstrap.min.js"></script>
		<!-- METISMENU SCRIPTS -->
		<script src="assets/js/jquery.metisMenu.js"></script>
		 <!-- DATA TABLE SCRIPTS -->
		<script src="assets/js/dataTables/jquery.dataTables.js"></script>
		<script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
		<script>
			$(document).ready(function () {
				$('#dataTables-example').dataTable();
			});
		</script>
			 <!-- CUSTOM SCRIPTS -->
		<script src="assets/js/custom.js"></script>

	</body>
</html> 

