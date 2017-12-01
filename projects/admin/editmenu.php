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
                    <li>
                        <a  href="transac.php"><i class="fa fa-tachometer fa-2x" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Dashboard</span></a></li>
                         <!--<li><a href="Summaries.php"><i class="glyphicon glyphicon-list-alt fa-2x" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Summary</span></a></li>-->
                        <li><a href="users.php"><i class="fa fa-user fa-2x" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Users</span></a></li>
                        <li><a class="active-menu" href="manage.php"><i class="fa fa-cutlery fa-2x" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Menu</span></a></li>
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
  
require("connect.php");
$menuitem_id =$_REQUEST['menuitem_id'];

$result = mysqli_query($connection,"SELECT * FROM menu_db WHERE menuitem_id =$menuitem_id");
$test = mysqli_fetch_array($result);
if (!$result) 
        {
        die("Error: Data not found..");
        }
            
                $name= $test['name'] ;  
                $item_category=$test['item_category'] ;
                $item_happyprice=$test['item_happyprice'] ;
            
                $item_regularprice=$test['item_regularprice'] ;
                $item_availability=$test['item_availability'] ;
                $code=$test['code'] ;
                $item_commission=$test['item_commission'] ;
                 $item_discount=$test['item_discount'] ;


if(isset($_POST['save']))
{   
    $name_save = $_POST['name'];
    $item_category_save = $_POST['item_category'];
    $item_happyprice_save = $_POST['item_happyprice'];
   
    $item_regularprice_save = $_POST['item_regularprice'];
    $item_avalability_save = $_POST['item_availability'];
    $item_commission_save= $_POST['item_commission'];
    $item_discount_save=$_POST['item_discount'] ;

    mysqli_query($connection, "UPDATE menu_db SET name ='$name_save', item_category ='$item_category_save',
    item_happyprice ='$item_happyprice_save',item_regularprice= '$item_regularprice_save',item_availability ='$item_avalability_save',item_commission='$item_commission_save',item_discount ='$item_discount_save' WHERE menuitem_id = '$menuitem_id'")
                or die( mysql_error()); 
                
    echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Saved!')
    window.location.href='manage.php';
    </SCRIPT>");
    
            
}
                        include "dbase.php";
                        $dbase = new Database;
                            if(isset($_REQUEST["savers"])){
                                     $nameSearched = $_REQUEST['name'];
                                            //$item_categorys = $_POST['item_category'];               
                                            // get first the value of email address which is located below @ 
                                            $activate = $dbase->activate($nameSearched);
                                            // $dbase->activeMember($emailAddress); //this is commented for $emailAddress' value is null, thus no updates are happening
                                            //echo '<script>alert("Succesfully updated member status to active");</script>';
                                   }//end if
                                    if(isset($_REQUEST["saverss"])){
                                    $nameSearcheds = $_REQUEST['name'];
                                            //$item_categorys = $_POST['item_category'];
                                            // get first the value of email address which is located below @ 
                                            $activate = $dbase->deactivate($nameSearcheds);
                                            // $dbase->activeMember($emailAddress); //this is commented for $emailAddress' value is null, thus no updates are happening
                                            //echo '<script>alert("Succesfully updated member status to active");</script>';
                                   }
mysqli_close($connection);
?>
<div class="panel panel-primary">
                        <div class="panel-heading">
                             Item Info
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                
                              <form class="form-vertical" method="POST" >
  <div class="col-md-6">
                                    <div class="form-group col-md-6">

                            <label for="inputName" class="sr-only"></label>Name:
                            <input type="text"  class="form-control"  name="name"  value="<?php echo $name; ?>">
                         </div>


                         <div class="form-group col-md-6">
                        
                            <label for="inputCategory" class="sr-only"></label>Category:
                            <select type="item_category"  class="form-control" name="item_category"  value="<?php echo $item_category; ?>">
                                  <option value="Appetizer">APPETIZZER</option>
                                  <option value="BARBEQUES/INIHAW">BARBEQUES/INIHAW</option>
                                  <option value="SPECIAL SANDWICHES"> SPECIAL SANDWICHES</option>
                                  <option value="SIZZLING">SIZZLING</option>
                                  <option value="SHOOTERS">SHOOTERS</option>
                                  <option value="RICE/TOPPINGS">RICE/TOPPINGS</option>
                                  <option value="NOODLES/SOUPS">NOODLES/SOUPS</option>
                                  <option value="PITCHER COCKTAILS">PITCHER COCKTAILS</option>
                                  <option value="MOCKTAIL COLD and HOT BEVERAGES">MOCKTAIL COLD and HOT BEVERAGES</option>
                                  <option value="FRUIT SHAKES">FRUIT SHAKES</option>
                                  <option value="COMBO">COMBO</option>
                                </select> 
                        </div>
                        <div class="form-group col-md-6">
                         <label for="inputEmail" class="sr-only">Commission</label>Item Discount %
                                <input type="text" name="item_discount" pattern="^[+]?\d+([.]\d+)?$" class="form-control" value="<?php echo $item_discount; ?>">
                              </div>
                          </div>
                        <div class="col-md-6">
                             <div class="form-group col-md-9">
                            <label for="inputHappy" class="sr-only"></label> Happy Hour Price:
                            <input type="text" class="form-control" pattern="^[+]?\d+([.]\d+)?$" name="item_happyprice"  value="<?php echo $item_happyprice; ?>">
                        </div>
                         <div class="form-group col-md-9">
                              <label for="inputRegular" class="sr-only"></label>Regular Hour Price:
                            <td><input type="text" class="form-control" pattern="^[+]?\d+([.]\d+)?$" name="item_regularprice"  value="<?php echo $item_regularprice; ?>" >
                        </div>
                              <div class="form-group col-md-9">
                              <label for="inputComm" class="sr-only"></label>Item Commision:
                            <td><input type="text" class="form-control" pattern="^[+]?\d+([.]\d+)?$" name="item_commission"  value="<?php echo $item_commission; ?>" >
                        </div>
                        <div class="form-group col-md-9">
                              <label for="inputAvail" class="sr-only"></label>Item Availability:
                            <td><input type="text" class="form-control" name="item_availability" readonly="readonly" value="<?php echo $item_availability; ?>" >
                        </div>
                  
                       <div class="form-group col-md-9">
                     
                           <button class="btn btn-success btn-square" type="savers" name="savers" > Available
                             </button>
                        <button class="btn btn-danger btn-square" type="saverss" name="saverss"> Unavailable
                             </button>
                        </div>
                    
                     </div>
                                    </div>
                             </div>
                              <div class="panel-footer panel-primary">
                         
                                <div class="form-actions" align="right" >


  <button type="save" class="btn btn-primary clearfix" name="save"  class="btn btn-success"/>Apply</button>
                                    <a href="manage.php"><button type="button" class="btn btn-primary  clearfix" name="reset">Back</button></a>
  </div>
                            <div class="clearfix"></div>
                            </div>
                              </form>



            
                        
            </header>
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