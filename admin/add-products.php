<?php include('partials/menu.php'); ?>


<div class="main-content">

  <div class="wrapper">
    <h1>Add Product</h1>
    <br><br>

    <?php
    if(isset($_SESSION['upload']))
    {
      echo $_SESSION['upload'];
      unset($_SESSION['upload']);
    }


     ?>


    <form  action="" method="post" enctype="multipart/form-data" >

      <table class="tbl-30">

        <tr>
          <td>Title: </td>
          <td>
            <input type="text" name="title" placeholder="Title of Product">
          </td>
        </tr>

        <tr>
          <td>Price: </td>
          <td> <input type="number" name="price" > </td>
        </tr>

        <tr>
          <td>Select Image: </td>
          <td> <input type="file" name="image"> </td>
        </tr>

        <tr>
          <td>Active: </td>
          <td>
            <input type="radio" name="active" value="Yes"> Yes
            <input type="radio" name="active" value="No"> No
          </td>
        </tr>
        <tr>
          <td colspan="2">
            <input type="submit" name="submit" value="Add Product" class="btn-secondary">
          </td>
        </tr>

      </table>
    </form>

    <?php
      // Check if button is clicked
      if(isset($_POST['submit']))
      {
        // Add product in database
        // 1. Get data from form
        $title = $_POST['title'];
        $price = $_POST['price'];

        // check if radio button are active
        if(isset($_POST['active']))
        {
          $active = $_POST['active'];
        }
        else
        {
          $active = "No";
        }

        // 2. Upload image if selected
        if(isset($_FILES['image']['name']))
        {
          $image_name = $_FILES['image']['name'];

          if($image_name!="")
          {
            // image is selected
            $ext = end(explode('.', $image_name));
            $image_name = "Product-Name-".rand(0000,9999).".".$ext;

            $src = $_FILES['image']['tmp_name'];

            $dst = "../images/product/".$image_name;
            $upload = move_uploaded_file($src, $dst);

            if($upload==FALSE)
            {
              $_SESSION['upload'] = "<div class='error'>Failed to upload image</div>";
              header('location:'.SITEURL.'admin/add-products.php');
              die();
            }
          }
        }
        else
        {
          $image_name = "";
        }

        // 3. Insert into database
        $sql = "INSERT INTO tbl_product SET
        title = '$title',
        price = $price,
        image_name = '$image_name',
        active = '$active' 
        ";
        $res = mysqli_query($conn, $sql);

        // 4. Redirect to manage product
        if($res==TRUE)
        {
          $_SESSION['add'] = "<div class='success'>Product Added successfully</div>";
          header('location:'.SITEURL.'admin/manage-products.php');
        }
        else
        {
          $_SESSION['add'] = "<div class='error'>Product Failed to Add</div>";
          header('location:'.SITEURL.'admin/manage-products.php');
        }

      }

    ?>


  </div>

</div>






<?php include('partials/footer.php'); ?>
