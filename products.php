
<?php include('config/constants.php');
include('front-partials/login-check.php');
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Products</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="products.css">
    <link rel="shortcut icon" type="image/png" href="images/favicon.png">
<link rel="stylesheet" href="styles.css">
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


  <!--Products -->

  <div class = "products">
  <div class = "container">
  <div class="title">
  <h1>All Products</h1>
    </div>
    <p class = "text-light">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur quos sit consectetur, ipsa voluptatem vitae necessitatibus dicta veniam, optio, possimus assumenda laudantium. Temporibus, quis cum.</p>

  <?php
                  // Getting products from database that are active
                  //SQL query
    $sql = "SELECT * FROM tbl_product WHERE active='Yes'";

                  //Execute the query
    $res = mysqli_query($conn, $sql);

                  //Count rows
    $count = mysqli_num_rows($res);

    if($count>0)
                  {
                    // Product available
    while($row=mysqli_fetch_assoc($res))
                    {
                      // Get the values from db
    $id = $row['id'];
    $title = $row['title'];
    $price = $row['price'];
    $image_name = $row['image_name'];
    ?>

                      <!-- Products section begins -->
  <div class = "product-items">
                          <!-- single product -->
  <div class = "product">
  <div class = "product-content">
  <div class = "product-img">

  <?php
                                    // Check if image is Available
  if($image_name=="")
  {
                                      // Image not Available
echo "<div class='error'>Image not Available</div>";
}
  else
  {
                                      // Image Available
    ?>
  <img src = "<?php echo SITEURL; ?>images/product/<?php echo $image_name; ?>" alt = "product image">
    <?php

  }
?>
</div>
<div class = "product-btns">
<button type = "button" class = "btn-cart"> <a href="<?php echo SITEURL; ?>order.php?product_id=<?php echo $id; ?>">Buy Now</a>
<span><i class = "fas fa-plus"></i></span>

  </button>

</div>
  </div>

<div class = "product-info">
  <div class = "product-info-top">
  <h2 class = "sm-title"><?php echo $title; ?></h2>

  </div>

<p class = "product-price"></p>
  <p class = "product-price">$ <?php echo $price; ?></p>
    </div>
  </div>


  <!-- end of single product -->





<?php
  }
  }
  else
  {
                    // Not available
echo "<div class='error'> Product not available</div>";
      }


   ?>


   </body>

</html>
