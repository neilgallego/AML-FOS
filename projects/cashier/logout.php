
<?php
	session_start();

// Destroying All Sessions
	unset($_SESSION['username']);
	header("location: ../index.php");

/*if(session_destroy())
{
// Redirecting To Home Page
header("Location: index.php?msg= Successfully logged out!");
exit;
} */
?>