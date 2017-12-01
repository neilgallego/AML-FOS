<?php
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$connection = mysqli_connect('localhost', 'root', '','aml_db');
// Selecting Database
//$db = mysqli_select_db($connection,"company" );
session_start();// Starting Session
// Storing Session
$user_check=$_SESSION['login_user'];
// SQL Query To Fetch Complete Information Of User
$ses_sql=mysqli_query($connection,"select username,firstname, lastname from users where username='$user_check'");
$row = mysqli_fetch_assoc($ses_sql);
$login_session = $row['username'];
if(!isset($login_session)){
mysql_close($connection); // Closing Connection
header('Location: /amlfos/login'); // Redirecting To Home Page
}
?>