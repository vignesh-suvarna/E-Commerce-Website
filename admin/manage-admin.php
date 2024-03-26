<?php include('partials/menu.php');?>

  <!-- Main content -->
  <div class="main-content">
<div class="wrapper">
  <h1>Manage Admin</h1>
  <br>

<?php
if(isset($_SESSION['add']))
{
  echo $_SESSION['add'];
  unset($_SESSION['add']);
}

  if(isset($_SESSION['delete']))
  {
    echo $_SESSION['delete'];
    unset($_SESSION['delete']);
  }
  if(isset($_SESSION['update']))
  {
    echo $_SESSION['update'];
    unset($_SESSION['update']);
  }

  if(isset($_SESSION['user-not-found']))
  {
    echo $_SESSION['user-not-found'];
    unset($_SESSION['user-not-found']);
  }

  if(isset($_SESSION['pwd-not-match']))
  {
    echo $_SESSION['pwd-not-match'];
    unset($_SESSION['pwd-not-match']);
  }

  if(isset($_SESSION['change-pwd']))
  {
    echo $_SESSION['change-pwd'];
    unset($_SESSION['change-pwd']);
  }

  ?>
 <br> <br> <br>


  <!-- Button to add admin -->
  <a href="add-admin.php" class="btn-primary">Add Admin</a>
  <br>
  <br>
  <table class="tbl-full">
    <tr>
      <th>Sr.No</th>
      <th>Full Name</th>
      <th>Username</th>
      <th>Actions</th>
    </tr>

<?php
  //Query to get all admin
  $sql = "SELECT * FROM tbl_admin";
  //Execute the query
  $res = mysqli_query($conn, $sql);

  //Check
  if($res==TRUE)
{
  //Count rows
  $count = mysqli_num_rows($res); // To get all rows

  $sn=1;



  if($count>0)
  {
    while($rows=mysqli_fetch_assoc($res))
    {
      //Get data from table
      $id=$rows['id'];
      $full_name=$rows['full_name'];
      $username=$rows['username'];

      //Display the data
      ?>

      <tr>
        <td><?php echo $sn++; ?></td>
        <td><?php echo $full_name; ?></td>
        <td><?php echo $username; ?></td>
        <td>
          <a href="<?php echo SITEURL; ?>admin/update-password.php?id=<?php echo $id; ?>" class="btn-primary ">Change Password</a>
          <a href="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo $id; ?>"class="btn-secondary">Update Admin</a>
          <a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id; ?>" class="btn-danger">Delete Admin</a>
        </td>
      </tr>


      <?php

    }
  }
  else
  {

  }

}

 ?>




  </table>


</div>

  </div>

<?php include('partials/footer.php'); ?>
