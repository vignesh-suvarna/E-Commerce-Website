
<?php
include('config/constants.php');
include('front-partials/login-check.php');
 ?>

<?php
if(isset($_GET['product_id']))
{
  $product_id = $_GET['product_id'];

  // Get details
  $sql = "SELECT * FROM tbl_product WHERE id=$product_id";

  // Execute the query
  $res = mysqli_query($conn, $sql);

  $count = mysqli_num_rows($res);

  if($count==1)
  {
    $row = mysqli_fetch_assoc($res);
    $title = $row['title'];
    $price = $row['price'];
    $image_name = $row['image_name'];
  }
  else
  {
    header('location:'.SITEURL);
  }


}
else
{
  header('location:'.SITEURL);
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Order Page</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="order.css">
    <link rel="shortcut icon" type="image/png" href="images/favicon.png">
  </head>
  <body>
    <!-- Navigation -->
    <nav class="nav">
      <div class="navigation container">
      <div class="logo">
  <img src="images/logo.png" alt="logo">
  </div>
   <div class="menu">
     <div class="top-nav">
       <div class="Namee">
   <h1>Game Zone</h1>
   </div>
   <div class="close">
    <i class='bx bx-x'></i>
     </div>
    </div>
    <ul class="nav-list">
      <li class="nav-item">
        <a href="<?php echo SITEURL; ?>" class="nav-link"><strong>Home</strong></a>
      </li>
      <li class="nav-item">
        <a href="<?php echo SITEURL; ?>products.php" class="nav-link"><strong>Products</strong></a>
      </li>
      <li class="nav-item">
        <a href="<?php echo SITEURL; ?>about.php" class="nav-link"><strong>About</strong></a>
      </li>
      <li class="nav-item">
        <a href="<?php echo SITEURL; ?>contact.php" class="nav-link"><strong>Contact</strong></a>
      </li>
      <li class="nav-item">
        <a href="<?php echo SITEURL; ?>user-logout.php" class="nav-link"> <strong>Logout</strong> </a>
      </li>


    </ul>
  </div>
  <a href="cart.html" class="cart-icon"><i class='bx bx-cart'></i></a>
  <div class="hamburger">
    <i class='bx bx-menu'></i>
  </div>
  </div>
  </nav>
  <br>
    <div class="container">
  <div class="title">
      <h2>Product Order Form</h2>
  </div>
<div class="d-flex">
  <form method="post">
    <?php
      if($image_name=="")
      {
        echo "<div class='error'> Image not available</div>";
      }
      else
      {
        ?>

      <img class="image-product" src="<?php echo SITEURL; ?>images/product/<?php echo $image_name; ?>" alt="Product image" width="150px">
        <?php
      }
    ?>

    <label>
      <span class="fname">Name <span class="required">*</span></span>
      <input type="text" name="full-name" placeholder="Full Name">
    </label>
    <label>
      <span>Address <span class="required">*</span></span>
      <textarea name="address" rows="5" cols="96" placeholder="Full Address" ></textarea>

    </label>

    <label>
      <span>Phone <span class="required">*</span></span>
      <input type="tel" name="contact">
    </label>
    <label>
      <span>Email Address <span class="required">*</span></span>
      <input type="email" name="email">
    </label>
  <div class="Yorder">
    <table>
      <tr>
        <th colspan="2">Your order</th>
      </tr>
      <tr>
        <td>Product Name</td>
        <td id="productName"><h3><strong><?php echo $title; ?></strong>  </h3></td>
      </tr>
      <input type="hidden" name="item" value="<?php echo $title; ?>">
      <tr>

        <td>Subtotal</td>
        <td id="productPrice"><h3><strong>$ <?php echo $price; ?></strong></h3> </td>
      </tr>
      <input type="hidden" name="price" value="<?php echo $price; ?>">
      <tr>
        <td>Shipping</td>
        <td>Free shipping</td>
      </tr>
    </table><br>
    <div class="payment-type">
         <input type="radio" name="dbt" value="dbt" checked> Direct Bank Transfer
       </div>
       <p>
       </p>
       <div class="payment-type" >
         <input type="radio" name="dbt" value="cd"> Cash on Delivery
       </div>
       <div  class="payment-type">
         <input type="radio" name="dbt" value="cd"> Paypal <span>
         <img src="https://www.logolynx.com/images/logolynx/c3/c36093ca9fb6c250f74d319550acac4d.jpeg" alt="" width="50">
         </span>
         <br>
       </div>
       <input type="submit" name="submit" value="Confirm Order" class="button-order">
       </form>
  </div><!-- Yorder -->
 </div>
</div>
<?php
if(isset($_POST['submit']))
{
  // Get data from form
  $item = $_POST['item'];
  $price = $_POST['price'];
  $total = $price;
  $order_date = date("Y-m-d h:i:sa");
  $status = "Ordered";
  $customer_name = $_POST['full-name'];
  $customer_contact = $_POST['contact'];
  $customer_email = $_POST['email'];
  $customer_address = $_POST['address'];

  // Create SQL query to save data
  $sql2 = "INSERT INTO tbl_order SET
  item = '$item',
  price = $price,
  total = $total,
  order_date = '$order_date',
  status = '$status',
  customer_name = '$customer_name',
  customer_contact = '$customer_contact',
  customer_email = '$customer_email',
  customer_address = '$customer_address'
  ";

  // Execute the query
  $res2 = mysqli_query($conn, $sql2);

  if($res2==TRUE)
  {
    $_SESSION['order'] = "<div class='success text-center'><strong>Order Placed Successfully</strong></div>";
    header('location:'.SITEURL);
  }
  else
  {
    $_SESSION['order'] = "<div class='error text-center'><strong>Failed to Place Order</strong></div>";
    header('location:'.SITEURL);
  }


}

?>
<!-- Footer -->
<footer id="footer" class="section footer">
    <div class="container">
      <div class="footer-container">
        <div class="footer-center">
          <h3>EXTRAS</h3>
          <a href="#">Brands</a><br>
          <a href="#">Gift Certificates</a><br>
          <a href="#">Affiliate</a><br>
          <a href="#">Specials</a><br>
          <a href="#">Site Map</a><br>
        </div>
        <div class="footer-center">
          <h3>INFORMATION</h3>
          <a href="#">About Us</a><br>
          <a href="#">Privacy Policy</a><br>
          <a href="#">Terms & Conditions</a><br>
          <a href="#">Contact Us</a><br>
          <a href="#">Site Map</a>
        </div>
        <div class="footer-center">
          <h3>MY ACCOUNT</h3>
          <a href="#">My Account</a><br>
          <a href="#">Order History</a><br>
          <a href="#">Wish List</a>
          <a href="#">Newsletter</a>
          <a href="#">Returns</a>
        </div>
        <div class="footer-center">
          <h3>CONTACT US</h3>
          <div>
            <span>
              <i class="fas fa-map-marker-alt"></i>
            </span>
            42 Dream House, Dreammy street, 7131 Dreamville, USA
          </div>
          <div>
            <span>
              <i class="far fa-envelope"></i>
            </span>
            company@gmail.com
          </div>
          <div>
            <span>
              <i class="fas fa-phone"></i>
            </span>
            456-456-4512
          </div>
          <div>
            <span>
              <i class="far fa-paper-plane"></i>
            </span>
            Dream City, USA
          </div>
        </div>
      </div>
    </div>
    </div>
  </footer>

  </body>
</html>
