<?php include('partials/menu.php');?>

  <!-- Main content -->
  <div class="main-content">
<div class="wrapper">
  <h1>Manage Order</h1>
  <br>
  <br>
  <!-- Buttin to add admin -->


  <br>

  <?php
  if(isset($_SESSION['update']))
  {
    echo $_SESSION['update'];
    unset($_SESSION['update']);
  }

   ?>
   <br><br>


  <table class="tbl-full">
    <tr>
      <th>Sr.No</th>
      <th>Item</th>
      <th>Total</th>
      <th>Order Date</th>
      <th>Status</th>
      <th>Customer Name</th>
      <th>Contact</th>
      <th>Address</th>
      <th>Email</th>
      <th>Actions</th>
    </tr>

    <?php
    // Get all order from database
    $sql = "SELECT * FROM tbl_order ORDER BY id DESC";
    // Execute the query
    $res = mysqli_query($conn, $sql);

    $count = mysqli_num_rows($res);
    $sn = 1;

    if($count>0)
    {
      while($row=mysqli_fetch_assoc($res))
      {
        // Get order details
        $id = $row['id'];
        $item = $row['item'];
        $price = $row['price'];
        $total = $row['total'];
        $order_date = $row['order_date'];
        $status = $row['status'];
        $customer_name = $row['customer_name'];
        $customer_contact = $row['customer_contact'];
        $customer_email = $row['customer_email'];
        $customer_address = $row['customer_address'];
        ?>
        <tr>
          <td><?php echo $sn++; ?>.</td>
          <td><?php echo $item; ?></td>
          <td>$<?php echo $total; ?></td>
          <td><?php echo $order_date; ?></td>

          <td>
            <?php
            if($status=="Ordered")
            {
              echo "<label>$status</label>";
            }
            elseif($status=="Processing")
            {
              echo "<label style='color: orange;' >$status</label>";
            }
            elseif($status=="Delivered")
            {
              echo "<label style='color: darkgreen;' >$status</label>";
            }
            elseif($status=="Cancelled")
            {
              echo "<label style='color: red;' >$status</label>";
            }
             ?>
          </td>

          <td><?php echo $customer_name; ?></td>
          <td><?php echo $customer_contact; ?></td>
          <td><?php echo $customer_address; ?></td>
          <td><?php echo $customer_email; ?></td>
          <td>
            <a href="<?php echo SITEURL; ?>admin/update-order.php?id=<?php echo $id; ?>"class="btn-secondary">Update Order</a>
          </td>
        </tr>
        <?php
      }
    }
    else
    {
      echo"<tr><td colspan='11' class='error'>Order is not Available </td> </tr>";
    }

    ?>




  </table>


</div>

  </div>

<?php include('partials/footer.php'); ?>
