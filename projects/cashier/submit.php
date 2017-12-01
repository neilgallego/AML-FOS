
<form action="a.php" method="post" onsubmit="return confirm('Do you really want to submit the form?');">
 
					                				</div>
					                        </div>
				                        </div>


									</div>
								</div>
							</div>
					
					<input id="bill" type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#mybill" onclick="showDiv();" style="margin-left: 1%; margin-top: 1%; margin-bottom: 1%; text-align:center;" value="BILLOUT">

 					<div class="modal fade" id="mybill" role="dialog">
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
									<div>
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
										
										<tr style=font-family:Open Sans;>

										</tr>
										
										<tr style=text-align:center;font-family:Open Sans;>
											<td colspan="4">
												<div align="right" style="margin-top:1%;margin-bottom:1%;margin-right: 1%;">
													<button type="reset" class="btn btn-primary">CLEAR</button>
						
						
						<input id="dis" type="button" class="btn btn-success" data-toggle="modal" data-target="#mydis" onclick="showDiv();" style="margin-left: 1%; margin-top: 1%; margin-bottom: 1%; float: left;" value="DISCOUNTS">
							<br>
							
							<div class="modal fade" id="mydis" role="dialog">
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
														<tr style=text-align:center;font-family:Open Sans;>
															<td style="font-weight:bold;text-align:right;">SENIOR CITIZEN DISCOUNT:</td>
															<td style=text-align:left;>₱ </td>
														</tr>
													
												
													</tbody>
													
													 </table> 
				                                	<div class="modal-footer">
					                                    	<button class="btn btn-primary" data-dismiss="modal">APPLY</button>
															
														
															

					                				</div>
															
					                        </div>
				                        </div>


									</div>
								</div>
							</div>
										
													<button type="submit" class="btn btn-primary" name="submit" >BILLOUT</button>
											
							
					

 </div>
											</td>
									</div>
								
									</tr>
							
									
									<script>
										function show_alert() {
										   confirm("Do you eally want to submit the form? ");
										}
									</script>
<?php
							
										require('db.php');
										
										if(isset($_POST['submit'])){
	
											// If the values are posted, insert them into the database.
											if (isset($_POST['cash_rcvd']) || isset($_POST['transac_no'])){

																$no_sc = $_POST['no_sc'];
                                                                $no_pax = $_POST['no_pax'];
                                                                $type_discounts = $_POST['type_discounts'];
                                                               
                                                                $cash_rcvd = $_POST['cash_rcvd'];
																$transac_no = $_POST['transac_no'];
																

																$id = $_GET['bill_id'];
													
														
													$query = "INSERT INTO `billing` (bill_time, bill_date, table_no, no_sc, no_pax, type_discounts, cash_rcvd, transac_no, total_bill) VALUES (now() , curdate(), '$table_no', '$no_sc', '$no_pax', '$type_discounts','$cash_rcvd', '$transac_no', '$sum');";
													
													$query .= "update `billing` set `change` = `cash_rcvd` - `total_bill` where no_sc = 0;";
													
													$query .= "update `billing` set `total_bill` = (`total_bill` - (((`total_bill`/`no_pax`)*.20)*`no_sc`)) where no_sc != 0;";
													
													$query .= "update `billing` set `change` = `cash_rcvd` - `total_bill` where no_sc != 0;";
														
														$query .= "insert into paid_db (paid_id,paid_code, paid_table,paid_waiter,paid_time,paid_date,paid_quantity,paid_name,paid_price,paid_type,paid_tprice)
														select served_id,served_code,served_table,served_waiter,now(),served_date,served_quantity,served_name,served_price,served_type,served_tprice
														from served_db where served_table= 'A01';";
	
														$query .= "Delete from served_db where served_table= 'A01'";
									
													
												
														
														
														$result = mysqli_multi_query($conn, $query) or die (mysql_error());
														
												if($result){
															
																echo
																	("<SCRIPT LANGUAGE='JavaScript'>
																	 window.alert('Succesfully Added!')
														
																	 window.location.href='change.php';
																	</SCRIPT>");
														
													
														
														
												}
											
										
											
											}
										
										}
										
									?>
					
								
								
								</form>
							
								