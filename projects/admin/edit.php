<?php
        session_start();
        $inactive = 600;
        if(isset($_SESSION['logged']) && $_SESSION['logged'] == true) {
            //echo "Welcome," . $_SESSION['username'] . "!";
        } else {
            header('Location: ../index.php');
        }
       
        include "dbase1.php";
        $dbase = new Database;
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Alberto's Music Lounge</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
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

                        <li><a href="transac.php"><i class="fa fa-home fa-2x" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Home</span></a></li>
                        <li><a href="Summaries.php"><i class="glyphicon glyphicon-list-alt fa-2x" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Summary</span></a></li>
                        <li><a class="active-menu"href="users.php"><i class="fa fa-user fa-2x" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Users</span></a></li>
                        <li><a href="manage.php"><i class="fa fa-cutlery fa-2x" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Menu</span></a></li>
                        <li><a href="tables.php"><i class="fa fa-table fa-2x" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Tables</span></a></li> 
                      
                    </ul>
                </div>
    
                       
                     
           
         </nav>
            
            <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
               <div class="panel-body">
                            <div class="table-responsive">

<?php
  
require("connect.php");
$id =$_REQUEST['id'];

$result = mysqli_query($connection,"SELECT * FROM users WHERE id ='$id'");
$test = mysqli_fetch_array($result);
if (!$result) 
        {
        die("Error: Data not found..");
        }
            
                $username= $test['username'] ;  
                $firstname=$test['firstname'] ;
                $lastname=$test['lastname'] ;
            
                $position=$test['position'] ;
                $password=$test['password'] ;

if(isset($_POST['save']))
{   
    $username_save = $_POST['username'];
    $firstname_save = $_POST['firstname'];
    $lastname_save = $_POST['lastname'];
   
    $position_save = $_POST['position'];
    $password_save = $_POST['password'];

    mysqli_query($connection, "UPDATE users SET username ='$username_save', firstname ='$firstname_save',
        lastname ='$lastname_save',position= '$position_save',password ='$password_save' WHERE id = '$id'")
                or die( mysql_error()); 
                
    echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Saved!')
    window.location.href='users.php';
    </SCRIPT>");
    
            
}
mysqli_close($connection);
?>



<div class="panel panel-primary">
                        <div class="panel-heading">
                            User Info
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                
                              <form class="form-vertical" method="POST" >
  <div class="col-md-6">
                                    <div class="form-group col-md-6">

<label for="inputUser" class="sr-only">Name</label>Username:
<input type="text" name="username" pattern="^[+]?\d+([.]\d+)?$" minlength="11" class="form-control" id="inputUser" value="<?php echo $username ?>"/>
  </div>
<div class="form-group col-md-6">
<label for="inputFirstName" class="sr-only">First Name</label>First Name:
<input type="text" name="firstname" pattern="[a-zA-Z]*" class="form-control" id="inputLastName" value="<?php echo $firstname ?>"/>
</div>
                          </div>
                        <div class="col-md-6">
                             <div class="form-group col-md-9">
  <label for="inputLasttName" class="sr-only"></label>Last Name
 <input type="text" name="lastname" pattern="[a-zA-Z ]*" class="form-control" placeholder="Last Name" id="inputLastName" value="<?php echo $lastname ?>"/>
 
</div>
                         <div class="form-group col-md-9">

<label for="inputPosition" class="sr-only">Position</label> Position:
<select type="position" name="position"  class="form-control" id="inputCategory"  value="<?php echo $position ?>"/>
             
             <option value="Cashier">Cashier</option>
             <option value="Checker"> Checker</option>
             </select> 
               </div>
                              <div class="form-group col-md-9">
<label for="inputPassword" class="sr-only">Password</label>Password:
<input type="text" name="password"  class="form-control"  value="<?php echo $password ?>"/>
 </div>
                        
</div>
                  
                          </div>
                             </div>
                              <div class="panel-footer panel-primary">
                         
                                <div class="form-actions" align="right" >                  


<button class="btn btn-primary clearfix" type="save" name="save">Save</button>
   <a href="users.php"><button type="button" class="btn btn-primary  clearfix" name="reset">Back</button></a>
 

                            <div class="clearfix"></div>
                            </div>
                              </form>
            
                        
            </header>
             </div>
             </div>
            </div>
        </div>

    </div>

</body>