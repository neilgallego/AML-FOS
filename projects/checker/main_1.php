<?php
error_reporting(0);
session_start();
include ('dbconfig.php');

 $login_session = $_SESSION['fname'];
 if(!isset($login_session)){
   header('Location: index.php');
   return;
 }
 $t_value = $_SESSION['varname2'];
 $w_value = $_SESSION['varname'];

?>
<!DOCTYPE html>
<html>
<head>
  <title>Main Page</title>
  
<link rel="stylesheet" href="../bootstrap-3.3.7/dist/css/bootstrap.min.css">
<script src="../bootstrap-3.3.7/dist/js/jquery-3.2.1.min.js"></script>
<script src="../bootstrap/bootstrap-3.3.7/dist/js/bootstrap.min.js"></script>

<style>
body {
  background-color:#444444;
    overflow: hidden;
}
</style>

</head>
<body>


  <table width="100%" height ="120%" cellspacing="0" cellpadding="0"  style="border-collapse:collapse; border:0; position:absolute;" >
    <tr>
		<td height="8%" style="background-color: #444444">
       <img src="logo_1.png" alt="logo.png" onclick="refreshCurrent();" height="8%"; width="10%"; style="left:10px; top:5px; position: absolute; "> 
      </td>
      <td rowspan="2">
      <iframe height="100%" frameBorder="0" width="100%" src="./item category/appetizzer_1.php" name="iframe_c" ></iframe>   
      </td>
      <td>
        <div>
          <div style="position:absolute; right:1%; top:1%;">
          <input id="TABLES" type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#myModalassign"  style="background-color:#CD5C5C; color:#FFF; border-color:#CD5C5C;  " value="Assign Waiters">
          <input id="TABLES" type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#myModalitem"  style="background-color:#CD5C5C;color:#FFF;border-color:#CD5C5C;  " value="Item Availability">
          <a href="/checker/logout.php" ><button id="signout" class="btn btn-warning btn-sm"  style="background-color:#CD5C5C;color:#FFF;border-color:#CD5C5C; top:1%;" >Sign out</button></a>  
           </div>
           <div class="modal fade" id="myModalassign" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                      <iframe height="300px" frameBorder="0" width="100%"  style="border:none; position:absolute; top: 0;" src="assign_waiters.php" name="iframe_a"></iframe>                   
                  <div class="modal-footer">
                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
            
           <div id="myModalitem" class="modal fade" role="dialog">
            <div class="modal-dialog">
              <!-- Modal content-->
              <div class="modal-content">
                 <iframe height="1000px" frameBorder="0" width="150%"  style="border:none; position:absolute; top: 0;" src="send_value.php" name="iframe_a"></iframe>             
              </div>
            </div>
          </div>
          </div>

                  <div>
          <div style="position:absolute; top:330px; left:232px; z-index: 1;" >
          <div style="   
            position: absolute;
              width: 100px;
              height: 40px;
              margin: 20px;
              border: 0px solid black; 
            right: 20%;
            top: -1px;">
           <input type="button" style="   
						background-color: #ffe2e2; color:black;" class="list-group-item list-group-item-warning" data-parent="#SubMenu2" onclick="hapPrompt();" value="Happy Hr">
          </div> 
          <div style="   
            position: absolute;
              width: 100px;
              height: 40px;
              margin: 20px;
              border: 0px solid black; 
            right: 105px;
            top: -1px;">
          <a style="   
            background-color: #ff9191; color:black;" href="./main_1.php"  class="list-group-item list-group-item-danger" data-parent="#SubMenu2" >Regular Hr</a>
          </div>
          </div> 
          </div>
          <div style="position:absolute; top:45px; right:0;" >
          <div style="   
            position: absolute;
              width: 90px;
              height: 50px;
              margin: 10px;
              border: 0px solid black; 
            right: 20%;
            top: -1px;">
            <a href="served.php" target="iframe_d" class="list-group-item list-group-item-primary" data-parent="#SubMenu2" >Served</a>
          </div> 
          <div style="   
            position: absolute;
              width: 90px;
              height: 50px;
              margin: 10px;
              border: 0px solid black; 
            right: 95px;
            top: -1px;">
            <a href="order_queue.php"  target="iframe_d" class="list-group-item list-group-item-primary" data-parent="#SubMenu2" >Current</a>
          </div>
          </div> 
          </div>
      </td>
    </tr>
    <tr> 
      <td height="300" width="220" >
        <iframe height="100%" frameBorder="0" width="100%" src="nav_1.php" name="iframe_e"></iframe>
      </td>
          <td rowspan="2"  width="24%" >
        <iframe position: absolute;"  frameBorder="0" height="98.7%" width="100%" style="position:relative; top:0px;" src="order_queue.php" name="iframe_d"></iframe>   

          <div width="100px" height="100px" style=" background-color:black; position:fixed; right:610px; top:990px; z-index: 2; ">
          <form action="dash_1.php" method="post" target="dummyframe">
          
            <div style="position:absolute; top:5px; right: 20px; "">
              <a href="dash_1.php?action=empty" target="iframe_menu"  class="list-group-item list-group-item-warning" data-parent="#SubMenu2" style="width:90px;">Clear All</a>
            </div>
            
            <div style="position:absolute; top:10%; ">
              <button type="submit" name="submit" class="btn btn-info btn-lg"   onclick="setTimeout(refreshCurrent,100)"
              >ORDER<span class="glyphicon glyphicon-ok"></span></button>

              <script>
                function refreshIframe() {
                  var ifr = document.getElementsByName('iframe_d')[0];
                  ifr.src = ifr.src;
                }
              </script>
              <script>
                function refreshCurrent() {
                  window.location.reload(false); 
                }
              </script>
            </div>
          </form>
        </div>

      </td>
    </tr>
    <tr>
      <td colspan="2" height="650" width="1070" >
        <iframe height="100%" frameBorder="0" width="100%" src="dash_1.php" name="iframe_menu" style="position: relative; top:-3px;  " ></iframe>
      </td> 
    </tr>
    <tr>
  
    </tr>
  </table>
<iframe width="0" frameBorder="0" height="0" border="0" name="dummyframe" id="dummyframe"></iframe>
<?php
        $connection=mysqli_connect("localhost","root","","aml_db");
    // Check connection
    if (mysqli_connect_errno())
      {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }

    $result = mysqli_query($connection,'SELECT * FROM users where position="Admin" and status="Active"');

    while($row = mysqli_fetch_array($result))
    {
		?>
<script>


function hapPrompt(){
		
var password;
var pass1="<?php echo $row['password'];?>";
password=prompt('Enter Password To View Page',' ');
if (password==pass1)
	//alert("Password Correct");
	window.location = "main_2.php";
else
{
//alert("wrong");
window.location = "main_1.php";
}


}
</script>
<?php
}
    ?>
</body>
</html>