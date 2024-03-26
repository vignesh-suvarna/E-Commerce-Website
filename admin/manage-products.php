<?php include('partials/menu.php');?>

  <!-- Main content -->
  <div class="main-content">
<div class="wrapper">
  <h1>Manage Products</h1>
  <br>
  <br>
  <!-- Buttin to add Product -->
  <a href="<?php echo SITEURL; ?>admin/add-products.php" class="btn-primary">Add Products</a>
  <br>
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

  if(isset($_SESSION['upload']))
  {
    echo $_SESSION['upload'];
    unset($_SESSION['upload']);
  }
  if(isset($_SESSION['unauthorize']))
  {
    echo $_SESSION['unauthorize'];
    unset($_SESSION['unauthorize']);
  }
  if(isset($_SESSION['update']))
  {
    echo $_SESSION['update'];
    unset($_SESSION['update']);
  }
  if(isset($_SESSION['remove-failed']))
  {
    echo $_SESSION['remove-failed'];
    unset($_SESSION['remove-failed']);
  }
  ?>


  <table class="tbl-full">
    <tr>
      <th>Sr.No</th>
      <th>Title</th>
      <th>Price</th>
      <th>Image</th>
      <th>Active</th>
      <th>Actions</th>
    </tr>

    <?php
    // Create a SQL query
    $sql = "SELECT * FROM tbl_product";

    // Execute the query
    $res = mysqli_query($conn, $sql);

    $count = mysqli_num_rows($res);

    // Create serial number variable
    $sn=1;

    if($count>0)
    {
      while($row=mysqli_fetch_assoc($res))
      {
        $id = $row['id'];
        $title = $row['title'];
        $price = $row['price'];
        $image_name = $row['image_name'];
        $active = $row['active'];
        ?>
        <tr>
          <td><?php echo $sn++; ?></td>
          <td><?php echo $title; ?></td>
          <td>$<?php echo $price; ?></td>
          <td>
            <?php
            // Check if there is image
            if($image_name=="")
            {
              echo "<div class='error'>No Image added</div>";
            }
            else
            {
              ?>
              <img src="<?php echo SITEURL; ?>images/product/<?php echo $image_name; ?>" width="100px">
              <?php
            }

             ?>
          </td>
          <td><?php echo $active; ?></td>
          <td>
            <a href="<?php echo SITEURL; ?>admin//update-products.php?id=<?php echo $id;?>"class="btn-secondary">Update Product</a>
            <a href="<?php echo SITEURL; ?>admin/delete-products.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-danger">Delete Product</a>
          </td>
        </tr>

        <?php
      }
    }
    else
    {
      echo "<tr> <td colspan='7' class='error'>Product not Added yet. </td? </tr>";
    }


     ?>




  </table>

</div>

  </div>

<?php include('partials/footer.php'); ?>
