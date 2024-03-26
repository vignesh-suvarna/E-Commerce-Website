<?php

//Start session
session_start();




//Create constants
define('SITEURL', 'http://localhost/final-project/');
define('LOCALHOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'final-project');

$conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error()); //databse connection
$db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error()); //selecting databse

?>
