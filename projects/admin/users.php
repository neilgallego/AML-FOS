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
   <!-- TABLE STYLES-->
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
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
                        <a href="transac.php"><i class="fa fa-tachometer fa-2x" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Dashboard</span></a></li>
                         <!--<li><a href="Summaries.php"><i class="glyphicon glyphicon-list-alt fa-2x" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Summary</span></a></li>-->
                        <li><a class="active-menu"  href="users.php"><i class="fa fa-user fa-2x" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Users</span></a></li>
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
            <div class="row"> 
        </br>                 
        <div class="col-md-9 col-sm-12 col-xs-12" >
        <div class="panel panel-primary">
        <div class="panel-heading">
           <i class="fa fa-eye" aria-hidden="true"></i> &nbsp;
               Users       
        </div>      
 <div class="panel-body">
 <div class="table-responsive">
 <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
            <tr>
               <th>Username</th>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Position</th>
                 <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
<?php
        $connection=mysqli_connect("localhost","root","","aml_db");
    // Check connection
    if (mysqli_connect_errno())
      {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }
    $result = mysqli_query($connection,"SELECT * FROM users where position != 'waiter'");
    while($row = mysqli_fetch_array($result))
    {
       ?> 
<tr>
   <td> <?php echo $row['username']; ?></td>
      <td> <?php echo $row['firstname']; ?></td>
      <td> <?php echo $row['lastname']; ?></td>
      <td> <?php echo $row['position']; ?></td>
    <!-- <td> <?php echo $row['email']; ?></td>  --> 
    <td> <?php echo $row['status']; ?></td>
  <?php 
echo "<td>";
  echo  " <a class='btn btn-danger btn-square' href=\"delete.php?id=".$row['id']. "\">
            <span class='glyphicon glyphicon-remove'></span> </a>" ;
  echo  " <a class='btn btn-warning btn-square' href=\"activate.php?id=".$row['id']. "\">
            <span class='glyphicon glyphicon-ok'></span> </a>";
  echo  " <a  class='btn btn-info btn-square' href=\"edit.php?id=".$row['id']. "\">
            <span class='glyphicon glyphicon-pencil'></span> </a>";
  echo "</td>";
    ?>
</tr>
    <?php
}
    ?>
    </tbody>
    </table>
    </div>
    </div>
    </div>
    </div>
               

 <div class="col-md-3 col-sm-12 col-xs-12">
  <div class="panel panel-success">
  <div class="panel-heading">
       <i class="fa fa-edit" aria-hidden="true"></i> &nbsp;
       Create a new entry
  </div>
  <div class="panel-body">
    <label>Single Data Entry</label>
     <br>
     <div class="form-group">
      <a href="register.php"><button class="btn btn-primary"><i class="fa fa-eye "></i> User</button></a>
       </div>
        <div class="form-group">
          <a href="registerwaiter.php"><button class="btn btn-warning"><i class="fa fa-users "></i> Waiter</button></a>  
         <hr>
                           </div>
                           
                      </div>
                    </div>  
 </div>
  <div class="col-md-3 col-sm-12 col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Action Legend
                        </div>
                        <div class="panel-body">
                         
                            <h5> <span class="btn btn-danger btn-square"><i class='glyphicon glyphicon-remove'aria-hidden="true"></span></i> &nbsp; - Deactivate</h5>
                            <h5><span class="btn btn-warning btn-square"><i class='glyphicon glyphicon-ok'aria-hidden="true"></span></i> &nbsp;- Activate</h5>
                            <h5><span class="btn btn-info btn-square"><i class='glyphicon glyphicon-pencil'aria-hidden="true"></span></i> &nbsp; - Edit</h5> 
                      </div>
                    </div>        
                </div>

 
<div class="col-md-9 col-sm-12 col-xs-12" >
        <div class="panel panel-warning">
        <div class="panel-heading">
            <i class="fa fa-users" aria-hidden="true"></i> &nbsp;
              Waiters      
        </div>      
 <div class="panel-body">
<div class="table-responsive">
 <table class="table table-striped table-bordered table-hover" id="awardee">
   <thead>
 <tr>
                <th>First Name</th>
                <th>Last Name</th>
            </tr>
        </thead>
        <tbody>

<?php
        $connection=mysqli_connect("localhost","root","","aml_db");
    // Check connection
    if (mysqli_connect_errno())
      {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }
    $result = mysqli_query($connection,"SELECT * FROM employee");
    while($row = mysqli_fetch_array($result))
    {
       ?> 
<tr>
      <td> <?php echo $row['Nname']; ?></td>
      <td> <?php echo $row['Lname']; ?></td>
    
  <?php 

    ?>
</tr>
    <?php
}
    ?>

</tbody>
</table>
 </div>
 </div>
 </div>
 </div>
  <div class="col-md-3 col-sm-12 col-xs-12">
  <div class="panel panel-warning">
  <div class="panel-heading">
       <i class="fa fa-edit" aria-hidden="true"></i> &nbsp;
       View History
  </div>
  <div class="panel-body">
     <br>
     <div class="form-group">
      <a href="comm.php"><button class="btn btn-success"><i class="fa fa-plus "></i> View Commission</button></a>
       </div>
        <div class="form-group">
          <a href="history.php"><button class="btn btn-danger"><i class="fa fa-minus "></i> View Charges</button></a>  
         <hr>
                           </div>
                           
                      </div>
                    </div>  
 </div>
  </div>


      <!-- Modal 
      <div class="modal fade" id="myModal" role="dialog">
          <div class="modal-dialog modal-lg"style="width:33%;">
            <div class="modal-content">
       <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal">&times;</button>
         <h4 class="modal-title">Register A New Account</h4>
       </div>
       <div class="modal-body">
            <div class="form-group">
         <form class="form-signin" method="POST" style="width:320px">
                           <label for="inputUserName" class="sr-only"></label>Username
                             <input type="text" name="firstname" class="form-control" placeholder="First Name" id="inputFirstName" required>
                             <label for="inputFirstName" class="sr-only"></label>First Name
                             <input type="text" name="firstname" class="form-control" placeholder="First Name" id="inputFirstName" required>
                             <label for="inputLasttName" class="sr-only"></label>Last Name
                             <input type="text" name="lastname" class="form-control" placeholder="Last Name" id="inputLastName" required>
                               <label for="inputEmail" class="sr-only">Email Address</label>
                               <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email Address" required autofocus> 
                               <label for="inputPosition" class="sr-only"></label>Position
                               <select type="position" name="position" id="inputPosition" placeholder="Position" class="form-control" required>
                                
                                 <option value="Admin">Admin</option>
                                 <option value="Checker">Checker</option>
                                 <option value="Cashier">Cashier</option>

                               </select> 
                               <label for="inputPassword" class="sr-only"></label>Password
                               <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
                                 </div>
                               <button class="btn btn-lg btn-primary btn-block" type="reset">Reset</button>
                               <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
                             </form>    
       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
     <!-- DATA TABLE SCRIPTS -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
    <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
                 $('#awardee').dataTable();
            });
    </script>
         <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap-filestyle.min.js"> </script>
</body>
</html>