<?php
session_start();
   $value1 = $_POST['val1'];
   $_SESSION['varname1'] = $_POST['val1'];
   echo "You have selected: $value1";
?>