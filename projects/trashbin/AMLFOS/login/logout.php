<?php
session_start();
if(session_destroy()) // Destroying All Sessions
{
header("Location: /amlfos/login/index.php"); // Redirecting To Home Page
}
?>