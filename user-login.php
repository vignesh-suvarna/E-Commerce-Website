<?php
include('config/constants.php');
include('front-partials/dbconnect.php');
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Game Zone- Login</title>
    <link rel="stylesheet" href="log.css">
  </head>
  <body>

    <div class="container">
		<form action="" method="POST" class="login-email">
      <br>
      <?php
        if(isset($_SESSION['login']))
        {
          echo $_SESSION['login'];
          unset($_SESSION['login']);
        }
        if(isset($_SESSION['add']))
        {
          echo $_SESSION['add'];
          unset($_SESSION['add']);
        }

       ?>
       <img src="images/login pic.png" class="picture" alt="">
       <br>
			<p class="login-text" style="font-size: 2rem; font-weight: 800;">Login</p>
			<div class="input-group">
				<input type="text" placeholder="Username" name="username"  required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password"  required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Login</button>
			</div>
			<p class="login-register-text">Don't have an account? <a href="http://localhost/final-project/user-signup.php">Register Here</a>.</p>
		</form>
	</div>


  </body>
</html>
<?php

  if(isset($_POST['submit']))
  {
    // 1. Get data from login form
     $username = $_POST['username'];
     $password = md5($_POST['password']);

     // 2. SQL to check whether username and pwd exixts or not
    $sql = "SELECT * FROM tbl_user WHERE username='$username' AND password='$password'";

    // 3. Execute the query
    $res = mysqli_query($conn, $sql);

    $count = mysqli_num_rows($res);

    if($count==1)
    {
        $_SESSION['login'] = "<div class='success text-center'><strong><h2>Login Successful</h2></strong></div>";
        $_SESSION['user'] = $username;
      header('location:'.SITEURL);


    }
    else
    {
      $_SESSION['login'] = "<div class='error text-center'><strong>Incorrect Username or Password</strong></div>";
      header('location:'.SITEURL.'user-login.php');
    }
  }
 ?>
