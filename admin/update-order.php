<?php include('partials/menu.php') ?>

<div class="main-content">
  <div class="wrapper">
    <h1>Update Order</h1>
    <br><br>

    <?php
    if(isset($_GET['id']))
    {
      $id = $_GET['id'];
      // SQL query
      $sql = "SELECT * FROM tbl_order WHERE id=$id";
      // Execute query
      $res = mysqli_query($conn, $sql);
      // Count Rows
      $count = mysqli_num_rows($res);

      if($count==1)
      {
        $row = mysqli_fetch_assoc($res);
        $item = $row['item'];
        $status = $row['status'];
        $customer_name = $row['customer_name'];
        $customer_contact = $row['customer_contact'];
      }
      else
      {
        header('location:'.SITEURL.'admin/manage-order.php');
      }
    }
    else
    {
      header('location:'.SITEURL.'admin/manage-order.php');
    }


     ?>



    <form  method="post">
      <table class="tbl-30">

        <tr>
          <td>Item Name</td>
          <td><?php echo $item; ?></td>
        </tr>

        <tr>
          <td>Status</td>
          <td> <select name="status">
            <option <?php if($status=="Ordered"){echo "selected";}?> value="Ordered">Ordered</option>
            <option <?php if($status=="Processing"){echo "selected";}?> value="Processing">Processing</option>
            <option <?php if($status=="Delivered"){echo "selected";}?> value="Delivered">Delivered</option>
            <option <?php if($status=="Cancelled"){echo "selected";}?> value="Cancelled">Cancelled</option>
          </select> </td>
        </tr>
        <tr>
          <td>Customer Name: </td>
          <td>
            <input type="text" name="customer_name" value="<?php echo $customer_name; ?>">
          </td>
        </tr>
        <tr>
          <td>Customer Contact: </td>
          <td>
            <input type="text" name="customer_contact" value="<?php echo $customer_contact; ?>">
          </td>
        </tr>
        <tr>
          <td colspan="2">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="submit" name="submit" value="Update Order" class="btn-secondary">
          </td>
        </tr>


      </table>
    </form>

    <?php
    if(isset($_POST['submit']))
    {
      $id = $_POST['id'];
      $status = $_POST['status'];
      $customer_name = $_POST['customer_name'];
      $customer_contact = $_POST['customer_contact'];

      // Update Values
      $sql2 = "UPDATE tbl_order SET
      status = '$status',
      customer_name = '$customer_name',
      customer_contact = '$customer_contact'
      WHERE id = '$id'
      ";

      // Execute the query
      $res2 = mysqli_query($conn, $sql2);

      if($res2==TRUE)
      {
        $_SESSION['update'] = "<div class='success'>Order Updated Successfully</div>";
        header('location:'.SITEURL.'admin/manage-order.php');
      }
      else
      {
        $_SESSION['update'] = "<div class='error'>Failed to Update Order</div>";
        header('location:'.SITEURL.'admin/manage-order.php');
      }
    }



     ?>


  </div>
</div>






<?php include('partials/footer.php') ?>
