<?php
        session_start();
        $inactive = 600;
        if(isset($_SESSION['logged']) && $_SESSION['logged'] == true) {
           //echo "<h1> Welcome," . $_SESSION['username'] . "! </h1> ";
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
                <a class="navbar-brand" href="transac.php">Alberto's Music Lounge</a> 
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
                    <img src="assets/img/find_user.png" class="user-image img-responsive"/>
                    </li>

                        <li><a href="transac.php"><i class="fa fa-home fa-2x" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Home</span></a></li>
                        <li><a href="Summaries.php"><i class="glyphicon glyphicon-list-alt fa-2x" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Summary</span></a></li>
                        <li><a href="tables.php"><i class="fa fa-table fa-2x" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Tables</span></a></li> 
                        <li ><a href="users.php"><i class="fa fa-user fa-2x" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Users</span></a></li>
                        <li><a href="manage.php"><i class="fa fa-cutlery fa-2x" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Manage Menu</span></a></li>
                        <li><a href="tables.php"><i class="fa fa-table fa-2x" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Tables</span></a></li> 
                       
                    </ul>
                </div>
    
                       
                     
           
         </nav>
            
            <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">  

          
                     <hr/> 
 
            
<!-- /.row -->
<div class="panel panel-primary">
                        <div class="panel-heading">
                              Tables       
                        </div>
                        <div class="panel-body">
                            <div class="form-group col-md-12">  



						<?php
							require('connect.php');
							// If the values are posted, insert them into the database.
							if (isset($_POST['idnum']) && isset($_POST['password'])){
								$idnum = $_POST['idnum'];
								$contact = $_POST['contact'];
								$password = $_POST['password'];
								$position = $_POST['position'];
                                $lastname = $_POST['lastname'];
                                $firstname = $_POST['firstname'];
                                /* $confirmpassword = $_POST['confirmpassword'];*/
                                
                               /* if ($password != $confirmpassword) {
                                echo("<SCRIPT LANGUAGE='JavaScript'>
                                     window.alert('Password do not match!')
                                     window.location.href='register.php';
                                     </SCRIPT>");
                               
                                }*/
						 
								$query = "INSERT INTO `user` (idnum, password, contact, position, firstname, lastname) VALUES ('$idnum', '$password', '$contact', '$position', '$firstname', '$lastname')";
								$result = mysqli_query($connection, $query) or die(mysql_error());;
								if($result){
    echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Succesfully Registered')
    window.location.href='users.php';
    </SCRIPT>");
}
							}
							?>

				
							  <form class="form-signin" method="POST" style="width: 320px">
								<h2 class="form-signin-heading">Register a new account</h2>

								<div class="form-group">
							  
                              <label for="inputUser" class="sr-only">ID Number</label>
							  <input type="text" name="idnum" class="form-control" placeholder="ID Number" id="inputUser"required >

							  <label for="inputFirstName" class="sr-only">First Name</label>
                              <input type="text" name="firstname" class="form-control" placeholder="First Name" id="inputFirstName" required>

                              <label for="inputLasttName" class="sr-only">Last Name</label>
                              <input type="text" name="lastname" class="form-control" placeholder="Last Name" id="inputLastName" required>


								<label for="inputEmail" class="sr-only">Contact No.</label>
								<input type="text" name="contact" id="inputContact" class="form-control" placeholder="Contact No." maxlength="12" required autofocus>

								<label for="inputPosition" class="sr-only">Position</label>
								<select type="position" name="position" id="inputPosition" placeholder="Position" class="form-control" required>
								  <option value="" default="" selected="">Position</option>
                                  <option value="Admin">Admin</option>
								  <option value="Checker">Checker</option>
								  <option value="Cashier">Cashier</option>
								</select> 

								<label for="inputPassword" class="sr-only">Password</label>
								<input type="password" name="password" id="password" class="form-control" placeholder="Password" >

                           <!--      <label for="inputConfirmPassword" class="sr-only"> Confirm Password</label>
                                <input name="confirmpassword" type="password" id="confirmpassword" class="form-control" placeholder="Confirm Password" required></td> -->
                                </br>
                                <button class="btn btn-lg btn-primary btn-block" type="reset">Reset</button>
                                <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
							 </div>
                              </form>

                                
						
					</header>
                    </div>
                </div>
            </div>
        </div>

    </div>



</body>
