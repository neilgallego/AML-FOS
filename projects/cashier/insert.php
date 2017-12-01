
									<?php
										include 'db.php';

										if(isset($_POST['submit'])){ // Fetching variables of the form which travels in URL
										$no_sc = $_POST['no_sc'];
										$no_pax = $_POST['no_pax'];
										$type_discounts = $_POST['type_discounts'];
										$total_bill = $_POST['total_bill'];

											$qry = "SELECT * FROM billing";
										
											if($no_sc !=''||$no_pax !='' || $type_discounts !=''){
											$query = "INSERT INTO billing(no_sc, no_pax, type_discounts, total_bill) values ('$no_sc', '$no_pax', '$type_discounts','$total_bill')";
												echo "<br/><br/><span>Data Inserted successfully...!!</span>";
											}
										else{
											echo "<p>Insertion Failed <br/> Some Fields are Blank....!!</p>";
											}
										}
										mysqli_close($conn); // Closing Connection with Server
										?>