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
          <div id="page-wrapper" >
            <div id="page-inner">
          <div class="row">
                <div class="col-md-12">
                                   <div class="col-md-12 col-sm-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                       Add new entry
                        </div>
                        <div class="panel-body">
                                    <form role="form">
                                        <div class="col">
                                            <div class="col-md-6">
                                                <div class="panel panel-primary">
                                                   <div class="panel-body">
                                                        <div class="people">
                                                            <center><img id="people" src="assets/img/item.png" width="75" height="75" alt="people"><br/><br/><center>
                                                            <center> <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#myModal">Add Menu Item</a></button></a></center>
                                                        </div>
                                                    </div>
                                                </div>  
                                            </div>   
                                    </div>
                                    <div class="col">
                                        <div class="col-md-6">
                                            <div class="panel panel-primary">
                                                <div class="panel-body">
                                                    <div class="organization">
                                                        <center><img id="organization" src="assets/img/combo.png" width="75" height="75" alt="organization"><br/><br/><center>
                                                        <center><a href="combo.php" class="btn btn-warning">Add Combo</i></a></button></a></center>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                            </div>


           
            
       
 
               <div class="col-md-12 col-sm-12">
               <div class="panel panel-primary">
               <div class="panel-heading">
                 <i class="fa fa-table" aria-hidden="true"></i> &nbsp;
                   Menu Items
               </div>
               <div class="panel-body">
               <div class="table-responsive">

                 <table class="table table-striped table-bordered table-hover" id="dataTables-example" name="table_content">
                   <thead>   
                     <th>CATEGORY</th>
                     <th>CODE</th>
                     <th>ITEM NAME</th>
                     <th>HAPPY HOUR PRICE</th>
                     <th>REGULAR HOUR PRICE</th>
                     <th>COMMISSION</th>
                     <th>ACTION</th>
                   </thead>
           
              <?php
                   $connection=mysqli_connect("localhost","root","","aml_db");
                   // Check connection
                       if (mysqli_connect_errno())
                        {
                        echo "Failed to connect to MySQL: " . mysqli_connect_error();
                        }
                       $result = mysqli_query($connection,"SELECT * FROM menu_db" );
                       while($row = mysqli_fetch_array($result))
                        {
              ?> 
                       <tr>
                         <td> <?php echo $row['item_category']; ?></td>
                         <td> <?php echo $row['code']; ?></td>
                         <td> <?php echo $row['name']; ?></td>    
                         <td> <?php echo $row['item_happyprice']; ?></td> 
                         <td> <?php echo $row['item_regularprice']; ?></td>
                         <td> <?php echo $row['item_commission']; ?></td>
               <?php 
                         echo "<td>";
                         echo " <a class='btn btn-danger square-btn-adjust' href=\"editMenu.php? menuitem_id=".$row['menuitem_id']. "\">
                                <span class='glyphicon glyphicon-pencil'></span>";
                         echo "Edit";
                         echo "</td>";
               ?>
                        </tr>
               <?php
                }
               ?>          
                  </tbody>
                  </table>                             
                  </nav>
                  </div>
                  </header>
                  </div> 

               <?php
                 // If the values are posted, insert them into the database.
                 if (isset($_POST['code']) ){
                   $name = $_POST['name'];
                   $item_happyprice = $_POST['item_happyprice'];
                   $item_category = $_POST['item_category'];
                   $item_regularprice = $_POST['item_regularprice'];
                   $item_commission = $_POST['item_commission'];
                   $item_discount = $_POST['item_discount'];
                   $code = $_POST['code'];
                   $query = "INSERT INTO `menu_db` (name, item_happyprice, item_category, item_regularprice,item_commission,item_discount,code) VALUES ('$name', '$item_happyprice', '$item_category', '$item_regularprice','$item_commission','$item_discount','$code')";
                   $result = mysqli_query($connection, $query) or die (mysql_error());;
                         if($result){
                         echo ("<SCRIPT LANGUAGE='JavaScript'>
                                 window.alert('Succesfully Added!')
                                 window.location.href='manage.php';
                                </SCRIPT>");
                         }
                         }
               ?>
             <!-- Modal -->
              <div class="modal fade" id="myModal" role="dialog">
              <div class="modal-dialog modal-lg"style="width:30%;">
              <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Add Menu Item</h4>
              </div>
                   <div class="modal-body">
                   <div class="form-group">
                      <form class="form-signin" method="POST" style="width:100%">
                              <label for="inputUser" class="sr-only">Name of the Dish</label>Name of the Dish
                              <input type="text" name="name" class="form-control"  placeholder="Name" id="inputUser"required >
                              <label for="inputCategory" class="sr-only">Category</label> Category
                                <select type="position" onchange="getcode()" name="item_category" id="inputCategory" placeholder="Catergory" class="form-control" required>
                                  <option value="">Choose Category</option>
                                  <option value="Appetizer">APPETIZER</option>
                                  <option value="Barbeques/inihaw">BARBEQUES/INIHAW</option>
								  <option value="Cocktails"> Cocktails</option>
                                  <option value="Sandwiches"> SPECIAL SANDWICHES</option>
                                  <option value="Sizzling">SIZZLING</option>
                                  <option value="Shooters">SHOOTERS</option>
								  <option value="Beers">BEERS</option>
								  <option value="Tequila/Gin/Rum/Vodka"> TEQUILA/GIN/RUM/VODKA</option>
								  <option value="Scotch/Cognac/Brandy">SCOTCH/COGNAC/BRANDY</option>
                                  <option value="Rice Toppings">RICE/TOPPINGS</option>
                                  <option value="Noodles/Soup">NOODLES/SOUPS</option>
                                  <option value="Pitcher">PITCHER COCKTAILS</option>
                                  <option value="Mocktail Hot and Cold Beverages">MOCKTAIL COLD and HOT BEVERAGES</option>
                                  <option value="Shakes">SHAKES</option>
								  <option value="Shakes">OTHERS</option>
                                </select> 
                                <script >
                                  function getcode(){
                                  
                                    if (document.getElementById('inputCategory').value == "Appetizer"){
                                        document.getElementById('code').value= 'AP';
                                    }
                                     if (document.getElementById('inputCategory').value == "Barbeques/inihaw"){
                                        document.getElementById('code').value= 'BQ';
                                    }
                                    if (document.getElementById('inputCategory').value == "Sandwiches"){
                                        document.getElementById('code').value= 'SW';
                                    }
                                    if (document.getElementById('inputCategory').value == "Sizzling"){
                                        document.getElementById('code').value= 'SZ';
                                    }
                                    if (document.getElementById('inputCategory').value == "Shooters"){
                                        document.getElementById('code').value= 'SH';
                                    }
                                    if (document.getElementById('inputCategory').value == "Rice Toppings"){
                                        document.getElementById('code').value= 'RT';
                                    }
                                    if (document.getElementById('inputCategory').value == "Noodles/Soup"){
                                        document.getElementById('code').value= 'NS';
                                    }
                                    if (document.getElementById('inputCategory').value == "Pitcher Cocktails"){
                                        document.getElementById('code').value= 'PC';
                                    }
                                    if (document.getElementById('inputCategory').value == "Mocktail Hot and Cold Beverages"){
                                        document.getElementById('code').value= 'MT';
                                    }
                                    if (document.getElementById('inputCategory').value == "Fruit Shakes"){
                                        document.getElementById('code').value= 'FS';
                                    }           

                                  }

                                </script>

                              <label for="inputLasttName" class="sr-only">Regular Hour Price</label>Regular Hour Price
                              <input type="text" name="item_regularprice" pattern="^[+]?\d+([.]\d+)?$" class="form-control" placeholder="Regular Hour Price" id="inputLastName" required>
                              <label for="inputEmail" class="sr-only">Happy Hour Price</label>Happy Hour Price
                              <input type="text" name="item_happyprice" pattern="^[+]?\d+([.]\d+)?$" class="form-control" placeholder="Happy Hour Price" required autofocus>
                              <label for="inputEmail" class="sr-only">Commission</label>Commission
                              <input type="text" name="item_commission" pattern="^[+]?\d+([.]\d+)?$" class="form-control" placeholder="Commission" required autofocus>
                              <label for="inputLasttName" class="sr-only">Code</label>Code
                              <input type="text" name="code" class="form-control" placeholder="Item code" id="code" required>
                              <label for="inputEmail" class="sr-only">Item Discount</label>Item Discount
                              <input type="text" name="item_discount" pattern="^[+]?\d+([.]\d+)?$" class="form-control" placeholder="Discount" required autofocus>
                   </div>
                              <button class="btn btn-lg btn-primary btn-block" type="reset" style="width: 100%">Reset</button>
                              <button class="btn btn-lg btn-primary btn-block" type="submit" style="width: 100%">Add</button>
                      </form>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
            </div>
            </div>
            </div>
            </div>
          <!-- end of MODAL -->

                        <div class="modal fade" id="comboModal" role="dialog">
                        <div class="modal-dialog modal-lg"style="width:30%;">
                        <div class="modal-content">
                        <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Add Combo</h4>
                        </div>
                        <div class="modal-body">
                        <div class="form-group">
                        <form class="form-signin" method="POST" style="width:100%">
                              <label for="inputUser" class="sr-only">Name of Combo</label>Name of Combo
                              <input type="text" name="name" class="form-control" placeholder="Name" id="inputUser"required >
                              <label for="inputLasttName" class="sr-only">Menu item 1</label>Menu Item 1
                              <input type="text" name="item_regularprice" class="form-control"  id="inputLastName" required>
                              <label for="inputLasttName" class="sr-only">Menu item 2</label>Menu Item 2
                              <input type="text" name="item_regularprice" class="form-control"  id="inputLastName" required>
                              <label for="inputLasttName" class="sr-only">Menu item 3</label>Menu Item 3
                              <input type="text" name="item_regularprice" class="form-control"  id="inputLastName" required>
                              <label for="inputLasttName" class="sr-only">Menu item 4</label>Menu Item 4
                              <input type="text" name="item_regularprice" class="form-control"  id="inputLastName" required>
                              <label for="inputLasttName" class="sr-only">Regular Hour Price</label>Regular Hour Price
                              <input type="text" name="item_regularprice" class="form-control" placeholder="Regular Hour Price" id="inputLastName" required>
                              <label for="inputEmail" class="sr-only">Happy Hour Price</label>Happy Hour Price
                              <input type="text" name="item_happyprice"  class="form-control" placeholder="Happy Hour Price" required autofocus>
                              <label for="inputLasttName" class="sr-only">Combo Code</label>Code
                              <input type="text" name="code" class="form-control" placeholder="Item code" id="code" required>
                              </div>
                                <button class="btn btn-lg btn-primary btn-block" type="reset" style="width: 100%">Reset</button>
                                <button class="btn btn-lg btn-primary btn-block" type="submit" style="width: 100%">Add</button>
                              </form>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      </div>
                      </div>
                      <!-- end of MODAL -->
                      </div>
                      </div>
                      </div>

                    <div class="modal fade" id="timeModal" role="dialog">
                    <div class="modal-dialog modal-lg"style="width:30%;">
                    <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Set Time</h4>
                    </div>
                    <div class="modal-body">
                    <div class="form-group">
                        <form class="form-signin" method="POST" style="width:100%">                     
                              <label for="inputLasttName" class="sr-only"></label>Happy Hour Time</br>
                              <label for="inputLasttName" class="sr-only"></label>From:
                              <input type="text" name="item_regularprice" class="form-control" placeholder="Time Start" id="inputLastName">

                              <label for="inputLasttName" class="sr-only"></label>To:
                              <input type="text" name="item_regularprice" class="form-control" placeholder="Time End" id="inputLastName">

                              <label for="inputEmail" class="sr-only"></label>Regular Hour Time</br>

                              <label for="inputLasttName" class="sr-only"></label>From:
                              <input type="text" name="item_regularprice" class="form-control" placeholder="Time Start" id="inputLastName">

                             </div>
                                <button class="btn btn-lg btn-primary btn-block" type="reset" style="width: 100%">Reset</button>
                                <button class="btn btn-lg btn-primary btn-block" type="submit" style="width: 100%">Apply Changes</button>
                              </form>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
                      <!-- end of MODAL -->
                </div>
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
    <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
                 paging: false
            });
    </script>
     <script>
        $(document).ready(function() {
            $('#dataTables-example').DataTable( {
            "order": [[ "item_category" ]]
              destroy: true,
    searching: false
        } );
        } );  
    </script>
         <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
   
</body>
