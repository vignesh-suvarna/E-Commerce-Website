<?php
// Include constants page
include('../config/constants.php');

if(isset($_GET['id']) && isset($_GET['image_name']))
{

$id = $_GET['id'];
$image_name = $_GET['image_name'];

if($image_name != "")
{
  $path = "../images/product/".$image_name;
  $remove = unlink($path);

  if($remove==FALSE)
  {
    $_SESSION['upload'] = "<div class='error'>Failed to remove Image File</div>";
    header('location:'.SITEURL.'admin/manage-products.php');
    die();
  }
}

// Delete food from database
$sql = "DELETE FROM tbl_product WHERE id=$id";

// Execute the query
$res = mysqli_query($conn, $sql);

if($res==TRUE)
{
  $_SESSION['delete'] = "<div class='success'>Product Deleted successfully</div>";
  header('location:'.SITEURL.'admin/manage-products.php');
}
else
{
  $_SESSION['delete'] = "<div class='error'>Failed to Delete Product</div>";
  header('location:'.SITEURL.'admin/manage-products.php');
}


}
else
{
  //Redirect to Manage Page
  $_SESSION['unauthorize'] = "<div class='error'>Unauthorized Access</div>";
  header('location:'.SITEURL.'admin/manage-products.php');

}

 ?>
