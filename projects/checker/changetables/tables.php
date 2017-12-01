
<?php
 require_once('dbconfig.php');
?>
<!DOCTYPE html>
<html>
<link rel="stylesheet" href="/changetables/bootstrap/bootstrap-3.3.7/dist/css/bootstrap.min.css">
<script src="/changetables/bootstrap/bootstrap-3.3.7/dist/js/jquery-3.2.1.min.js"></script>
<script src="/changetables/bootstrap/bootstrap-3.3.7/dist/js/bootstrap.min.js"></script>

<script>
function showDiv() {
    document.getElementById('option').style.display = "block";
}

</script>
<style>
body {
	background-color: gray; 
}
.nav-pills{
    display: inline-block;

}

.nav-pills > li > a {
    margin-right:10px; /* pill spread */
    font-family: "kodakku"; /* font */
    font-size: 20px;
	background-color: red;
}

h1{
	color: white;
}
</style>


<body>


<div name="tables_list">
			<table align="center">
		
				<tr >
				<h1 align="center">SELECT TABLE</h1>
				</tr>

				<tr class="blank_row">
					<td colspan="3"></td>
				</tr>
				<tr>
				<!-- NAVIGATION FOR TABLES -->		
				<div class="container">
				  <div class="text-center">
					 <ul class="nav nav-pills red" role="tablist">
						 <li class="active" role="presentation"><a href="/changetables/bootstrap/bootstrap-3.3.7/dist/css/bootstrap.min.css" target="iframe_b">A TABLES</a></li>
						 <li class="active" role="presentation"><a href="b.php" target="iframe_b">B TABLES</a></li>
						 <li class="active" role="presentation"><a href="c.php" target="iframe_b">C TABLES</a></li>
						 <li class="active" role="presentation"><a href="d.php" target="iframe_b">D TABLES</a></li>
					  </ul>
				  </div>
				</div>
				
				<tr class="blank_row">
					<td colspan="3"></td>
				</tr>
				
				<iframe height="400px" width="100%"  style="border:none; position:relative; top: 20px;" src="a.php" name="iframe_b"></iframe>
				
				

</div>
</body>
</html>