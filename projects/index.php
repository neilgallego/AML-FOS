

<?php

session_start(); 
$error=''; 
if (isset($_POST['submit'])) {

$username = $_POST['username'];
$password = $_POST['password'];

$connection = mysqli_connect("localhost", "root", "");

$username = stripslashes($username);
$password = stripslashes($password);
$varusername = mysqli_real_escape_string($connection,$username);
$varpassword = mysqli_real_escape_string($connection,$password);

$result = mysqli_select_db($connection,"aml_db");

if(! $result){
      die('Could not get data from database : ' . mysql_error() );
    }

    $sql = "SELECT position , firstname, password FROM users WHERE username = '$username' and status = 'active' ";

    $query = mysqli_query($connection, $sql);
    $rows = mysqli_num_rows($query);

    if($rows != 0){

       while($row = mysqli_fetch_assoc($query)) {

            $firstname = $row['firstname'];
            $password = $row['password'];
            $position = $row['position'];
      
           if($varpassword == $password){
     
                  if($position == 'Checker'){

                    $_SESSION['fname'] = $firstname;
                     header("Location: checker/main.php");
                  }elseif($position == 'Cashier'){
                    $_SESSION['username'] = $firstname;
                      //echo "cashier";
                      header('Location: cashier/a.php');
                  }elseif($position == 'Admin'){
                  
                    $_SESSION['logged'] = $firstname; 
                      header('Location: admin/transac.php');
                  }else{
                      header('Location: projects/index.php');
                  }

                }else{
                     $error = '<br><p style="color:red">Username or Password is invalid</p>';
                }
          }
  }else{
    $error = '<br><p style="color:red">Account not registered</p>';
  
}
 mysqli_close($connection);
   
  }
 
?>


<!DOCTYPE html>
<html>
    <head>
		 <meta charset="UTF-8">
    <title>Alberto's Music Lounge</title>

<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
  <link rel="stylesheet" href="logincss.css">
      <style>
      
@import "https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,700italic,300,400,700)";


</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
    </head>
    
    <body>        
			  <div class="login">
				<h1>Login</h1>

				<form class="form" method="post" action="#">

				  <p class="field">
					<input type="text" name="username" placeholder="Username"  maxlength="11" required/>
					<i class="fa fa-user"></i>
				  </p>

				  <p class="field">
					<input type="password" name="password" placeholder="Password"  maxlength="11" required/>
					<i class="fa fa-lock"></i>
				  </p>

				 <div>
				<a href="#" onClick="alert('Please contact the admin.')"><br><p style="position:absolute; 
				left:13%;">Forgot Password?<br></p></a>
				</div>
				
				  <br>
				  
				  <p class="submit"><input type="submit" name="submit" onclick="validateLogIn()" id="log" value="Login"></p>
					<span><?php echo $error; ?></span>

				</form>
			  </div> <!--/ Login-->
			
			
		</div> 
    </body>
</html>