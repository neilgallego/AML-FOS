<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Free Bootstrap Admin Template : Binary Admin</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
   
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
                <a class="navbar-brand" href="index.html">Binary admin</a> 
            </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"> Last access : 30 May 2014 &nbsp; <a href="#" class="btn btn-danger square-btn-adjust">Logout</a> </div>
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <img src="assets/img/find_user.png" class="user-image img-responsive"/>
					</li>
				
					
                    <li>
                        <a  href="index.html"><i class="fa fa-dashboard fa-3x"></i> Dashboard</a>
                    </li>
                   <li>
                        <a  href="ui.html"><i class="fa fa-desktop fa-3x"></i> UI Elements</a>
                    </li>
                    <li>
                        <a  href="tab-panel.html"><i class="fa fa-qrcode fa-3x"></i> Tabs & Panels</a>
                    </li>
						   <li  >
                        <a  href="chart.html"><i class="fa fa-bar-chart-o fa-3x"></i> Morris Charts</a>
                    </li>	
                      <li  >
                        <a class="active-menu"  href="table.html"><i class="fa fa-table fa-3x"></i> Table Examples</a>
                    </li>
                    <li  >
                        <a  href="form.html"><i class="fa fa-edit fa-3x"></i> Forms </a>
                    </li>				
					
					                   
                    <li>
                        <a href="#"><i class="fa fa-sitemap fa-3x"></i> Multi-Level Dropdown<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="#">Second Level Link</a>
                            </li>
                            <li>
                                <a href="#">Second Level Link</a>
                            </li>
                            <li>
                                <a href="#">Second Level Link<span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="#">Third Level Link</a>
                                    </li>
                                    <li>
                                        <a href="#">Third Level Link</a>
                                    </li>
                                    <li>
                                        <a href="#">Third Level Link</a>
                                    </li>

                                </ul>
                               
                            </li>
                        </ul>
                      </li>  
                  <li  >
                        <a   href="blank.html"><i class="fa fa-square-o fa-3x"></i> Blank Page</a>
                    </li>	
                </ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Table Examples</h2>   
                        <h5>Welcome Jhon Deo , Love to see you back. </h5>
                       
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
               
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Advanced Tables
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>

                                            <th>ITEM NAME</th>
                                            <th>Browser</th>
                                            <th>Platform(s)</th>
                                            <th>Engine version</th>
                                            <th>CSS grade</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                     <?php
                if(isset($_REQUEST["search_submit"])){
                    $index = 0;
                    $time = $_REQUEST[""];
                    $stmt = $dbase->getMenu($name);
                    mysqli_stmt_bind_result($stmt,$name,$code,$item_category,$item_happyprice, $item_regularprice);
                    while(mysqli_stmt_fetch($stmt)){
                        $index++
                        ?>
                        <tr>
                            <td><?php echo $name; ?> </td>
                            <td><?php echo $code; ?></td>
                            <td><?php echo $item_category; ?></td>
                            <td><?php echo $item_happyprice; ?></td>
                            <td><?php echo $item_regularprice; ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                <?php   
                }
                    else{
                        if(isset($_GET["start"]) == false ){
                            $start = 0;
                            $end = 100;
                        }
                        $connection=mysqli_connect("localhost","root","","aml_db");
                            // Check connection
                            if (mysqli_connect_errno())
                              {
                              echo "Failed to connect to MySQL: " . mysqli_connect_error();
                              }
                            $result = mysqli_query($connection,"SELECT * FROM menu_db order by item_category,name");
                            while($row = mysqli_fetch_array($result))
                         {


                       /* $stmt = $dbase->getMenu($start, $end);
                        mysqli_stmt_bind_result($stmt,$name,$code,$item_category,$item_happyprice, $item_regularprice);
                        while(mysqli_stmt_fetch($stmt)){*/
                    ?>
                    <tr>
                        <td> <?php echo $row['name']; ?></td>
                          <td> <?php echo $row['code']; ?></td>
                          <td> <?php echo $row['item_category']; ?></td>
                        <td> <?php echo $row['item_happyprice']; ?></td> 
                        <td> <?php echo $row['item_regularprice']; ?></td>
                        <td> <?php echo $row['item_commission']; ?></td>
                        <!-- <td><?php echo $name; ?></td>
                        <td><?php echo $code; ?></td>
                        
                        <td><?php echo $item_category; ?></td>
                        <td><?php echo $item_happyprice; ?></td>
                        <td><?php echo $item_regularprice; ?></td> -->
                         <?php 
                         echo "<td>";
  echo  " <a class='btn btn-danger square-btn-adjust' href=\"editMenu.php? menuitem_id=".$row['menuitem_id']. "\">
            <span class='glyphicon glyphicon-pencil'></span>";
            echo "Edit";
    echo "</td>";
/*echo "<td>";
  echo  " <a class='btn btn-danger square-btn-adjust' href=\"menuadd.php?\">Edit
            <span class='glyphicon glyphicon-edit'></span>";*/
            ?>
                    </tr>
                    <?php
                }
                    }
                    ?>
                                       
                                        
                                        
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
             
                </div>
            </div>
                <!-- /. ROW  -->
        </div>
               
    </div>
             <!-- /. PAGE INNER  -->
            </div>
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
            });
    </script>
         <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html>
