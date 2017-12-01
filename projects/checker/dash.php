<link rel="stylesheet" href="../bootstrap-3.3.7/dist/css/bootstrap.min.css">
<script src="../bootstrap-3.3.7/dist/js/jquery-3.2.1.min.js"></script>
<script src="../bootstrap-3.3.7/dist/js/bootstrap.min.js"></script>

<style>
body {
background-color: #ffeae0;

}
</style>

<?php
session_start();
require_once("dbcontroller.php");

$db_handle = new DBController();

if(!empty($_GET["action"])) {

switch($_GET["action"]) {
	
	case "add"://add item
		if(!empty($_POST["quantity"])) {
			$productByCode = $db_handle->runQuery("SELECT * FROM menu_db WHERE code='" . $_GET["code"] . "'");
			
			$itemArray = array($productByCode[0]["code"]=>array('name'=>$productByCode[0]["name"], 'code'=>$productByCode[0]["code"], 'quantity'=>$_POST["quantity"], 'item_happyprice'=>$productByCode[0]["item_happyprice"],'item_commission'=>$productByCode[0]["item_commission"]));
			//$itemArray = array($productByCode[0]["code"]=>array('name'=>$productByCode[0]["name"], 'code'=>$productByCode[0]["code"], 'quantity'=>1, 'item_happyprice'=>$productByCode[0]["item_happyprice"]));
			if(!empty($_SESSION["cart_item"])) {
				if(in_array($productByCode[0]["code"],array_keys($_SESSION["cart_item"]))) {
					foreach($_SESSION["cart_item"] as $k => $v) {
							if($productByCode[0]["code"] == $k) {
								if(empty($_SESSION["cart_item"][$k]["quantity"])) {
									$_SESSION["cart_item"][$k]["quantity"] = 0;
								}
								$_SESSION["cart_item"][$k]["quantity"] +=$_POST["quantity"] ;
							}
					}
				} else {
					$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
				}
			} else {
				$_SESSION["cart_item"] = $itemArray;
			}
		}
	break;
	

		case "minus"://add item
		//if(!empty($_POST["quantity"])) {
			$productByCode = $db_handle->runQuery("SELECT * FROM menu_db WHERE code='" . $_GET["code"] . "'");
			$itemArray = array($productByCode[0]["code"]=>array('name'=>$productByCode[0]["name"], 'code'=>$productByCode[0]["code"], 'quantity'=>1, 'item_happyprice'=>$productByCode[0]["item_happyprice"],'item_commission'=>$productByCode[0]["item_commission"]));
			
			if(!empty($_SESSION["cart_item"])) {
				if(in_array($productByCode[0]["code"],array_keys($_SESSION["cart_item"]))) {
					foreach($_SESSION["cart_item"] as $k => $v) {
							if($productByCode[0]["code"] == $k) {
								if(empty($_SESSION["cart_item"][$k]["quantity"])) {
									$_SESSION["cart_item"][$k]["quantity"] = 0;
								}
								$_SESSION["cart_item"][$k]["quantity"] -- ;
								if($_SESSION["cart_item"][$k]["quantity"]==0){
											if(!empty($_SESSION["cart_item"])) {
													foreach($_SESSION["cart_item"] as $k => $v) {
														if($_GET["code"] == $k)
															unset($_SESSION["cart_item"][$k]);				
														if(empty($_SESSION["cart_item"]))
															unset($_SESSION["cart_item"]);
													}
											}
					
	break;//intentional
								}
							}
					}
				} else {
					$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
				}
			} else {
				$_SESSION["cart_item"] = $itemArray;
			}
		//}
	break;

	case "edit":
	$total_price = 0;
	foreach ($_SESSION['cart_item'] as $k => $v) {
	  if($_POST["code"] == $k) {
		  if($_POST["quantity"] == '0') {
			  unset($_SESSION["cart_item"][$k]);
		  } else {
			$_SESSION['cart_item'][$k]["quantity"] = $_POST["quantity"];
		  }
	  }
	  $total_price += $_SESSION['cart_item'][$k]["price"] * $_SESSION['cart_item'][$k]["quantity"];	
		  
	}
	if($total_price!=0 && is_numeric($total_price)) {
		print "$" . number_format($total_price,2);
		exit;
	}
break;

	case "plus"://add item
			$productByCode = $db_handle->runQuery("SELECT * FROM menu_db WHERE code='" . $_GET["code"] . "'");
			$itemArray = array($productByCode[0]["code"]=>array('name'=>$productByCode[0]["name"], 'code'=>$productByCode[0]["code"], 'quantity'=>1, 'item_happyprice'=>$productByCode[0]["item_happyprice"],'item_commission'=>$productByCode[0]["item_commission"]));
			
			if(!empty($_SESSION["cart_item"])) {
				if(in_array($productByCode[0]["code"],array_keys($_SESSION["cart_item"]))) {
					foreach($_SESSION["cart_item"] as $k => $v) {
							if($productByCode[0]["code"] == $k) {
								if(empty($_SESSION["cart_item"][$k]["quantity"])) {
									$_SESSION["cart_item"][$k]["quantity"] = 0;
								}
								$_SESSION["cart_item"][$k]["quantity"] ++ ;
								if($_SESSION["cart_item"][$k]["quantity"]==0){
											if(!empty($_SESSION["cart_item"])) {
													foreach($_SESSION["cart_item"] as $k => $v) {
														if($_GET["code"] == $k)
															unset($_SESSION["cart_item"][$k]);				
														if(empty($_SESSION["cart_item"]))
															unset($_SESSION["cart_item"]);
													}
											}
					
	break;//intentional
								}
							}
					}
				} else {
					$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
				}
			} else {
				$_SESSION["cart_item"] = $itemArray;
			}
		//}
	break;
	
	case "remove":
					if(!empty($_SESSION["cart_item"])) {
						foreach($_SESSION["cart_item"] as $k => $v) {
					if($_GET["code"] == $k)
						unset($_SESSION["cart_item"][$k]);				
					if(empty($_SESSION["cart_item"]))
						unset($_SESSION["cart_item"]);
			}
		}
			
	break;

	case "empty":
		unset($_SESSION["cart_item"]);
	break;	

	
	}
}



?>
<HTML>
<script>
function saveCart(obj) {
	var quantity = $(obj).val();
	var code = $(obj).attr("id");
	$.ajax({
		url: "?action=edit",
		type: "POST",
		data: 'code='+code+'&quantity='+quantity,
		success: function(data, status){$("#total_price").html(data)},
		error: function () {alert("Problen in sending reply!")}
	});
}
</script>

<HEAD>
<TITLE>Shopping Cart</TITLE>
<link href="style.css" type="text/css" rel="stylesheet" />
</HEAD>
<BODY>

<!--dashboard-->
<div id="shopping-cart">
<form action="" method="post" >
<table class="table table-condensed table-hover" cellpadding="10" cellspacing="1" >
<tbody>
<tr>
	<th style="text-align:center;"><strong>Name</strong></th>
	<th style="text-align:center;"><strong>Code</strong></th>
	<th style="text-align:center;"><strong> </strong></th>
	<th style="text-align:center;"><strong>Quantity</strong></th>
	<th style="text-align:center;"><strong> </strong></th>
	<th style="text-align:center;"><strong>Price</strong></th>
	<th style="text-align:center;"><strong> </strong></th>
	<td></td>
	<td></td>
	<!--<th style="text-align:center;"><strong>Action</strong></th>-->
</tr>	
<?php
if(isset($_SESSION["cart_item"])){
    $item_total = 0;
?>	


<?php		
    foreach ($_SESSION["cart_item"] as $item){
?>
				<tr style="margin-top: 5px; margin-bottom:5px">
					<td><strong><?php echo $item["name"]; ?></strong></td>
					<td  name="cde"><?php echo $item["code"]; ?></td>

					<td><center><a class="btn btn-info btn-lg" href="dash.php?action=minus&code=<?php echo $item["code"]; ?>"><span class="glyphicon glyphicon-minus-sign"></span></a></center></td>
					<td name="qty">
					
						<div><center><input width="20px" type="number" min="1" name="quantity" id="<?php echo $item["code"]; ?>" value="<?php echo $item["quantity"]; ?>" size="2" onBlur="saveCart(this);" /></center></div>
							
					</td>
					<td>
					<center>
						<a class="btn btn-info btn-lg" href="dash.php?action=plus&code=<?php echo $item["code"]; ?>"?><span class="glyphicon glyphicon-plus-sign" ></span></a>
					</center>
					</td>
					
					<td name="itm"><?php echo "Php".$item["item_happyprice"]; ?>.00</td>
		
					<td>
					</td>
					<td>
					</td>
					<td><a href="dash.php?action=remove&code=<?php echo $item["code"]; ?>" class="btnRemoveAction"><img src="remove_button.png" alt="Mountain View" style="width:30px;height:30px;"></a></td>
				</tr>
		<?php
        $item_total += ($item["item_happyprice"]*$item["quantity"]);
		}
	

		?>

<tr>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
<td colspan="5" align=right><h3>Total:<?php echo "Php".$item_total.".00"; ?></h3> </td>

</tr>
</body>
</table>
</form>



<?php
	error_reporting("There is an error");
	$var_value1 = $_SESSION['varname1'];
?>				
<!--end of order type-->

<!--select table-->
<?php
	error_reporting("There is an error");
	$var_value2 = $_SESSION['varname2'];
?>
<!--end of select table-->

<!-- assign waiters -->
<?php
	error_reporting("this is a error");
	$var_value = $_SESSION['varname'];
?>


  <?php
  //insert into order_db


if(isset($_POST["submit"])){
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "aml_db";

	// Create connection
	$connect = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($connect->connect_error) {
		die("Connection failed: " . $connect->connect_error);
		}
			//error handler
			if ($var_value == "" || $var_value == "-") {
					echo "ERROR: Please select you waiter.";
				} else{
//default order type			
		if ($var_value1 == "" || $var_value1 == "undefined"){
			$var_value1 = "Dine In";
		}//end of default order type
		$sql = " INSERT into table_orders (table_orders_id,table_orders_serverid,table_orders_tableid) values (null,0,0);";
		if ($connect->query($sql) === TRUE) {
//					header("Location: /amlfos/amlfos/checker/prototype2/prototype2/augment/apply/dash.php"); 
				} else {
					echo "<script type= 'text/javascript'>alert('Error: " . $sql . "<br>" . $connect->error."');</script>";
				}
				printf ("New Record has id %d.\n", mysqli_insert_id($connect));
				$lastid = mysqli_insert_id($connect);
			
		foreach ($_SESSION["cart_item"] as $item){
			$subtotal = ($item["quantity"]*$item["item_happyprice"]);
			$sql = " INSERT INTO order_db (order_quantity, order_price, order_name, order_code, order_waiter, order_date, order_time, order_type, order_table, order_tprice, order_priority)
		VALUES ('".$item["quantity"]."','".$item["item_happyprice"]."','".$item["name"]."', '".$lastid."', '{$var_value}', NOW(),NOW(), '{$var_value1}', '{$var_value2}', '{$subtotal}',2);";

			if ($connect->query($sql) === TRUE) {
				$sql2 = "INSERT INTO waiter_commission (item_comm, time, date, waiter_name, i_name)
						VALUES ('".$item["item_commission"]."', NOW(), NOW(), '{$var_value}','".$item["name"]."');";
						
					if($connect->query($sql2) === TRUE){
					unset($_SESSION["cart_item"]);
					unset($_SESSION['varname']);
					unset($_SESSION['varname1']);
					unset($_SESSION['varname2']);
					header("Location: main.php");
					}
					 
				} else {
					echo "<script type= 'text/javascript'>alert('Error: " . $sql . "<br>" . $connect->error."');</script>";
				}
		}
}


		$connect->close();
	}
}
	
	
?>

</div>

