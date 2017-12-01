<?php
        session_start();
        $inactive = 600;
        if(isset($_SESSION['logged']) && $_SESSION['logged'] == true) {
          
        } else {
            header('Location: ../index.php');
        }
       
        include "dbase.php";
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

                        <li>
                        <a  href="transac.php"><i class="fa fa-tachometer fa-2x" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Dashboard</span></a></li>
                         <!--<li><a href="Summaries.php"><i class="glyphicon glyphicon-list-alt fa-2x" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Summary</span></a></li>-->
                        <li><a href="users.php"><i class="fa fa-user fa-2x" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Users</span></a></li>
                        <li><a href="manage.php"><i class="fa fa-cutlery fa-2x" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Menu</span></a></li>
                        <li><a href="tables.php"><i class="fa fa-table fa-2x" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Tables</span></a></li>
                        <li><a  class="active-menu" href="logs.php"><i class="fa fa-book fa-2x" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Logs</span></a></li>  
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
                                       <li>
                                        <a href="change_password.php">Change Override Password</a>
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
 
                         <div class="row" > 
                <div class="col-md-9 offset-md-3">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                          <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            Order Log
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
        <table   class="table table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
 <h2>  

            <thead>
                <th>OrderTime</th>
                <th>Time Served</th>
                <th>Order Date</th>
                <th>Order Waiter</th>
                <th>Order name</th>
                <th>Order Quantity</th>

            </tr>
            </thead>
            <tbody>
                <?php
                if(isset($_REQUEST["search_submit"])){
                    $index = 0;
                    $time = $_REQUEST[""];
                    $stmt = $dbase->getTransac($time);
                    mysqli_stmt_bind_result($stmt, $order_time, $order_date,$order_waiter, $order_name, $order_quantity);
                    while(mysqli_stmt_fetch($stmt)){
                        $index++
                        ?>
                        <tr>
                            <td><?php echo $time; ?> </td>
                            <td><?php echo $Tno; ?></td>
                            <td><?php echo $Tbill; ?></td>
                            >
                        </tr>
                    <?php
                    }
                    ?>
                <?php   
                }
                    else{
                        if(isset($_GET["start"]) == false ){
                            $start = 0;
                            $end = 10;
                        }
                        $stmt = $dbase->getlogs($start, $end);
                        mysqli_stmt_bind_result($stmt, $order_time,$order_served, $order_date,$order_waiter, $order_name, $order_quantity);
                        while(mysqli_stmt_fetch($stmt)){
                    ?>
                    <tr>
                        <td><?php echo $order_time; ?></td>
                        <td><?php echo $order_served; ?></td>
                        <td><?php echo $order_date; ?></td>
                        <td><?php echo $order_waiter; ?></td>
                        <td><?php echo $order_name; ?></td>
                        <td><?php echo $order_quantity; ?></td>
                    </tr>
                    <?php
                }
                    }
                    ?>
                    
</table>
</div>
</div>
</div>
</div>
</div>
                       
                    </div>
                </div>
                <hr />
                 <!-- /. ROW  -->
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