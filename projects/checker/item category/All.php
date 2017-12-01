<?php 
include('../header.php');
?>
<?php
require_once('../dbcontroller.php');
$db_handle = new DBController();
?>
<style>
body {
  background-color:#dadee5;;


}
</style>

<!DOCTYPE html>
<header>
<script src="jquery-3.2.1.min.js"></script> 
<script type="text/javascript" src="pageevents.js?t=<?php echo microtime() ?>"></script>
<link rel="stylesheet" href="styles.css">

</header>
<html>
<body>

<?php

	$product_array = $db_handle->runQuery("SELECT menuitem_id, item_category, name, item_regularprice, item_availability, code FROM menu_db where code  LIKE '%".$_POST["term"]."%' OR name LIKE '%".$_POST["term"]."%'");
	if (!empty($product_array)) { 
		foreach($product_array as $key=>$value){
	?>
		<div class="product-item itmbtn btn" data-itemnumber="<?php echo $product_array[$key]["code"]; ?>" style="float:left">

			<form method="post" id="frm<?php echo $product_array[$key]["code"]; ?>" action="../dash.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>" target="iframe_menu">
			<!--<div class="product-image"><img src="<?php //echo $product_array[$key]["image"]; ?>"></div>-->
			
			<div><strong>
			<?php echo $product_array[$key]["name"]; ?>
			</strong></div>
			<div><strong>
			<?php echo $product_array[$key]["code"]; ?>
			</strong></div>

			
			<input type="text" id="qty<?php echo $product_array[$key]["code"]; ?>" name="quantity" value="1" hidden/>
			<input type="submit" value="Add to cart" class="btnAddAction" hidden/></div>
			</form>
		</div>

	<?php
			}
	}

	?>
</html>