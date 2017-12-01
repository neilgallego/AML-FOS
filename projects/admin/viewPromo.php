
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
                    <img src="assets/img/AML.png" class="user-image img-responsive"/>
                    </li>

                        <li><a href="transac.php"><i class="fa fa-home fa-2x" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Home</span></a></li>
                         <!--<li><a href="Summaries.php"><i class="glyphicon glyphicon-list-alt fa-2x" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Summary</span></a></li>-->
                        <li><a  href="users.php"><i class="fa fa-user fa-2x" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Users</span></a></li>
                        <li><a class="active-menu" href="manage.php"><i class="fa fa-cutlery fa-2x" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Menu</span></a></li>
                        <li><a href="tables.php"><i class="fa fa-table fa-2x" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Tables</span></a></li>
                        <li><a href="logs.php"><i class="fa fa-book fa-2x" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Logs</span></a></li>
                     
                    </ul>
                </div>        
                     
           
         </nav>
            
            <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
               <div class="panel-body">
                            <div class="table-responsive">
                             <div class="panel panel-primary">
                        <div class="panel-heading">
                            List of Promos
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                            

 <div class="table-responsive">
                               
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                          <thead>
                                        <tr>
                                           
                                            <th>CODE</th>
                                            <th>NAME</th>
                                            <th>DATE</th>
                                            <th>FROM</th>
                                            <th>TO</th>
                                            <th>STATUS</th>
                                            <th>ACTION</th>
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
    $result = mysqli_query($connection,"SELECT * FROM viewpromo_db  ORDER BY validity ASC;" );
    while($row = mysqli_fetch_array($result))
    {
       ?> 
                    <tr>
                      
                         <td> <?php echo $row['code']; ?></td>
                        <td> <?php echo $row['name']; ?></td> 
                        <td> <?php echo $row['validity']; ?></td> 
                        <td> <?php echo $row['timefrom']; ?></td>
                        <td> <?php echo $row['timeto']; ?></td>
                        <td> <?php echo $row['status']; ?></td>
                      
                        
       
<?php 
                         echo "<td>";
  echo  " <a class='btn btn-danger square-btn-adjust' href=\"delete1.php? id=".$row['id']. "\">
            <span class='glyphicon glyphicon-pencil'></span>";
            echo "Clear";
    echo "</td>";
/*echo "<td>";
  echo  " <a class='btn btn-danger square-btn-adjust' href=\"menuadd.php?\">Edit
            <span class='glyphicon glyphicon-edit'></span>";*/
             ?>
</tr>
    <?php
}
    ?>
                   
            </tbody>
  </table>
 
        
        
                              

                              
                                  
                        </div>
                        </div>      
                        <div class="panel-footer panel-warning">
                        <div class="form-actions" align="right" >
                        <a href="manage.php"><button type="button" class="btn btn-primary  clearfix" name="reset">Back</button></a>
                        </div>
                        <div class="clearfix"></div>
                        </div>
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