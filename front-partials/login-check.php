<?php
  //Authorization
if(!isset($_SESSION['user']))
{
  header('location:'.SITEURL.'user-login.php');
}


 ?>
