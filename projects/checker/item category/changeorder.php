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
    overflow: hidden;

}
</style>


<!DOCTYPE html>
<header>
<script src="jquery-3.2.1.min.js"></script> 
<script type="text/javascript" src="pageevents.js?t=<?php echo microtime() ?>"></script>
<link rel="stylesheet" href="styles.css">

</header>
<html>
<?php
if(isset($_POST['cat'])){

	$varid = $_POST['id'];
    $varname = $_POST['ordername'];
    $varprice = $_POST['orderprice']; 
    $varcode= $_POST['ordercode'];
    $vartable = $_POST['ordertable'];
    $varwaiter = $_POST['orderwaiter'];
    $vartype = $_POST['ordertype'];
	$varoldquantity = $_POST['oldorderquantity']; 
    $varnewquantity = $_POST['neworderquantity'];

    //dbnames
	$vardb = $_POST['vardb'];
	$vardbquantity = $_POST['vardbquantity'];
	$vardbid = $_POST['vardbid'];
	$vardbname = $_POST['vardbname'];
	$vardbtable = $_POST['vardbtable'];
	$vardbcode = $_POST['vardbcode'];
	$vardbprice = $_POST['vardbprice'];
	$vardbwaiter = $_POST['vardbwaiter'];
	$vardbdate= $_POST['vardbdate'];
	$vardbtime = $_POST['vardbtime'];
	$vardbtype = $_POST['vardbtype'];
	$vardbtotalprice = $_POST['vardbtotalprice'];
	$vardbpriority = $_POST['vardbpriority'];
	$varchange = $_POST['varchange'];

	$product_array = $db_handle->runQuery("SELECT menuitem_id, item_category, name, item_regularprice, item_availability, code FROM menu_db where item_category ='".$_POST["cat"]."'");
	if (!empty($product_array)) { 
		foreach($product_array as $key=>$value){

			$varmenuname = $product_array[$key]["name"];
			$varmenuid = $product_array[$key]["menuitem_id"];
			$varmitemprice = $product_array[$key]["item_regularprice"];

		echo "<div class='product-item itmbtn btn' data-itemnumber='$varmenuid' style='float:left'>";

			echo "
			<form method='post' id='frm$varmenuid' action='../changeordervalues.php' target='iframe_c'>
			<strong>$varmenuname</strong>
			<br>
			<strong>$varmitemprice</strong>
	
			<input type='hidden' name='menuname' value='$varmenuname'>
			<input type='hidden' name='menuprice' value='$varmitemprice'>
			<input type='hidden' name='neworderquantity' value='$varnewquantity'>
			<input type='hidden' name ='oldorderquantity' value='$varoldquantity'>
			<input type='hidden' name='id' value='$varid'>

			 <input type='hidden' name ='varchange' value='$varchange'>

            <input type='hidden' name ='ordername' value='$varname'>
            <input type='hidden' name ='orderprice' value='$varprice'>
            <input type='hidden' name ='ordercode' value='$varcode'>
            <input type='hidden' name ='orderwaiter' value='$varwaiter'>
            <input type='hidden' name ='ordertable' value='$vartable'>
        	<input type='hidden' name ='ordertype' value='$vartype'>
        	
        	<!-- dbase names -->
            <input type='hidden' name ='vardb' value='$vardb'>
            <input type='hidden' name ='vardbid' value='$vardbid'>
            <input type='hidden' name ='vardbquantity' value='$vardbquantity'>
            <input type='hidden' name ='vardbname' value='$vardbname'>
            <input type='hidden' name ='vardbtable' value='$vardbtable'>
            <input type='hidden' name ='vardbcode' value='$vardbcode'>
            <input type='hidden' name ='vardbprice' value='$vardbprice'>
			<input type='hidden' name ='vardbwaiter' value='$vardbwaiter'>
            <input type='hidden' name ='vardbdate' value='$vardbdate'>
            <input type='hidden' name ='vardbtime' value='$vardbtime'>
            <input type='hidden' name ='vardbtype' value='$vardbtype'>	
            <input type='hidden' name ='vardbtotalprice' value='$vardbtotalprice'>
            <input type='hidden' name ='vardbpriority' value='$vardbpriority'>
            <!-- dbase names -->

			<input type='text' id='$varmenuid' name='quantity' value='1' hidden/>
			";
					
			echo "</div>";
			echo "</form>";

		echo "</div>";
		?>
	<?php
			}
	}
}
	?>
</html>