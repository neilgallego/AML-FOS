<style>
#tw {
	     font-weight: 900;
	     font-size: 130%;
		 right: 10%;
		 top:14%;
		 position: absolute;
		
}



</style>
<body style="    max-width: 100%;
   				 overflow: hidden;
   				 background-color:#dadee5;">
<?php
error_reporting(0);
session_start();
include ('dbconfig.php');
 $login_session = $_SESSION['fname'];
 if(!isset($_SESSION['fname'])){
	 header('Location: index.php');
	 return;
 }
 $t_value = $_SESSION['varname2'];
 $w_value = $_SESSION['varname'];
 $r_value = $_SESSION['varname3'];

?>
			
	<iframe height="100%" width="100%" style="position: absolute; top:0px; left:-6px;" src="item category/categ_1.php" name="iframe_f" ></iframe>

	<iframe height="100%" width="100%" style="position: absolute; top:115px; left:-7px;" src="item category/appetizzer_1.php" name="iframe_g" ></iframe>
	  <div id="tw"  style="color:white;">
	        T: <?php echo $t_value;?></br>
			W: <?php echo $w_value;?></br>
	  </div>