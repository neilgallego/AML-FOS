<link rel="stylesheet" href="../bootstrap-3.3.7/dist/css/bootstrap.min.css">
<script src="../bootstrap-3.3.7/dist/js/jquery-3.2.1.min.js"></script>
<script src="../bootstrap-3.3.7/dist/js/bootstrap.min.js"></script>


<style>
body {
  background-color:#444444;;
    overflow: hidden;

}

#myModala1{
        overflow: hidden;
}

#myModala1 .modal-dialog  {
    width:85%;

}
</style>

<?php
require_once('connect-db.php');
require_once('dbconfig.php');
require_once('dbconfig1.php');
require_once('dbcontroller.php');
$db_handle = new DBController();
?>


	<div style="position: relative; top:0px; float:left;">
       <h4 style="color:white;">Select Table:</h4>
      <!-- Trigger the modal with a button -->
      <a style="width:3%;  background-color:#d1d1d1; border-color:#444444; color:#000000; height: 45px; float:left; padding-right: 30px; padding-left: 20px;"  class="list-group-item list-group-item-success"  href="item category/tbls_1.php?cat=A" target="iframe_c">A</a>
     <a style="width:3%;  background-color:#d1d1d1; border-color:#444444; color:#000000; height: 45px; float:left; padding-right: 30px; padding-left: 20px;"   class="list-group-item list-group-item-success"  href="item category/tbls_1.php?cat=B" target="iframe_c">B</a>
     <a style="width:3%;  background-color:#d1d1d1; border-color:#444444; color:#000000; height: 45px; float:left; padding-right: 30px; padding-left: 20px;"   class="list-group-item list-group-item-success"  href="item category/tbls_1.php?cat=C" target="iframe_c">C</a>
     <a style="width:3%;  background-color:#d1d1d1; border-color:#444444; color:#000000; height: 45px; float:left; padding-right: 30px; padding-left: 20px;"   class="list-group-item list-group-item-success"  href="item category/tbls_1.php?cat=D" target="iframe_c">D</a>
    </div>
	<div>
	 <a style="width:20%;background-color:#d1d1d1; border-color:#444444; color:#000000; height: 45px; top:0px; float:left; padding-right: 115px; padding-left: 92px;"  class="list-group-item list-group-item-success"  href="item category/tbls_1.php?cat=S" target="iframe_c">BAR</a>
	  </div>
<div style="position:absolute; top:40%;">
	<br>
  <h4 style="color:white;">Order Type:</h4>
  <div id="ord_type" style="color:white;">  		
		<strong><input type="checkbox"  name="otype" id="myselect1" value="Take Out"/>Take Out</strong>
	</div>
	<br>
</div>


<!--order type-->
<script>
$( "#ord_type" ).change(function()
{
        $.post('ot.php', 'val1=' + $('input:checkbox[name=otype]:checked').val());
})
</script>



<?php
if(isset($_GET["waiters"])){
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

    $waiter = $_GET['waiters'];

    $sql = "INSERT INTO waiter_commission (waiter_name, time, date)
    VALUES ('$waiter', NOW(), NOW())";

if ($connect->query($sql) === TRUE) {
echo "<script type= 'text/javascript'>alert('New record created successfully');</script>";
} else {
echo "<script type= 'text/javascript'>alert('Error: " . $sql . "<br>" . $connect->error."');</script>";
}

$connect->close();
}

?>

<style>
.list-group { 
    margin: 0; 
    min-width: 170px;
    width: 5%;
    position:absolute; 
    top: 33%; 
    left: 0; 
    right: 0;
 }
</style>
