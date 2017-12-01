<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Alberto's Music Lounge</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="transac.php">Administrator</a> 
            </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"> <b><?php date_default_timezone_set("Asia/Manila"); 
                            echo $today = date("F j, Y g:i A");?></b> &nbsp; <a href="logout.php" onclick="return confirm('Do you really want to Log Out?');"class="btn btn-danger square-btn-adjust">Logout</a> </div>
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                <li class="text-center">
                    <img src="assets/img/AML.png" class="user-image img-responsive"/>
                    </li>

                        <li>
                        <a  href="transac.php"><i class="fa fa-tachometer fa-2x" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Dashboard</span></a></li>
                         <!--<li><a href="Summaries.php"><i class="glyphicon glyphicon-list-alt fa-2x" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Summary</span></a></li>-->
                        <li><a href="users.php"><i class="fa fa-user fa-2x" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Users</span></a></li>
                        <li><a href="manage.php"><i class="fa fa-cutlery fa-2x" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Menu</span></a></li>
                        <li><a  href="tables.php"><i class="fa fa-table fa-2x" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Tables</span></a></li>
                       
                       <li>
                        <a href="#"><i class="fa fa-cog fa-2x"></i> Settings<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="#">Account Settings<span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="#">Change My Password</a>
                                    </li>
                                    <li>
                                        <a href="#">Change User Password</a>
                                    </li>
                                     
                                </ul>
                            </li>
                            
                        </ul>
                      </li>  
                      
                    </ul>
                </div>
    
                       
                     
           
         </nav>
            
            <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
               
 
            <div class="panel-body">
                            <div class="table-responsive">
<!-- /.row -->









<?php
 $db = new mysqli('localhost', 'root', '', 'aml_db');
 if(isset($_POST['submit'])):
   extract($_POST);
   if($old_password!="" && $password!="" && $confirm_pwd!="") :
    $user_id = '1';
    $old_pwd=md5(mysqli_real_escape_string($db,$_POST['old_password']));
    $pwd=md5(mysqli_real_escape_string($db,$_POST['password']));
    $c_pwd=md5(mysqli_real_escape_string($db,$_POST['confirm_pwd']));
    if($pwd == $c_pwd) :
       if($pwd!=$old_pwd) :
         $db_check=$db->query("SELECT * FROM `admin_password` WHERE `id`='$user_id' AND `password` ='$old_pwd'");
         $count=mysqli_num_rows($db_check);
         if($count==1) :
             $fetch=$db->query("UPDATE `admin_password` SET `password` = '$pwd' WHERE `id`='$user_id'");
             $old_password=''; $password =''; $confirm_pwd = '';
             $msg_sucess = "Password updated successfully.";
          else:
            $error = "The password you gave is incorrect.";
          endif;
        else :
          $error = "Old password and new password are thesame. Please try again.";
        endif;
    else:
      $error = "New password and confirm password do not match";
    endif;
   else :
     $error = "Please fill all the fields";
   endif;   
 endif;
   ?> 

<html>
<head>
 
<style type="text/css">
.error{
margin-top: 6px;
margin-bottom: 0;
color: #fff;
background-color: #D65C4F;
display: table;
padding: 5px 8px;
font-size: 11px;
font-weight: 600;
line-height: 14px;
  }
  .green{
margin-top: 6px;
margin-bottom: 0;
color: #fff;
background-color: green;
display: table;
padding: 5px 8px;
font-size: 11px;
font-weight: 600;
line-height: 14px;
  }
</style>
</head>
 
       
       
        <div class="modal-dialog">
      
                      
        <div class="modal-content col-md-10">
        <div class="modal-header">
    
        </div>
        <form method="post" autocomplete="off" id="password_form">
          <div class="modal-body with-padding">
          <div class="form-group">
            <div class="row">
              <div class="col-sm-10">
                <label>Old Password</label>
                <input type="password" name="old_password" value="<?php echo @$old_password ?>" class="form-control">
              </div>
            </div>
          </div>                             
          <div class="form-group">
            <div class="row">
              <div class="col-sm-10">
                <label>New Password</label>
                <input type="password"  id="pass2" name="password" value="<?php echo @$password ?>" class="form-control">
              </div>
            </div>
          </div>
          <div class="form-group">
          <div class="row">
            <div class="col-sm-10">
              <label>Confirm password</label>
              <input type="password"  id="pass1" name="confirm_pwd" value="<?php echo @$confirm_pwd ?>" class="form-control" onkeyup="checkPass(); return false;"  id="pass1" />
               <span id="confirmMessage" class="confirmMessage"></span>
            </div>
          </div>
          </div>         
          </div>
           <div class="<?=(@$msg_sucess=="") ? 'error' : 'green' ; ?>" id="logerror">
             <?php echo @$error; ?><?php echo @$msg_sucess; ?>
            </div> 
          <!-- end Add popup  -->  
          <div class="modal-footer">
 <small>Old password :default </small> 
  </br>
            <strong><a href="#">Forgot Password</a></strong>
          </br>
             </br>
         </br>
          <input type="submit" id="btn-pwd" name="submit" value="Submit" class="btn btn-primary">         
           
               
          </div>
        </form> 

        </div>  
       
        </div> 
        </div> 
                 <script>
        function checkPass(){
    //Store the password field objects into variables ...
    var pass1 = document.getElementById('pass1');
    var pass2 = document.getElementById('pass2');
    //Store the Confimation Message Object ...
    var message = document.getElementById('confirmMessage');
    //Set the colors we will be using ...
    var goodColor = "#66cc66";
    var badColor = "#ff6666";
    //Compare the values in the password field 
    //and the confirmation field
    if(pass1.value == pass2.value){
        //The passwords match. 
        //Set the color to the good color and inform
        //the user that they have entered the correct password 
        pass2.style.backgroundColor = goodColor;
        message.style.color = goodColor;
        message.innerHTML = "Passwords Match!"
    }else{
        //The passwords do not match.
        //Set the color to the bad color and
        //notify the user.
        pass2.style.backgroundColor = badColor;
        message.style.color = badColor;
        message.innerHTML = "Passwords Do Not Match!"
    }
}  
    </script>

        </div> 
        </div> 
        </div> 
        

