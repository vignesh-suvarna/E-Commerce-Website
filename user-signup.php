<?php include('config/constants.php'); ?>
<?php include('front-partials/dbconnect.php'); ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Game Zone Signup</title>
    <link rel="stylesheet" href="log.css">
  </head>
  <body>
    <div class="container">
  <form action="" method="POST" class="login-email">
    <br>
    <?php
    if(isset($_SESSION['add']))
    {
      echo $_SESSION['add'];
      unset($_SESSION['add']);
    }
    if(isset($_SESSION['failed']))
    {
      echo $_SESSION['failed'];
      unset($_SESSION['failed']);
    }
    if(isset($_SESSION['duplicate']))
    {
      echo $_SESSION['duplicate'];
      unset($_SESSION['duplicate']);
    }

     ?>

     <img src="images/login pic.png" class="picture" alt="">
     <br>
          <p class="login-text" style="font-size: 2rem; font-weight: 800;">Create Account</p> <br>

    <div class="input-group">
      <input type="text" placeholder="Username" name="username" value="" required>
    </div>
    <div class="input-group">
      <input type="password" placeholder="Password" name="password" value="" required>
          </div>
          <div class="input-group">
      <input type="password" placeholder="Confirm Password" name="cpassword" value="" required>
    </div>
    <div class="input-group">
      <button name="submit" class="btn">Register</button>
    </div>
    <p class="login-register-text">Have an account? <a href="http://localhost/final-project/user-login.php">Login Here</a>.</p>
  </form>
</div>
  </body>
</html>




<?php
//Process value from Form and save it in the database
//Check whether submit button is clicked

if(isset($_POST['submit']))
{
  //Button clicked

// 1.Get the data from form
$username = $_POST['username'];
$password = md5($_POST['password']);
$cpassword = md5($_POST['cpassword']);
// Check for duplicate username
$check_username = "SELECT username from tbl_user WHERE username = '$username'";
$result = mysqli_query($conn, $check_username);
$countt = mysqli_num_rows($result);
if($countt > 0)
{
  $_SESSION['duplicate'] = "<div class='error text-center'><strong>Username is Already Taken</strong></div>";
  //Redirect page
  header("location:".SITEURL.'user-signup.php');
}
else
{

// 2.SQL query to save data into data base
  if($password == $cpassword)
  {
$sql = "INSERT INTO tbl_user SET
  username= '$username',
  password= '$password'
";


// 3.Executing query and saving data into DB
$res = mysqli_query($conn, $sql) or die(mysqli_error());

// 4. Check if query is executed
if($res==TRUE)
{
  //Data inserted
  //echo"Data inserted";
  //Create a session
  $_SESSION['add'] = "<div class='success text-center'><strong>Account Created successfully</strong> </div>";
  //Redirect page
  header("location:".SITEURL.'user-login.php');
}
else{
  //Failed to insert data
  //echo"Failed to insert data";
  //Create a session
  $_SESSION['add'] = "<div class='error text-center'><strong>>Failed to Create Account</strong></div>";
  //Redirect page
  header("location:".SITEURL.'user-signup.php');
}
}
else{
  $_SESSION['failed'] = "<div class='error text-center'><strong>Password did not match</strong></div>";
  //Redirect page
  header("location:".SITEURL.'user-signup.php');
}

}
}
?>
