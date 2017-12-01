<link rel="stylesheet" href="../../../../bootstrap/bootstrap-3.3.7/dist/css/bootstrap.min.css">
<script src="../../../../bootstrap/bootstrap-3.3.7/dist/js/jquery-3.2.1.min.js"></script>
<script src="../../../../bootstrap/bootstrap-3.3.7/dist/js/bootstrap.min.js"></script>

<?php 
    session_start();
    $position = $_SESSION['sess_userpos'];
    if(!isset($_SESSION['sess_username']) && $position!="checker"){
      header('Location: ../login/index.php');
    }
?>

<style>
body {
	background-color:#dadee5;;
    overflow: hidden;

}

#myModala1{
        overflow: hidden;
}

#myModala1 .modal-dialog  {
    width:85%;
}

#myModalassign {
top:30%;
outline: none;
}
</style>

<?php
require_once('dbcontroller.php');
$db_handle = new DBController();
?>


<!DOCTYPE html>
<html>
<body>

<div  style="left:0; margin-left: 130px; margin-top: 6px; margin-bottom: 0.8%;">
        <a style="width:7%;    float:left; " href="/AMLFOS/AMLFOS/CHECKER/PROTOTYPE2/prototype2/augment/apply/item category/beverages.php?cat=Cocktails" target="iframe_c"  class="list-group-item list-group-item-success" data-parent="#SubMenu2" >Cocktails</a>

        <a style="width:7%;   float:left;" href="/AMLFOS/AMLFOS/CHECKER/PROTOTYPE2/prototype2/augment/apply/item category/beverages.php?cat=Pitcher+Cocktails" target="iframe_c"  class="list-group-item list-group-item-success" data-parent="#SubMenu2" >Pitcher</a>

        <a style="width:7%;   float:left;" href="/AMLFOS/AMLFOS/CHECKER/PROTOTYPE2/prototype2/augment/apply/item category/beverages.php?cat=Shooters" target="iframe_c"  class="list-group-item list-group-item-success" data-parent="#SubMenu2" >Shooters</a>

        <a style="width:7%;   float:left;" href="/AMLFOS/AMLFOS/CHECKER/PROTOTYPE2/prototype2/augment/apply/item category/beverages.php?cat=Tequila%2FGin%2FRum%2FVodka" target="iframe_c"  class="list-group-item list-group-item-success" data-parent="#SubMenu2" >TGRV</a>

        <a style="width:7%;   float:left;" href="/AMLFOS/AMLFOS/CHECKER/PROTOTYPE2/prototype2/augment/apply/item category/beverages.php?cat=Scotch%2FCognac%2FBrandy" target="iframe_c"  class="list-group-item list-group-item-success" data-parent="#SubMenu2" >SCB</a>
        
        <a style="width:7%;   float:left;" href="/AMLFOS/AMLFOS/CHECKER/PROTOTYPE2/prototype2/augment/apply/item category/beverages.php?cat=Smb+Draft%2F+Bottled+Beer" target="iframe_c"  class="list-group-item list-group-item-success" data-parent="#SubMenu2" >SMB/Beer</a>

        <a style="width:7%;   float:left;" href="/AMLFOS/AMLFOS/CHECKER/PROTOTYPE2/prototype2/augment/apply/item category/beverages.php?cat=Liquers" target="iframe_c"  class="list-group-item list-group-item-success" data-parent="#SubMenu2" >Liquers</a>

        <a style="width:7%;   float:left;" href="/AMLFOS/AMLFOS/CHECKER/PROTOTYPE2/prototype2/augment/apply/item category/beverages.php?cat=Mocktail+Hot+and+Cold+Beverages" target="iframe_c"  class="list-group-item list-group-item-success" data-parent="#SubMenu2" >MH/CB</a>

        <a style="width:7%;   float:left;" href="/AMLFOS/AMLFOS/CHECKER/PROTOTYPE2/prototype2/augment/apply/item category/beverages.php?cat=Fruit+Shakes" target="iframe_c"  class="list-group-item list-group-item-success" data-parent="#SubMenu2" >Shakes</a>
</div>

<div style="position:absolute; right:8%; top: 2.5%;">
    <input id="TABLES" type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#myModalassign" onclick="showDiv();"
	style="background-color:#CD5C5C; color:#FFF; border-color:#CD5C5C; top:0%;" value="Assign Waiters">

 <div class="modal fade" id="myModalassign" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
  

            <iframe height="200px" width="100%"  style="border:none; position:absolute; top: 0;" src="assign_waiters.php" name="iframe_a"></iframe>                   

        <div class="modal-footer">

        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->


</div>

        <div style="position:absolute; right:0; top:0.04%;">
            <b id="welcome">Welcome : <i><?php echo $_SESSION['sess_username']; ?></i></b>
            <br>
            <form action="../../../../login/logout.php" method="post">
            <input href="../../../../login/logout.php" type="submit" class="signout btn btn-danger" style="background-color:#8e0000;color:#FFF;border-color:#8e0000; " value="Sign Out" name="logout">
            </form>
        </div>
                      
<!--FRAMES -->
<iframe  height="320px" width="52%" src="dash.php" name="iframe_menu" style="position:absolute; top: 455px; left: 12%; right: 0px;">
</iframe>

<iframe height="400px" width="52%" src="/AMLFOS/AMLFOS/CHECKER/PROTOTYPE2/prototype2/augment/apply/item category/appetizzer.php" name="iframe_c" style="position:absolute;
 top: 55px; left: 12%; right: 0;">
</iframe>

<iframe height="720px" width="36%" src="/AMLFOS/AMLFOS/CHECKER/PROTOTYPE2/prototype2/augment/apply/order_queue.php" name="iframe_d" style="position:absolute;
 top: 55px; left: 64%; right: 0;">
</iframe>

<iframe height="720px" width="12%" src="/AMLFOS/AMLFOS/CHECKER/PROTOTYPE2/prototype2/augment/apply/nav.php" name="iframe_e" style="position:absolute;
 top: 55px; left: 0; right: 0;">
</iframe>



</html>