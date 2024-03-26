<?php include('partials/menu.php'); ?>

<div class="main-content">
  <div class="wrapper">
    <h1>Add Admin</h1>
    <br>
    <br>

<?php
if(isset($_SESSION['add']))
{
  echo $_SESSION['add'];
  unset($_SESSION['add']);
}
 ?>


    <form class="" action="" method="post">
      <table class="tbl-30">
        <tr>
          <td>Full Name:</td>
          <td> <input type="text" name="full_name" placeholder="Enter your Name"> </td>
        </tr>
        <tr>
          <td>Username</td>
          <td> <input type="text" name="username" placeholder="Enter your Username"> </td>
        </tr>
        <tr>
          <td>Password</td>
          <td> <input type="password" name="password" placeholder="Enter password"> </td>
        </tr>
        <tr>
          <td colspan="2">
            <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
          </td>
        </tr>


      </table>


    </form>




  </div>

</div>
<?php include('partials/footer.php'); ?>

<?php
//Process value from Form and save it in the database
//Check whether submit button is clicked

if(isset($_POST['submit']))
{
  //Button clicked

// 1.Get the data from form
$full_name = $_POST['full_name'];
$username = $_POST['username'];
$password = md5($_POST['password']); // Password encryption

// 2.SQL query to save data into data base
$sql = "INSERT INTO tbl_admin SET
  full_name= '$full_name',
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
  $_SESSION['add'] = "<div class='success'>Admin added successfully</div>";
  //Redirect page
  header("location:".SITEURL.'admin/manage-admin.php');
}
else{
  //Failed to insert data
  //echo"Failed to insert data";
  //Create a session
  $_SESSION['add'] = "<div class='error'>Failed to add Admin</div>";
  //Redirect page
  header("location:".SITEURL.'admin/add-admin.php');
}
}
?>
