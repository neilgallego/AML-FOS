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
								   <a  href="a.php"> A Tables</a>
								</li>
								<li>
									<a href="b.php">B Tables</a>
								</li>
								<li>
									<a href="c.php">C Tables</span></a>
								</li>
								<li>
									<a class="active-menu" href="d.php">D Tables</span></a>
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
									<a href="waiterdeduction.php">Charges</a>
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
				
			<div id="page-wrapper" >
                <div class="row">
                    <div class="col-md-12">
						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default">
									<div class="panel-heading" style="background-color: #484848;color: white">
										 SELECT TABLE
									</div>
									<div class="panel-body">
										<div class="table-responsive">
											<?php  
												include "tableD.php";
													$dbhost = 'localhost';
													$dbuser = 'root';
													$dbpass = '';
													$connection = mysqli_connect($dbhost,$dbuser,$dbpass,'aml_db');

													if(! $connection){
														die('Could not Connect to Database' . mysql_error());
													}
													$query = "SELECT table_name,table_column FROM table_db where table_column ='D' order BY table_name";
													$result = mysqli_query( $connection , $query );
													if(! $result){
														die('Could not get data from database : ' . mysql_error() );
													}
													$array  = array();
													$i = 0;
													$table_no="";
													$row = mysqli_fetch_array($result);
													$row_cnt = mysqli_num_rows($result);
													for($x=0; $x<$row_cnt; $x++){
														$array[] = $row[$i]; 
														$table_no = $array[$i];

													echo'<div class="modal fade" id="myModal'.$table_no.'" role="dialog">';
echo <<<FRAG
															<div class="modal-dialog modal-lg">
																<div class="modal-content">
																	<div class="panel-heading" style="background-color:#E0E0E0;">
FRAG;
																		echo '<h3 class="modal-title" style="text-align:center;">'.$table_no.' </h3>';
echo <<<FRAG
																	</div>
																	
																	<div class="modal-body">
FRAG;
																		include 'db.php';
																		$query = "SELECT served_name, served_quantity, served_price, served_price*served_quantity as subtotal  FROM served_db where served_table = '$table_no'"; 
																		$result = mysqli_query($conn, $query);
echo <<<FRAG
																		<div style="width:100%; height:300px; overflow-y:scroll;"> 
																			<table class="table table-condensed" cellspacing="0" width="98%" align="center">
FRAG;
																				echo "<tr style=font-family:Open Sans;>
																						<th width=50% style=text-align:center;> Name </th>
																						<th width=20% style=text-align:center;> Quantity </th>
																						<th width=15% style=text-align:right;> Unit Price </th>
																						<th width=15% style=text-align:right;> Subtotal </th>
																					</tr>";
																				while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results
																					echo "<tr>";
																						echo "<td style=padding:1%;>" . $row['served_name'] . "</td>";
																						echo "<td style=text-align:center;>" . $row['served_quantity'] . "</td>";
																						echo "<td style=text-align:right;padding:1%;>" . number_format($row['served_price'],2) . "</td>";
																						echo "<td style=text-align:right;padding:1%;>" . number_format($row['subtotal'],2). "</td>";
																					echo "</tr>";
																				}	
echo <<<FRAG
															
																			</table> 
																		</div>

																		<div class="modal-footer">
FRAG;
																				include 'db.php';
																					$query = "SELECT SUM(served_price*served_quantity) as sum FROM served_db WHERE served_table = '$table_no'";
																					$sum = 0;
																					$r = mysqli_query($conn, $query);
																					if($r){
																						$varid = '';
																						while($row = mysqli_fetch_array($r)){ 
																							$sum = $row['sum'];												
																							echo '<h3 id="total_bill" style="text-align:right;font-weight:bold;">' . 'Total Bill: ₱ ' . number_format($row['sum'],2) . '</h3>';
																						}
																					} else {
																					 printf("Errormessage: %s\n", mysqli_error($conn));	
																					}
																	

												
																				echo'<input id="dis" type="button" class="btn btn-warning btn-lg" data-toggle="modal" data-target="#oth'.$table_no.'" onclick="adminprompt();showDiv();" style="margin-left: 1%; margin-top: 1%; margin-bottom: 1%; float: left;" value="ON THE HOUSE" >';
																				
																				include 'db.php';	
																				$query = "SELECT username , password, position, status FROM users where position='Admin' AND status='Active'";
																				$result = mysqli_query($conn, $query) or die (mysql_error());
																				if($result){
																					$row = mysqli_fetch_array($result);
																					$pass = $row['password'];
																				}else
																					die('Could not get data from database : ' . mysql_error());						
																				
																		    echo'<div class="modal fade" id="oth'.$table_no.'" role="dialog">';
echo <<<FRAG
																					<div class="modal-dialog modal-md">
																						<div class="modal-content">
																							<div class="panel-heading btn-warning">
																								<h5 class="modal-title" style="text-align:center;">ON THE HOUSE</h5>
																							</div>

																							<div class="panel-body">
																								<div class="table-responsive">
FRAG;
																									include 'dbcon.php';
																									$query = "SELECT * FROM served_db where served_table = '$table_no'"; 
																									$result = mysqli_query($conn, $query);
echo <<<FRAG
																									<form method="post" action="delete.php" >
																				
																										<div style="width:100%; height:300px; overflow-y:scroll;"> 
																											<table class="table table-condensed" cellspacing="0" width="98%" align="center">
FRAG;
																												echo "<tr style=font-family:Open Sans;>
																														<th width=50% style=text-align:center;> Name </th>
																														<th width=20% style=text-align:center;> Quantity </th>
																														<th width=15% style=text-align:right;> Unit Price </th>
																														<th width=15% style=text-align:right;> Subtotal </th>
																													</tr>";
																													while($row = mysqli_fetch_array($result)){ 
																														$id=$row['served_id'];
																														?><tr>
																															<td style=padding:1%;><input name="selector[]" type="checkbox" style=float:left; value="<?php echo $id; ?>"><?php echo $row['served_name']; ?></td><?php
																																echo "<td style=text-align:center;>" . $row['served_quantity'] . "</td>";
																																echo "<td style=text-align:right;padding:1%;>" . number_format($row['served_price'],2) . "</td>";
																																echo "<td style=text-align:right;padding:1%;>" . number_format($row['served_tprice'],2). "</td>";
																														echo "</tr>";
																													}	
echo <<<FRAG
																											</table> 
																										</div>	
																										<input type="button" onclick='selectAll()' value="Select All"/>
																										<input type="button" onclick='UnSelectAll()' value="Unselect All"/>
																										<script type="text/javascript">
																											function selectAll(){
																												var items=document.getElementsByName('selector[]');
																												for(var i=0; i<items.length; i++){
																													if(items[i].type=='checkbox')
																														items[i].checked=true;
																												}
																											}
																											
																											function UnSelectAll(){
																												var items=document.getElementsByName('selector[]');
																												for(var i=0; i<items.length; i++){
																													if(items[i].type=='checkbox')
																														items[i].checked=false;
																												}
																											}			
																										</script>					
																										<div class="modal-footer">
FRAG;
																											echo '<input type="submit" class="btn btn-danger" value="Apply" name="delete" onClick="return show_alert()">';
 echo <<<FRAG
																									</form>	
																								</div>
																							</div>
																						</div>
																					</div>
																				</div>
																			</div>
FRAG;
																	   echo'<form id="form'.$table_no.'" action="a.php" method="post" onsubmit="return confirm(Do you really want to submit?)">';
																	   		echo'<input id="dis" type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#mydis'.$table_no.'" onclick="showDiv();" style="margin-left: 1%; margin-top: 1%; margin-bottom: 1%; float: left;" value="DISCOUNTS">';
																			echo'<div class="modal fade" id="mydis'.$table_no.'" role="dialog">';
echo <<<FRAG
																					<div class="modal-dialog modal-md">
																						<div class="modal-content">
																							<div class="panel-heading btn-success">
																								<h5 class="modal-title" style="text-align:center;">DISCOUNTS</h5>
																							</div>
																							<div class="panel-body">
																								<div class="table-responsive">
																									<table class="table table-striped table-bordered table-hover" id="dataTables-example">
																										<tbody style="text-align: center;">
																											<tr style=font-family:Open Sans;>
																												<td style="text-align:right;font-weight:bold;"># OF SENIOR CITIZEN:</td>
																												<td style="text-align:left;"><input id = "no_sc" name = "no_sc" type="number" value="" ></td>
																											</tr>
																											<tr style=font-family:Open Sans;>
																												<td style="text-align:right;font-weight:bold;"># OF PAX:</td>
																												<td style="text-align:left;"><input id="no_pax" name="no_pax" type="number" value=""></td>
																											</tr>
																										
																										</tbody>
																									</table> 
																									<div class="modal-footer">
																										<button class="btn btn-primary " data-dismiss="modal">Apply Discount</button>
																									</div>			
																								</div>
																							</div>
																						</div>
																					</div>
																				</div>
FRAG;
																	   echo'<input  id="bill'.$table_no.'" type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#mybill'.$table_no.'" onclick="showDiv();" style="margin-left: 1%; margin-top: 1%; margin-bottom: 1%; text-align:center;" value="BILLOUT">';
																	   echo'<div class="modal fade" id="mybill'.$table_no.'"" role="dialog">';
echo <<<FRAG
																				<div class="modal-dialog modal-md">
																					<div class="modal-content">
																						<div class="panel-heading btn-primary">
																							<h5 class="modal-title" style="text-align:center;">BILLOUT</h5>
																						</div>
																						<div class="panel-body">
																							<div class="table-responsive">
																								<table align="center" width="70%" style="font-size: 100%;">
																									<tr style=font-family:Open Sans;>
																										<td style="text-align:right;font-weight:bold;width:30%;">MODE OF PAYMENT:</td>
																										<td colspan="3" style="text-align: left;">
																											
																											<div style=margin-left:5%;>
																											  <input type="radio" name="choice-mod" id="choice-mod-cash" onclick="cash_rcvd.disabled=false"  checked required>
																											  <label for="choice-mod-cash">Cash</label>
																											</div>
																											
																											<div style=margin-left:5%;>
																												<input type="radio" name="choice-mod" id="choice-mod-card" onclick="cash_rcvd.disabled=true">
																												<label for="choice-mod-card">Card</label>
																												<div class="reveal-if-active">
																													<label for="which-card">Enter Transaction Number: </label>
																													<input type="text" id="transac_no" name="transac_no" class="require-if-active" data-require-pair="#choice-mod-card">
																												</div>
																											</div>
																										</td>
																									</tr>
																									<tr style=font-family:Open Sans;>
																										<td style="text-align:right;font-weight:bold;width:3%;">CASH RECEIVED:</td>
																										<td style="width: 20%;margin-left:5%;"><input name="cash_rcvd" id="cash_rcvd" type="number" value="cash" style="width: 95%"></td>
																									</tr>
																									<tr style=font-family:Open Sans;></tr>
																									<tr style=text-align:center;font-family:Open Sans;>
																										<td colspan="4">
																											<div align="right" style="margin-top:1%;margin-bottom:1%;margin-right: 1%;">
																												<button type="reset" class="btn btn-primary">CLEAR</button>
FRAG;

																										echo '<button type="submit" class="btn btn-primary" name="submit'.$table_no.'" onClick="return show_alert()">BILLOUT</button>';	
 echo <<<FRAG
																											</div>
																										</td>
																									</tr>
FRAG;
																									require('db.php');
																									if(isset($_POST['submit'.$table_no.''])){
																										if (isset($_POST['cash_rcvd']) || isset($_POST['transac_no'])){
																											$no_sc = $_POST['no_sc'];
																											$no_pax = $_POST['no_pax'];
																											$total_discounts = $_POST['total_discounts'];
																											$cash_rcvd = $_POST['cash_rcvd'];
																											$transac_no = $_POST['transac_no'];
																											$id = $_GET['bill_id'];
																													
																											$query = "INSERT INTO `billing` (bill_time, bill_date, table_no, no_sc, no_pax, total_discounts, cash_rcvd, transac_no, total_bill) VALUES (now() , curdate(), '$table_no', '$no_sc', '$no_pax', '$total_discounts','$cash_rcvd', '$transac_no', '$sum');";																											
																											$query .= "update `billing` set `change` = `cash_rcvd` - `total_bill` where no_sc = 0;";																											
																											$query .= "update `billing` set `total_bill` = (`total_bill` - (((`total_bill`/`no_pax`)*.20)*`no_sc`)) where no_sc != 0;";																											
																											$query .= "update `billing` set `change` = `cash_rcvd` - `total_bill` where no_sc != 0;";																													
																											$query .= "insert into paid_db (paid_id,paid_code, paid_table,paid_waiter,paid_time,paid_date,paid_quantity,paid_name,paid_price,paid_type,paid_tprice)
																													select served_id,served_code,served_table,served_waiter,now(),served_date,served_quantity,served_name,served_price,served_type,served_tprice
																													from served_db where served_table= '$table_no';";
																											$query .= "Delete from served_db where served_table= '$table_no'";																						
																											$result = mysqli_multi_query($conn, $query) or die (mysql_error());																												
																											if($result){	
																												echo
																													("<SCRIPT LANGUAGE='JavaScript'>
																													 window.alert('Bill out successful!')
																													 window.location.href='changeD.php';
																													</SCRIPT>");	
																											}
																										}
																									} 
echo <<<FRAG

																								</table>
																							</div>
																						</div>
																					</div>
																				</div>
																			</form>
																			</div>
																		</div>
																	</div>
																</div>
															</div> 
														</div>
FRAG;
														
														$array[$i]++;
													}
												mysqli_close($connection);
											?>		
										</div>
									</div>
								</div>
							</div>	
						</div>	
					</div>	
				</div>	
			</div>			
		
			<script>
				function show_alert() {
					var AlertBox = "";
						AlertBox=confirm("Are you sure you want to proceed?");
						return AlertBox;
					
				}
			</script>
			
											
			<script>
				function adminprompt(){
					var pass = prompt('Please enter Admin password for authorization', '');
					if (pass != null && pass == $pass) {
						window.location.href='insertHistory.php';
					}else{
						alert('Authorization denied!');
						window.location.href='d.php';
					}
				}
			</script>

            <!-- JQUERY SCRIPTS -->
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

