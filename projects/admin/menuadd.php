<?php
        session_start();
        $inactive = 600;
        if(isset($_SESSION['logged']) && $_SESSION['logged'] == true) {
            //echo "Welcome," . $_SESSION['username'] . "!";
        } else {
            header('Location: ../index.php');
        }

        
         include('connect.php');
       

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
                        <li><a href="Summaries.php"><i class="glyphicon glyphicon-list-alt fa-2x" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Summary</span></a></li>
                        <li><a href="users.php"><i class="fa fa-user fa-2x" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Users</span></a></li>
                        <li> <a class="active-menu" href="manage.php"><i class="fa fa-cutlery fa-2x" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Manage Menu</span></a></li>
                        <li><a href="tables.php"><i class="fa fa-table fa-2x" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Tables</span></a></li> 
                        
                    </ul>
                </div>
    
                       
                     
           
         </nav>
            
            <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">  

          
                     <hr/> 
 
               
                        <div class="panel-body">
                            <div class="table-responsive">
<div class="panel panel-primary">
                        <div class="panel-heading">
                              Users       
                        </div>
                        <div class="panel-body">
                            <div class="form-group col-md-12">  
                              <a href="register.php" class="btn btn-warning" aria-hidden="true">Add Menu
</br></a>
                                    <!-- /. ROW  -->
                            <hr />
                            </div>
 
 <a href="#" class="icon-info">
  <i class="fa fa-shopping-basket fa-lg" aria-hidden="true" data-toggle="modal" data-target="#myModal">Add Menu</i>
 </a>
  </div>
                    <form class="form-signin" method="post" style="width: 320px">
                                <?php
                                     include "dbase.php";
                                     $dbase = new Database;

                                        if(isset($_REQUEST["saves"])){

                                    $nameSearched = $_REQUEST['name'];
                                    $item_categorys = $_POST['item_category'];
                                    


                                    
                                    // get first the value of email address which is located below @ 
                                    $activate = $dbase->editMenu($nameSearched);
                                    // $dbase->activeMember($emailAddress); //this is commented for $emailAddress' value is null, thus no updates are happening
                                    echo '<script>alert("Succesfully updated");</script>';
                                   }//end if


                                        if(isset($_REQUEST["search_submits"])){
                                            $index = 0;
                                            $name = $_REQUEST["search-id"];
                                            $stmt = $dbase->geteditmenu($name);
                                            mysqli_stmt_bind_result($stmt, $name, $item_category, $item_happyprice, $item_regularprice,$menuitem_id);
                                            //$test = mysqli_fetch_array($result);



                                            while(mysqli_stmt_fetch($stmt)){
                                            $index++;
                    ?>


        <table id="examples" class="display" cellspacing="0" width="70%">
                        <tr>
                            <td>Name:</td>
                            <td><input type="text" name="name"  value="<?php echo $name; ?>"></td>
                        </tr>
                        <tr>
                            <td>Category:</td>
                            <td><input type="text" name="item_category"  value="<?php echo $item_category; ?>"></td>
                        </tr>
                        <tr>
                            <td>Happy Hour Price:</td>
                            <td><input type="text" name="item_happyprice"  value="<?php echo $item_happyprice; ?>"></td>
                        </tr>
                    
                        <tr>
                            <td>Regular Hour Price:</td>
                            <td><input type="text" name="item_regularprice"  value="<?php echo $item_regularprice; ?>" ></td>
                        </tr>
                        

                       </table>
                   </br>
                         
                        
                    <?php 
                            }
                            ?>
                             <tr>
                            <button class="btn btn-lg btn-primary btn-block" type="saves" name="saves" style="width: 320px">Save</button>
                        </tr>
                        </form>
                        </div>

                        <?php //end while
                        }//end if
                     ?>
                     
                     

</nav>
                        </div>
                        
                    </header>
                </div>

                <div class="user-dashboard">
                    <h1>&nbsp;</h1>
                    <div class="row">
                    <header>                            

 

<div style="width: 1000px; height: 300px; overflow-y: scroll;">
<table id="example" class="display" cellspacing="0" width="100%">
<div class="container">
    <?php
                            
                            // If the values are posted, insert them into the database.
                            if (isset($_POST['code']) ){
                                $name = $_POST['name'];
                                $item_happyprice = $_POST['item_happyprice'];
                                $item_category = $_POST['item_category'];
                                $item_regularprice = $_POST['item_regularprice'];
                                $code = $_POST['code'];

                         
                                $query = "INSERT INTO `menu_db` (name, item_happyprice, item_category, item_regularprice,code) VALUES ('$name', '$item_happyprice', '$item_category', '$item_regularprice','$code')";
                                $result = mysqli_query($connection, $query) or die (mysql_error());;
                                if($result){
                                 echo ("<SCRIPT LANGUAGE='JavaScript'>
                                 window.alert('Succesfully Added!')
                                 window.location.href='manage.php';
                                </SCRIPT>");
                            }
                        }
                            ?>

      </div>
    </div>
  </div>
</div>

    
     <table id="example" class="display" cellspacing="0" width="100%">  
      <thead>             
   <tr>
        
            <thead>
                <th>ITEM NAME</th>
                <th>CODE</th>
                <th>CATEGORY</th>
                <th>HAPPY HOUR </th>
                <th>REGULAR HOUR </th>
            
            </tr>
            </thead>

            <tbody>
                <?php
                if(isset($_REQUEST["search_submit"])){
                    $index = 0;
                    $time = $_REQUEST[""];
                    $stmt = $dbase->getMenu($name);
                    mysqli_stmt_bind_result($stmt,$name,$code,$item_category,$item_happyprice,$item_regularprice);
                    while(mysqli_stmt_fetch($stmt)){
                        $index++
                        ?>
                        <tr>
                            
                            <td><?php echo $name; ?></td>
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

                        $stmt = $dbase->getMenu($start, $end);
                        mysqli_stmt_bind_result($stmt,$name,$code,$item_category,$item_happyprice,$item_regularprice);
                        while(mysqli_stmt_fetch($stmt)){
                    ?>
                    <tr>
                        
                        <td><?php echo $name; ?></td>
                        <td><?php echo $code; ?> </td>
                        <td><?php echo $item_category; ?></td>
                        <td><?php echo $item_happyprice; ?></td>
                        <td><?php echo $item_regularprice; ?></td>

                        
                        
                    </tr>
                    <?php
                }

                
                    }
                    ?>
                   
                           
                            
            </tbody>
             

  </table>
</br>

 



               </header>
                   </div>
                    
                </div>
    
    </br>
   <!-- <button class="btn btn-lg btn-primary btn-block" type="save" name="back" style="width:70px; height:45px">Print</button> -->
    
     


  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg"style="width:33%;">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Menu</h4>
        </div>
        <div class="modal-body">
             <div class="form-group">
          <form class="form-signin" method="POST" style="width:320px">
            
                               
                              
                              <label for="inputUser" class="sr-only">Name of the Dish</label>Name of the Dish
                              <input type="text" name="name" class="form-control" placeholder="Name" id="inputUser"required >

                              <label for="inputCategory" class="sr-only">Category</label> Category
                                <select type="position" name="item_category" id="inputCategory" placeholder="Catergory" class="form-control" required>
                                  <option value="APPETIZZER">APPETIZZER</option>}
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

                              <!-- <label for="inputFirstName" class="sr-only">First Name</label>
                              <input type="text" name="firstname" class="form-control" placeholder="First Name" id="inputFirstName" required> -->

                              <label for="inputLasttName" class="sr-only">Regular Hour Price</label>Regular Hour Price
                              <input type="text" name="item_regularprice" class="form-control" placeholder="Regular Hour Price" id="inputLastName" required>



                                <label for="inputEmail" class="sr-only">Happy Hour Price</label>Happy Hour Price
                                <input type="text" name="item_happyprice"  class="form-control" placeholder="Happy Hour Price" required autofocus>

                                
                                <label for="inputLasttName" class="sr-only">Code</label>Code
                                <input type="text" name="code" class="form-control" placeholder="Item code" id="code" required>
                             </div>
                                <button class="btn btn-lg btn-primary btn-block" type="reset" style="width: 420px">Reset</button>
                                <button class="btn btn-lg btn-primary btn-block" type="submit" style="width: 420px">Add</button>
                              </form>
                                
                            
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
          <!-- end of MODAL -->
                      
                
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







