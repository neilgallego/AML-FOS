<?php
        session_start();
        $inactive = 600;
       if(isset($_SESSION['logged']) && $_SESSION['logged'] == true) {
             //echo "<h1> Welcome," . $_SESSION['username'] . "! </h1> ";
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
                        <li><a class="active-menu" href="Summaries.php"><i class="glyphicon glyphicon-list-alt fa-2x" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Summary</span></a></li>
                        <li><a href="users.php"><i class="fa fa-user fa-2x" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Users</span></a></li>
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
       <div id="page-wrapper" >
            <div id="page-inner">
       
            <div class="panel-body">
                            <div class="table-responsive">
                    <div class="row" > 
                
                
            <div id="page-inner">
               <div class="panel-body">
                            <div class="table-responsive"> 

                        <?php
                            require('connect.php');
                            // If the values are posted, insert them into the database.
                            if (isset($_POST['from'])){
                                
                                $from = $_POST['from'];
                                $to = $_POST['to'];
                                ?>
                                <table id="example" class="table table-bordered" cellspacing="0" width="50%">
                                  <tbody>
                                  <thead>
                <th>Order Date</th>
                <th>Name</th>
                <th>Quantity</th>
            </tr>
            </thead> 
                                <?php
                                $sql="SELECT *  FROM order_db WHERE order_date BETWEEN '$from' AND '$to' order by order_date";

                                $result = mysqli_query($connection,$sql);

                                  while($row = mysqli_fetch_array($result)) {
                                    ?>                                    
                                  <tr>
                                     <td> <?php echo $row['order_date']; ?></td>
                                     <td> <?php echo $row['order_name']; ?></td>
                                     <td> <?php echo $row['order_quantity']; ?></td>           
                    </tr>
                  </tbody>
                                  <?php
    }
                                
                                }
                            
                            ?>

                             <div class="panel panel-primary">
                        <div class="panel-heading">
                             Summary
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                
                              

                              
                  <table id="example" class="display" cellspacing="0" width="30%">

                                  <meta charset="utf-8">
                                  <meta name="viewport" content="width=device-width, initial-scale=1">
                                  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
                                  <link rel="stylesheet" href="/resources/demos/style.css">
                                  <script src="jquery-1.12.4.js"></script>
                                  <script src="jquery-ui.js"></script>
                                  <script>
                          $( function() {
                            var dateFormat = "mm/dd/yy",
                              from = $( "#from" )
                                .datepicker({
                                  dateFormat: 'yy-mm-dd',
                                  defaultDate: "+1w",
                                  changeMonth: true,
                                  numberOfMonths: 2

                                })
                                .on( "change", function() {
                                  to.datepicker( "option", "minDate", getDate( this ) );
                                }),
                              to = $( "#to" ).datepicker({
                                dateFormat: 'yy-mm-dd',
                                defaultDate: "+1w",
                                changeMonth: true,
                                numberOfMonths: 2
                              })
                              .on( "change", function() {
                                from.datepicker( "option", "maxDate", getDate( this ) );
                              });
                         
                            function getDate( element ) {
                              var date;
                              try {
                                date = $.datepicker.parseDate( dateFormat, element.value );
                              } catch( error ) {
                                date = null;
                              }
                         
                              return date;
                            }
                          } );
              </script>
</head>
<body>
 <form class="form-vertical" method="POST" >
  <div class="form-group col-md-6">
                             <label for="from" class="sr-only"></label>From
        <input type="text" name="from"  class="form-control"   id="from"  required >
      </div>
      <div class="form-group col-md-6">
                <label for="to" class="sr-only"></label>To
        <input type="text" name="to"  class="form-control"   id="to" required >
      </div>
      <div class="form-actions" align="right" >

                                      <button type="submit" class="btn btn-primary" name="submit"><i class="fa fa-filter "></i> Filter</button>  
                                   
                                    
                            </div>

                          </form>




</table>
                                
                                


                                  
                                <!-- //<input type="text" onKeyPress="return ( this.value.length < 10 );"/> -->

                                 
                             
                              
                            
                        
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
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
          <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    
    

</body>
