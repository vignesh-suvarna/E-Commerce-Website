<?php
$server = "localhost";
$user = "root";
$pass = "";
$database = "final-project";

$conn = mysqli_connect($server, $user, $pass, $database);

if(!$conn)
{
  die("Connection Failed");
}

 ?>
