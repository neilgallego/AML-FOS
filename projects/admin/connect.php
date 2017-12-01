<?php
define('DB_HOST', 'localhost');
define('DB_NAME', 'aml_db');
define('DB_USER','root');
define('DB_PASSWORD','');

$connection = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD);
if (!$connection) {
    die("Database connection failed: " . mysqli_error());
}

$db_select = mysqli_select_db($connection, DB_NAME);
if (!$db_select) {
    die("Database selection failed: " . mysqli_error());
}