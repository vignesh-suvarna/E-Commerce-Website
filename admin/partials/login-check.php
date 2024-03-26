<?php
  if(!isset($_SESSION['user'])) // If user session is not set
  {
    $_SESSION['no-login-message'] = "<div class='error text-center'>Login to access Admin Panel</div>";

    header('location:'.SITEURL.'admin/login.php');
  }


 ?>
