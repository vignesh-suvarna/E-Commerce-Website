<!DOCTYPE html>

<?php include('../config/constants.php'); ?>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login Page- Game Zone</title>
    <link rel="stylesheet" href="admin.css">
  </head>
  <body>

    <div class="login">
      <h1 class="text-center">Login</h1>
      <br><br>

      <?php
      if(isset($_SESSION['login']))
      {
        echo $_SESSION['login'];
        unset($_SESSION['login']);
      }

      if(isset($_SESSION['no-login-message']))
      {
        echo $_SESSION['no-login-message'];
        unset($_SESSION['no-login-message']);
      }

      ?>
      <br>



      <!-- Login Form starts -->
      <form action="" method="post" class="text-center">
        <br>
        Username:
        <input type="text" name="username" placeholder="Enter username"> <br><br>
        Password:
        <input type="password" name="password" placeholder="Enter Password"> <br><br>
        <br>
        <input type="submit" name="submit" value="Login" class="btn-primary">
        <br><br>




      </form>
</div>
  </body>
</html>

<?php

  if(isset($_POST['submit']))
  {
    // 1.Get the data from login form
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    // 2. SQL to check whether the username and password apc_exists
    $sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";

    // 3. Execute the query
    $res = mysqli_query($conn, $sql);

    // 4. Count rows to check
    $count = mysqli_num_rows($res);

    if($count==1)
    {
      //Login success
      $_SESSION['login'] = "<div class='success'>Login Successful</div>";
      $_SESSION['user'] = $username;

      header('location:'.SITEURL.'admin/');
    }
    else
    {
      // Login failed
      $_SESSION['login'] = "<div class='error'>Login Failed</div>";
      header('location:'.SITEURL.'admin/login.php');
    }

  }


 ?>
