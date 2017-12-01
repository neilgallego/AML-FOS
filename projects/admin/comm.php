
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
               

                             <div class="panel panel-primary">
                        <div class="panel-heading">
                          
                           Waiter Commissions
                        </div>
                        </br>
                         <div class="panel-body">
                            <div class="table-responsive">
               <div class="row">
                    <div class="col-md-8">
                         <form role="form" name="submit" action="comm.php" method="post">
                     
                     <div class="form-group col-md-3"> 
                      <label for="from" class="sr-only"></label>From
                                <input type="text" name="from"  class="form-control"   id="from"  required >
                              </div>
                              <div class="form-group col-md-3">
                                        <label for="to" class="sr-only"></label>To
                                <input type="text" name="to"  class="form-control"   id="to" required >
                              </div>
                          </br>
                             
                                
                           <button type="submit" class="btn btn-primary" name="submit"><i class="fa fa-filter "></i> Filter</button>  
                                   
                                    
                
                                  
               </form>
                    </div>
                    <div class="col-md-4">
                        <br/>
                        <button class="btn btn-primary" onclick="savePdf();"><i class="fa fa-save "></i> Save Report</button>
                        <button class="btn btn-primary" onclick="printContent('row')"><i class="fa fa-print "></i> Print Content</button>
                    </div>
                 
                  </div>
                 

            <hr / >

           
            <div class="row" id="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                   
                        
                            <div>
                                    <center>
                                       
                                        
                                      
                                        <span><strong>Waiter Charges</strong></span>
                                       
                                        <!--<span><strong><?php echo $monthName . ' ' . $year; ?></strong></span>-->
                                    </center>
                                </div>
                            <br/>
                            <div class="table-responsive">
                               
                        
                         

                      <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                  <tbody>
                                  <thead>
                                        <th>Date</th>
                                         <th>Waiter</th>
                                        <th>Time</th>
                                        <th>Name</th>                                      
                                       
                                        
                                        <th>Commission</th>
                                    </tr>
                                    </thead>

                                    <?php
                            require('connect.php');
                            // If the values are posted, insert them into the database.
                            if (isset($_POST['from'])){
                                
                                $from = $_POST['from'];
                                $to = $_POST['to'];
                                ?>                                <?php
                                $sql="SELECT *  FROM waitercomm_history WHERE date_history BETWEEN '$from' AND '$to' order by waitername_history";

                                $result = mysqli_query($connection,$sql);

                                  while($row = mysqli_fetch_array($result)) {
                                    ?>                                    
                                  <tr>
                                     <td> <?php echo $row['date_history']; ?></td>
                                       <td> <?php echo $row['waitername_history']; ?></td>
                                     <td> <?php echo $row['time_history']; ?></td>
                                     <td> <?php echo $row['iname_history']; ?></td>
                                    
                                   
                                     <td> <?php echo $row['itemcomm_history']; ?></td>            
                                        </tr>
                                      
                                                      <?php
                        }
                                
                                }
                            
                            ?>


                

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
                                  numberOfMonths: 1

                                })
                                .on( "change", function() {
                                  to.datepicker( "option", "minDate", getDate( this ) );
                                }),
                              to = $( "#to" ).datepicker({
                                dateFormat: 'yy-mm-dd',
                                defaultDate: "+1w",
                                changeMonth: true,
                                numberOfMonths: 1
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
    </tbody>
                       </table>


 </div>

                                 </div>
                                  </div>
                              <div class="panel-footer panel-primary">
                         
                                <div class="form-actions" align="right" >
                                <a href="users.php"><button type="button" class="btn btn-primary  clearfix" name="reset">Back</button></a>
 
                                </div>
                                <div class="clearfix"></div>
                                </div>
                                      </form>   
                     
                        
                    </header>
                    </div>
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
    
    <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/jspdf.debug.js"></script>
    <script src="assets/js/html2canvas.js"></script>
    <script src="assets/js/jquery-1.12.4.js"></script>
    <script src="assets/js/jquery-ui.js"></script>
    

</body>
    <script type="text/javascript">

    function printContent(el){
    var restorepage = document.body.innerHTML;
    var printcontent = document.getElementById(el).innerHTML;
    document.body.innerHTML = printcontent;
    window.print();
    document.body.innerHTML = restorepage;
    }
    </script>

    <script type="text/javascript">
    function savePdf() {
        
      var pdf = new jsPDF();
      var elem1 = document.getElementById("row");
      var elem2 = document.body;
    
    pdf.addHTML(elem1, function() {
        pdf.save('WaiterReports.pdf');
    });

}
    </script>
</body>
</html>