
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
                        <li><a class="active-menu" href="users.php"><i class="fa fa-user fa-2x" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Users</span></a></li>
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
                             <div class="panel panel-warning">
                        <div class="panel-heading">
                             Waiter Info
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                            

<?php


                            require('connect.php');
                            // If the values are posted, insert them into the database.
                            if (isset($_POST['Nname'])){
                                
                             /*   $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                                var_dump($hashed_password);*/

                                
                                $Lname = $_POST['Lname'];
                                $Nname = $_POST['Nname'];
                                $Position = $_POST['Position'];
                                

                                $query = "INSERT INTO `employee` ( Nname, Lname, Position) 
                                VALUES ('$Nname', '$Lname','$Position')";
                                $result = mysqli_query($connection, $query) or die(mysql_error());;
                                if($result){
                                echo ("<SCRIPT LANGUAGE='JavaScript'>
                                window.alert('Succesfully Registered')
                                window.location.href='users.php';
                                </SCRIPT>");
                                }
                            }
                            ?>
        
                              <form class="form-vertical" method="POST" >
                       
                              <div class="col-md-6">
                                    <div class="form-group col-md-6">
                              <label for="inputFirstName" class="sr-only"></label>First Name
                              <input type="text" name="Nname" pattern="[a-zA-Z]*" class="form-control" placeholder="First Name" id="inputFirstName" required >
                          </div>
                                    <div class="form-group col-md-6">
                              <label for="inputLasttName" class="sr-only"></label>Last Name
                              <input type="text" name="Lname" pattern="[a-zA-Z ]*" class="form-control" placeholder="Last Name" id="inputLastName" required>


                                 </div>
                                </div>

                                <div class="col-md-6">

                                <!-- <label for="inputEmail" class="sr-only">Email Address</label>
                                <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email Address" required autofocus> -->
                                 <div class="form-group col-md-9">
                                <label for="inputPosition" class="sr-only"></label>Position
                                <input type="position" name="Position" value="Waiter" placeholder="Position" class="form-control" readonly="readonly">
                                   
                               
                                 </div>

                                  
                                <!-- //<input type="text" onKeyPress="return ( this.value.length < 10 );"/> -->

                                 
                             </div>
                                    </div>
                             </div>
                              <div class="panel-footer panel-warning">
                         
                                <div class="form-actions" align="right" >
                                     <input type="submit" class="btn btn-primary clearfix" name="Submit" value="Add" class="btn btn-success"/>
                                    <a href="users.php"><button type="button" class="btn btn-primary  clearfix" name="reset">Back</button></a>
                            </div>
                            <div class="clearfix"></div>
                            </div>
                              </form>
                               </div>
                                </div>
                                         
             
                          

                    </header>
                    </div>
                </div>
 
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