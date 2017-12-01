
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
                        <li> <a  href="users.php"><i class="fa fa-user fa-2x" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Users</span></a></li>
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







                            require('connect.php');
                            // If the values are posted, insert them into the database.
                            /*if (isset($_POST['name'])){

                                $name = $_POST['name'];
                                $combo1 = $_POST['menu_name'];

                                $result1 = $name . '' . $combo1;  
                                

                                $query = "INSERT INTO `menu_db` (name) VALUES ('$name')";

                                $result = mysqli_query($connection, $query) or die(mysql_error());;
                                if($result){
                                echo ("<SCRIPT LANGUAGE='JavaScript'>
                                window.alert('Succesfully Registered')
                                window.location.href='combo.php';
                                </SCRIPT>");
                                }
                            }*/
                            ?>
                            <?php
                            if (isset($_POST['code']) ){
                  
                   $name = $_POST['name'];
                   $menu_item1 = $_POST['menu_item1'];
                   $menu_item2 = $_POST['menu_item2'];
                   $menu_item3 = $_POST['menu_item3'];
                   $menu_item4 = $_POST['menu_item4'];
                   $menu_item5 = $_POST['menu_item5'];
                   $menu_item6 = $_POST['menu_item6'];
                   $menu_item7 = $_POST['menu_item7'];
                   $menu_item8 = $_POST['menu_item8'];
                   $menu_item9 = $_POST['menu_item9'];
                   



                   $item_happyprice = $_POST['item_happyprice'];
                   $item_category = $_POST['item_category'];
                   $set_name = $_POST['setname'];
                   /*$item_regularprice = $_POST['item_regularprice'];*/
                   $item_commission = $_POST['item_commission'];
                   /*$item_discount = $_POST['item_discount'];*/
                   $code = $_POST['code'];
                   $codecat = $_POST['codecat'];



                   $result = $code . '' . $codecat;   
                   $combo_name = $set_name . '' . $name;
                   $combo_name1 = $set_name . '' . $menu_item1;
                   $combo_name2 = $set_name . '' . $menu_item2;
                   $combo_name3 = $set_name . '' . $menu_item3;
                   $combo_name4 = $set_name . '' . $menu_item4;
                   $combo_name5 = $set_name . '' . $menu_item5;
                   $combo_name6 = $set_name . '' . $menu_item6;
                   $combo_name7 = $set_name . '' . $menu_item7;
                   $combo_name8 = $set_name . '' . $menu_item8;
                   $combo_name9 = $set_name . '' . $menu_item9;

                   $query = "INSERT INTO `menu_db` (name, item_happyprice,item_regularprice,item_category,item_commission,code) VALUES ('$combo_name', '$item_happyprice','$item_happyprice','$item_category','$item_commission','$result');";
                   $query .= "INSERT INTO `menu_db` (name,item_category,code) VALUES ('$combo_name1', '$item_category','$result');";
                   $query .= "INSERT INTO `menu_db` (name,item_category,code) VALUES ('$combo_name2', '$item_category','$result');";
                   $query .= "INSERT INTO `menu_db` (name,item_category,code) VALUES ('$combo_name3', '$item_category','$result');";
                   $query .= "INSERT INTO `menu_db` (name,item_category,code) VALUES ('$combo_name4', '$item_category','$result');";
                   $query .= "INSERT INTO `menu_db` (name,item_category,code) VALUES ('$combo_name5', '$item_category','$result');";
                   $query .= "INSERT INTO `menu_db` (name,item_category,code) VALUES ('$combo_name6', '$item_category','$result');";
                   $query .= "INSERT INTO `menu_db` (name,item_category,code) VALUES ('$combo_name7', '$item_category','$result');";
                   $query .= "INSERT INTO `menu_db` (name,item_category,code) VALUES ('$combo_name8', '$item_category','$result');";
                   $query .= "INSERT INTO `menu_db` (name,item_category,code) VALUES ('$combo_name9', '$item_category','$result')";



                   $result = mysqli_multi_query($connection, $query) ;
                         if($result>=1){
                         echo ("<SCRIPT LANGUAGE='JavaScript'>
                                 window.alert('Succesfully Added!')
                                 window.location.href='manage.php';
                                </SCRIPT>");  
                         }else{
                          echo ("<SCRIPT LANGUAGE='JavaScript'>
                                 window.alert('Menu item Exist!')
                                 window.location.href='manage.php';
                                </SCRIPT>");
                         }
                         }
               ?>
             
                         
              <div class="panel panel-primary">
                        <div class="panel-heading">
                  Add Combo Item
              </div>
                   <div class="panel-body">
                            <div class="table-responsive">

                      <form class="form-vertical" method="POST">
                         <div class="col-md-6">
                                    <div class="form-group col-md-6">
                               <label for="inputUser" class="sr-only">Name of the Dish</label>Set Name
                              <input type="text" name="setname" class="form-control"  placeholder="Set Name" id="inputUser"required > 
 </div>
  <div class="form-group col-md-6">

                                              
                              
                              <label for="inputCategory" class="sr-only">Category</label> Category
                                <input type="position" onchange="getcode()" name="item_category" value="Combo" id="inputCategory" placeholder="Catergory" class="form-control" readonly="readonly" required>
                                  
                                </select> 

                              

                             <!--  <label for="inputLasttName" class="sr-only">Regular Hour Price</label>Regular Hour Price
                              <input type="text" name="item_regularprice" pattern="^[+]?\d+([.]\d+)?$" class="form-control" placeholder="Regular Hour Price" id="inputLastName" required> -->
                               </div>
                               <div class="form-group col-md-6">
                              <label for="inputLasttName" class="sr-only">Code</label>Code
                              <input type="text" name="code" class="form-control"  placeholder="Item code" id="code" value= "CB" readonly="readonly" required>
 </div>
 <div class="form-group col-md-6">
                              
    </br>

                              <input type="text" name="codecat" class="form-control"  placeholder="Code" id="codecat" style="width:40%;"  required>
 </div>

  <div class="form-group col-md-6">
                              <label for="inputEmail" class="sr-only">Price</label>Price
                              <input type="text" name="item_happyprice" pattern="^[+]?\d+([.]\d+)?$" class="form-control" placeholder="Happy Hour Price" required autofocus>
                               </div>


  <div class="form-group col-md-6">
                              <label for="inputLasttName" class="sr-only">Code</label>Comission
                              <input type="text" name="item_commission" class="form-control"  placeholder="Commission" id="codes"   required>
 </div>
   
                               </div>




                               <div class="col-md-6">
                                   <div class="form-group col-md-9">
                               <label for="inputUser" class="sr-only">Name of the Dish</label>Menu Item 1
                              <input type="text" name="name" class="form-control"  placeholder="Name" id="inputUser" >
</div>
                                
                             
                                   <div class="form-group col-md-9">
                               <label for="inputUser" class="sr-only">Name of the Dish</label>Menu Item 2
                              <input type="text" name="menu_item1" class="form-control"  placeholder="Name" id="inputUser" >
   </div>
    <div class="form-group col-md-9">
                              <label for="inputUser" class="sr-only">Name of the Dish</label>Menu Item 3
                              <input type="text" name="menu_item2" class="form-control"  placeholder="Name" id="inputUser" >
</div>
<div class="form-group col-md-9">
                              <label for="inputUser" class="sr-only">Name of the Dish</label>Menu Item 4
                              <input type="text" name="menu_item3" class="form-control"  placeholder="Name" id="inputUser" >
</div>
<div class="form-group col-md-9">
                              <label for="inputUser" class="sr-only">Name of the Dish</label>Menu Item 5
                              <input type="text" name="menu_item4" class="form-control"  placeholder="Name" id="inputUser" >
</div>
<div class="form-group col-md-9">
                              <label for="inputUser" class="sr-only">Name of the Dish</label>Menu Item 6
                              <input type="text" name="menu_item5" class="form-control"  placeholder="Name" id="inputUser" >
</div>
<div class="form-group col-md-9">
                              <label for="inputUser" class="sr-only">Name of the Dish</label>Menu Item 7
                              <input type="text" name="menu_item6" class="form-control"  placeholder="Name" id="inputUser" >
</div>
<div class="form-group col-md-9">
                              <label for="inputUser" class="sr-only">Name of the Dish</label>Menu Item 8
                              <input type="text" name="menu_item7" class="form-control"  placeholder="Name" id="inputUser" >
</div>
<div class="form-group col-md-9">
                              <label for="inputUser" class="sr-only">Name of the Dish</label>Menu Item 9
                              <input type="text" name="menu_item8" class="form-control"  placeholder="Name" id="inputUser" >
</div>
<div class="form-group col-md-9">
                              <label for="inputUser" class="sr-only">Name of the Dish</label>Menu Item 10
                              <input type="text" name="menu_item9" class="form-control"  placeholder="Name" id="inputUser" >
</div>
                              
</div>
                                    </div>
                             </div>

  
    <div class="panel-footer panel-primary">
        <div class="form-actions" align="right" >
                   
                             <input type="submit" class="btn btn-primary clearfix" name="Submit" value="Add" class="btn btn-success"/>
                                    <a href="manage.php"><button type="button" class="btn btn-primary  clearfix" name="reset">Back</button></a>
                            </div>
                            <div class="clearfix"></div>
                            </div>
                              </form>
                           </header>
            

                            <!--  <div class="panel panel-primary">
                        <div class="panel-heading">
                             User Info
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                
                              <form class="form-vertical" method="POST" >
                       
                              <div class="col-md-6">
                                    <div class="form-group col-md-6">
                             <label for="inputUser" class="sr-only"></label>Combo name
                              
                              <input type="text" name="name"  class="form-control" placeholder="Contact No."  id="inputUser"required >
                          </div>
                                    <div class="form-group col-md-6">
                              <label for="inputLasttNameDD" class="sr-only"></label>Combo composition1
                              <input type="text" name="menu_name"  class="form-control" placeholder="Last Name" id="inputLastNamess" required>

                                 </div>
                                </div>
 -->
                                <!-- <div class="col-md-6">
                                <div class="form-group col-md-9">
                                     <label for="inputFirstNameSD" class="sr-only"></label>Combo composition2
                              <input type="text" name="combo_composition2" class="form-control" placeholder="First Name" id="inputFirstName" required >
                              
                                </div>

                                <div class="form-group col-md-6">
                              <label for="inputLasttNameEE" class="sr-only"></label>Combo composition3
                              <input type="text" name="combo_composition3"  class="form-control" placeholder="Last Name" id="inputLastNamesss" required>

                                 </div>
                                 <div class="form-group col-md-6">
                              <label for="inputLasttNameE" class="sr-only"></label>Combo composition4
                              <input type="text" name="combo_composition4"  class="form-control" placeholder="Last Name" id="inputLastNamee" required>

                                 </div>
                                 <div class="form-group col-md-6">
                              <label for="inputLasttNameSS" class="sr-only"></label>price
                              <input type="text" name="combo_price"  class="form-control" placeholder="Last Name" id="inputLastNameee" required>

                                 </div> -->
                                <!--  <div class="form-group col-md-6">
                              <label for="inputLasttNameS" class="sr-only"></label>code
                              <input type="text" name="combo_code"  class="form-control" placeholder="Last Name" id="inputLastNameeee" required>

                                 </div> -->


                                <!-- <label for="inputEmail" class="sr-only">Email Address</label>
                                <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email Address" required autofocus> -->
                                 
                                  
                                <!-- //<input type="text" onKeyPress="return ( this.value.length < 10 );"/> -->

                                 
                                   
<!-- 
                                    </div>
                             </div>
                                    </div>
                             </div>
                              <div class="panel-footer panel-primary">
                         
                                <div class="form-actions" align="right" >
                                    
                                    <input type="submit" class="btn btn-primary clearfix" name="Submit" value="Register" class="btn btn-success"/>
                                    <a href="users.php"><button type="button" class="btn btn-primary  clearfix" name="reset">Back</button></a>
                            </div>
                            <div class="clearfix"></div>
                            </div>
                              </form> -->
                        
                    
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