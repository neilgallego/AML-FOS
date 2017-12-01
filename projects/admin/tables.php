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

                        <li>
                        <a href="transac.php"><i class="fa fa-tachometer fa-2x" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Dashboard</span></a></li>
                         <!--<li><a href="Summaries.php"><i class="glyphicon glyphicon-list-alt fa-2x" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Summary</span></a></li>-->
                        <li><a href="users.php"><i class="fa fa-user fa-2x" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Users</span></a></li>
                        <li><a href="manage.php"><i class="fa fa-cutlery fa-2x" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Menu</span></a></li>
                        <li><a class="active-menu" href="tables.php"><i class="fa fa-table fa-2x" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Tables</span></a></li>
                    <li>
                        <a href="#"><i class="fa fa-cog fa-2x"></i> Settings<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="#">Account Settings<span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>   
                    
                      
                    </ul>
                </div>
    
                       
                     
           
         </nav>
            
            <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
               
 
            <div class="panel-body">
                            <div class="table-responsive">
<!-- /.row -->
<div class="panel panel-primary">
                        <div class="panel-heading">
                              Tables       
                        </div>
                        <div class="panel-body">
                            <div class="form-group col-md-12">  
                              <!-- <a href="register.php" class="icon-info">
                                <i class="btn btn-primary" aria-hidden="true">Add Table</i>
                              </br></a> -->
                            <?php
                            require('connect.php');
                            // If the values are posted, insert them into the database.
                            if (isset($_POST['table_column'])){
                               
                                $table_number = $_POST['table_number'];
                                $table_column = $_POST['table_column'];
                               
                                /*$query = "INSERT INTO `table_db` (table_number) 
                                VALUES ('$table_number')";*/

                                $result = $table_column . '' . $table_number;         
                                $query = "INSERT INTO `table_db` (table_name, table_column,table_number) 
                                VALUES ('$result','$table_column','$table_number')";
                                
                                $result= mysqli_query($connection, $query);
                                /*$result1 = mysqli_query($connection, $query2);*/
                                if($result>=1){
                                echo ("<SCRIPT LANGUAGE='JavaScript'>
                                window.alert('Succesfully Added!')
                                window.location.href='tables.php';
                                </SCRIPT>");
                                }
                                else{
                                  echo ("<SCRIPT LANGUAGE='JavaScript'>
                                window.alert('Table already exists!')
                                window.location.href='tables.php';
                                </SCRIPT>");
                                }
                                }
                              
                            
                            ?>

                              <form class="form-vertical" method="POST" >
                       
                              <div class="col-md-6">
                                    <div class="form-group col-md-6">

                             
                              <select type="position" name="table_column" id="inputTableColumn" placeholder="Catergory" class="form-control" required>
                                  <option value="A">A</option>
                                  <option value="B">B</option>
                                  <option value="C">C</option>
                                  <option value="D">D</option>
                                  <option value="S">S</option>
                                </select>
                            </br>
                           <input type="text" name="table_number" class="form-control" placeholder="Table Name" id="inputTableName" required="">
                          
                 
                            </div>

            <input type="submit" name="Submit" value="Add Table" class="btn btn-warning"/>
                             
                                 </div>

                            <div style="width: 50%; height: 500px; overflow-y: scroll;">
             <table id="example" class="table table-bordered"  width="100%">
        <thead>
            <tr>
                <th>Table Name</th>
                
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
    $result = mysqli_query($connection,"SELECT table_id,table_name FROM table_db order by table_column,table_name ");

    while($row = mysqli_fetch_array($result))
    {
       ?> 
<tr>
      <td> <?php echo $row['table_name']; ?></td>
      
    <!-- <td> <?php echo $row['status']; ?></td> -->
  <?php 
echo "<td>";
  echo  " <a class='btn btn-danger square-btn-adjust ' href=\"delete1.php? table_id=".$row['table_id']. "\">Remove
            <span class='glyphicon glyphicon-remove'></span>";
            
echo "</td>";
    ?>
</tr>
    <?php
}
    ?>
        </tbody>
    </table>
</br>
              </header>
                   </div>
                </div>
    </br>

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



