<?php
require_once('dbcontroller.php');
$db_handle = new DBController();
?>

<!DOCTYPE html>
<html>
<div id="product-grid">
	
	<div class="txt-heading">Shopping Cart <a id="btnEmpty" href="dash.php?action=empty" target="iframe_menu">Clear All</a></div>
	<iframe height="300px" width="50%" src="dash.php" name="iframe_menu">
</iframe>
	<div class="txt-heading">Products</div>
	<?php
	$product_array = $db_handle->runQuery("SELECT menuitem_id, item_category, name, item_happyprice, item_availability, code FROM menu_db where item_category = 'APPETIZZER'");
	if (!empty($product_array)) { 
		foreach($product_array as $key=>$value){
	?>
		<div class="product-item">
			<form method="post" action="dash.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>" target="iframe_menu">
			<!--<div class="product-image"><img src="<?php //echo $product_array[$key]["image"]; ?>"></div>-->
			<div><strong><?php echo $product_array[$key]["name"]; ?></strong></div>
			<div class="product-price"><?php echo "Php".$product_array[$key]["item_happyprice"]; ?></div>
			<div><input type="text" name="quantity" value="1" size="2" /><input type="submit" value="Add to cart" class="btnAddAction" /></div>
			</form>
		</div>
	<?php
			}
	}
	?>
</div>


</html>