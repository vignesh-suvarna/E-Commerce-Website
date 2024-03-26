<?php include('partials/menu.php'); ?>


<?php
if(isset($_GET['id']))
{
  $id = $_GET['id'];

  $sql = "SELECT * FROM tbl_product WHERE id=$id";

  $res = mysqli_query($conn, $sql);

  $row = mysqli_fetch_assoc($res);

  $title = $row['title'];
  $price = $row['price'];
  $current_image = $row['image_name'];
  $active = $row['active'];



}
else
{
  header('location:'.SITEURL.'admin/manage-products.php');
}


 ?>

<div class="main-content">
  <div class="wrapper">
    <h1>Update Product</h1>
    <br><br>

    <form   method="post" enctype="multipart/form-data">
      <table class="tbl-30">

        <tr>
          <td>Title: </td>
          <td> <input type="text" name="title" placeholder="Product Title" value="<?php echo $title;  ?>"> </td>
        </tr>

        <tr>
          <td>Price: </td>
          <td> <input type="number" name="price" value="<?php echo $price;  ?>"> </td>
        </tr>

        <tr>
          <td>Current Image: </td>
          <td>
            <?php
            if($current_image=="")
            {
              echo "<div class='error'>Image not available</div>";
            }
            else
            {
              ?>
              <img src="<?php echo SITEURL; ?>images/product/<?php echo $current_image; ?>" width="150px">
              <?php
            }
             ?>
          </td>
        </tr>

        <tr>
          <td>Select New Image: </td>
          <td>
            <input type="file" name="image">
          </td>
        </tr>

        <tr>
          <td>Active: </td>
          <td>
            <input <?php if($active=="Yes") {echo "checked";} ?>  type="radio" name="active" value="Yes"> Yes
            <input <?php if($active=="No") {echo "checked";} ?> type="radio" name="active" value="No"> No
           </td>
        </tr>
        <tr>
          <td>
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">

            <input type="submit" name="submit" value="Update Product" class="btn-secondary"></td>
        </tr>

      </table>


    </form>

    <?php
    if(isset($_POST['submit']))
    {
      $id = $_POST['id'];
      $title = $_POST['title'];
      $price = $_POST['price'];
      $current_image = $_POST['current_image'];
      $active = $_POST['active'];

      // Upload image if uploaded
      if(isset($_FILES['image']['name']))
      {
        $image_name = $_FILES['image']['name'];

        if($image_name!="")
        {
          $ext = end(explode('.', $image_name));

          $image_name = "Product-Name-".rand(0000, 9999).'.'.$ext;

          $src_path = $_FILES['image']['tmp_name'];
          $dest_path = "../images/product/".$image_name;
          $upload = move_uploaded_file($src_path, $dest_path);

          if($upload==FALSE)
          {
            $_SESSION['upload'] = "<div class='error'>Failed to Upload New Image</div>";
            header('location:'.SITEURL.'admin/manage-products.php');
            // Stop process
            die();
          }

          if($current_image!="")
          {
            $remove_path = "../images/product/".$current_image;

            $remove = unlink($remove_path);
            if($remove==FALSE)
            {
              $_SESSION['remove-failed'] = "<div class='error'>Failed to Remove Current Image</div>";
              header('location:'.SITEURL.'admin/manage-products.php');
              // Stop process
              die();
            }

          }

        }
        else
        {
          $image_name = $current_image;
        }
      }
      else
      {
        $image_name = $current_image;
      }

      $sql2 = "UPDATE tbl_product SET
      title = '$title',
      price = $price,
      image_name = '$image_name',
      active = '$active'
      WHERE id=$id
      ";

      // Execute SQL query
      $res2 = mysqli_query($conn, $sql2);

      if($res2==TRUE)
      {
        $_SESSION['update'] = "<div class='success'>Product Updated Successfully</div>";
        header('location:'.SITEURL.'admin/manage-products.php');
      }
      else
      {
        $_SESSION['update'] = "<div class='error'>Failed to Update Product</div>";
        header('location:'.SITEURL.'admin/manage-products.php');
      }


    }


     ?>



  </div>

</div>



<?php include('partials/footer.php'); ?>
