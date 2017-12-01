
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

                        <li><a href="transac.php"><i class="fa fa-tachometer fa-2x" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Dashboard</span></a></li>
                         <!--<li><a href="Summaries.php"><i class="glyphicon glyphicon-list-alt fa-2x" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Summary</span></a></li>-->
                        <li> <a class="active-menu" href="users.php"><i class="fa fa-user fa-2x" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Users</span></a></li>
                        <li><a href="manage.php"><i class="fa fa-cutlery fa-2x" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Menu</span></a></li>
                        <li><a href="tables.php"><i class="fa fa-table fa-2x" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Tables</span></a></li> 
                           
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
                  
 
               

        
                        <?php







                            require('connect.php');
                            // If the values are posted, insert them into the database.
                            if (isset($_POST['username']) && isset($_POST['password'])){
                                
                                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                                var_dump($hashed_password);

                                $username = $_POST['username'];
                                $email = $_POST['email'];
                                
                                $password = $_POST['password'];
                                $position = $_POST['position'];
                                $lastname = $_POST['lastname'];
                                $firstname = $_POST['firstname'];
                                
                                

                                $query = "INSERT INTO `users` (username, firstname, lastname, password,position, email) 
                                VALUES ('$username', '$firstname', '$lastname','$hashed_password', '$position', '$email')";
                                $result = mysqli_query($connection, $query) or die(mysql_error());;
                                if($result){
                                echo ("<SCRIPT LANGUAGE='JavaScript'>
                                window.alert('Succesfully Registered')
                                window.location.href='users.php';
                                </SCRIPT>");
                                }
                            }
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
                             <label for="inputUser" class="sr-only"></label>Username
                              
                              <input type="text" name="username" pattern="^[+]?\d+([.]\d+)?$" class="form-control" placeholder="Contact No." minlength="11" id="inputUser"required >
                          </div>
                                    <div class="form-group col-md-6">
                              <label for="inputLasttName" class="sr-only"></label>Last Name
                              <input type="text" name="lastname" pattern="[a-zA-Z ]*" class="form-control" placeholder="Last Name" id="inputLastName" required>

                                 </div>
                                </div>

                                <div class="col-md-6">
                                <div class="form-group col-md-9">
                                     <label for="inputFirstName" class="sr-only"></label>First Name
                              <input type="text" name="firstname" pattern="[a-zA-Z ]*" class="form-control" placeholder="First Name" id="inputFirstName" required >
                              
                                </div>

                                <!-- <label for="inputEmail" class="sr-only">Email Address</label>
                                <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email Address" required autofocus> -->
                                 <div class="form-group col-md-9">
                                <label for="inputPosition" class="sr-only"></label>Position
                                <select type="position" name="position" id="inputPosition" placeholder="Position" class="form-control" required>
                                 
                                  <option value="Checker">Checker</option>
                                  <option value="Cashier">Cashier</option>
                                </select> 
                                 </div>

                                  <div class="form-group col-md-9">
                                <label for="inputPassword" class="sr-only"></label>Password
                                <input type="password" name="password" id="pass2"  class="form-control" placeholder="Password" required minlength="8">
                                </div>
                                <!-- //<input type="text" onKeyPress="return ( this.value.length < 10 );"/> -->

                                 <div class="form-group col-md-9">
                                    <label  for="inputPassword" class="sr-only"></label>Confirm Password
                                        <input type="password" class="form-control"  onkeyup="checkPass(); return false;"  id="pass1" />
                                        <span id="confirmMessage" class="confirmMessage"></span>
                                   

                                    </div>
                             </div>
                                    </div>
                             </div>
                              <div class="panel-footer panel-primary">
                         
                                <div class="form-actions" align="right" >
                                    
                                    <input type="submit" class="btn btn-primary clearfix" name="Submit" value="Register" class="btn btn-success"/>
                                    <a href="users.php"><button type="button" class="btn btn-primary  clearfix" name="reset">Back</button></a>
                            </div>
                            <div class="clearfix"></div>
                            </div>
                              </form>
                        
                    </header>
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

        <!-- /. PAGE INNER  -->
           
         <!-- /. PAGE WRAPPER  -->
   
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
</body>