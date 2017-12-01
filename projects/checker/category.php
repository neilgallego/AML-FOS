<!DOCTYPE html>
<html>
<head>
	<title></title>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style type="text/css">
    #button {
    background-color: #4CAF50;
    border: none;
    color: white;
    text-align: center;
    text-decoration: none;
    font-size: 20px;
    height: 100px;
    width: 200px;
    position: relative;
    margin: 0;
}
    </style>
</head>
<body>

  <?php

    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = '';
    $connection = mysqli_connect($dbhost,$dbuser,$dbpass,'aml_db');

    if(! $connection){
        die('Could not Connect to Database' . mysql_error());
    }

if (isset($_POST['change'])){ // change orders

    //dbnames
    $vardb = $_POST['vardb'];
    $vardbquantity = $_POST['vardbquantity'];
    $vardbid = $_POST['vardbid'];
    $vardbname = $_POST['vardbname'];
    $vardbtable = $_POST['vardbtable'];
    $vardbcode = $_POST['vardbcode'];
    $vardbprice = $_POST['vardbprice'];
    $vardbwaiter = $_POST['vardbwaiter'];
    $vardbdate= $_POST['vardbdate'];
    $vardbtime = $_POST['vardbtime'];
    $vardbtype = $_POST['vardbtype'];
    $vardbtotalprice = $_POST['vardbtotalprice'];
    $vardbpriority = $_POST['vardbpriority'];

    $varid = $_POST['id'];
    $varname = $_POST['ordername'];
    $varprice = $_POST['orderprice']; 
    $varcode = $_POST['ordercode'];
    $vartable = $_POST['ordertable'];
    $varwaiter = $_POST['orderwaiter'];
    $vartype = $_POST['ordertype'];
    $varoldquantity = $_POST['oldorderquantity']; // 50 update
    $varnewquantity = $_POST['neworderquantity']; // 25 set new 
    $vartype = $_POST['ordertype'];
    $varchange = $_POST['varchange'];

     
        

    echo "<div class='container'>";

        $query = "SELECT DISTINCT item_category FROM menu_db";
        $result = mysqli_query( $connection , $query );

        if(! $result){
            die('Could not get data from database : ' . mysql_error() );
        }
        
        $varcategory='';
        echo "<form action ='./item category/changeorder.php' method ='POST' target='iframe_c'>";
        while($row = mysqli_fetch_array($result , MYSQL_NUM)){ 
            $varcategory = $row[0];
            
            echo "
                <input type='hidden' name ='oldorderquantity' value='$varoldquantity'>
                <input type='hidden' name ='ordername' value='$varname'>
                <input type='hidden' name ='orderprice' value='$varprice'>
                <input type='hidden' name ='ordercode' value='$varcode'>
                <input type='hidden' name ='orderwaiter' value='$varwaiter'>
                <input type='hidden' name ='ordertable' value='$vartable'>
                <input type='hidden' name ='ordertype' value='$vartype'>
                <input type='hidden' name='neworderquantity' value='$varnewquantity' >
                 <input type='hidden' name ='varchange' value='$varchange'>
                <!-- dbase names -->
                <input type='hidden' name ='vardb' value='$vardb'>
                <input type='hidden' name ='vardbid' value='$vardbid'>
                <input type='hidden' name ='vardbquantity' value='$vardbquantity'>
                <input type='hidden' name ='vardbname' value='$vardbname'>
                <input type='hidden' name ='vardbtable' value='$vardbtable'>
                <input type='hidden' name ='vardbcode' value='$vardbcode'>
                <input type='hidden' name ='vardbprice' value='$vardbprice'>
                <input type='hidden' name ='vardbwaiter' value='$vardbwaiter'>
                <input type='hidden' name ='vardbdate' value='$vardbdate'>
                <input type='hidden' name ='vardbtime' value='$vardbtime'>
                <input type='hidden' name ='vardbtype' value='$vardbtype'> 
                <input type='hidden' name ='vardbtotalprice' value='$vardbtotalprice'> 
                <input type='hidden' name ='vardbpriority' value='$vardbpriority'>
                <!-- dbase names -->

                <input type='hidden' name='id' value='$varid' >
                <input class='btn btn-primary' id ='button' type='submit' name='cat' value='$varcategory'>
            ";

       }

   echo "</form>";

}else{
    header("Location: ./item category/appetizzer.php");
}
    ?>
    </div>
</body>
</html>