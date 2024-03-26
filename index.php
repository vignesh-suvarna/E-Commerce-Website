<?php
include('config/constants.php');
include('front-partials/login-check.php');
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Game Zone</title>

    <!--boxicon-->
    <link rel="stylesheet"
   href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

   <!--favicon-->
   <link rel="shortcut icon" type="image/png" href="images/favicon.png">

   <!-- Stylesheet-->
   <link rel="stylesheet" href="styles.css">

   <!-- Google Fonts -->
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

  </head>
  <body>
<!--Header-->
<header id="home" class="header">
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
      <a href="<?php echo SITEURL; ?>" class="nav-link"> <strong>Home</strong> </a>
    </li>
    <li class="nav-item">
      <a href="<?php echo SITEURL; ?>products.php" class="nav-link"> <strong>Products</strong> </a>
    </li>
    <li class="nav-item">
      <a href="<?php echo SITEURL; ?>about.php" class="nav-link"> <strong>About</strong> </a>
    </li>
    <li class="nav-item">
      <a href="<?php echo SITEURL; ?>contact.php" class="nav-link"> <strong>Contact</strong> </a>
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

<!-- Display Order Confirmation php -->
<?php
if(isset($_SESSION['order']))
{
  echo $_SESSION['order'];
  unset($_SESSION['order']);
}
if(isset($_SESSION['login']))
{
  echo $_SESSION['login'];
  unset($_SESSION['login']);
}



 ?>




<!-- Hero -->
<img src="images/banner.png" class="hero-img"  alt="banner">
<div class="hero-content">
  <h2> <span class="discount"> 40%</span> SALE</h2>
  <h1>
    <span>Its</span>
    <span>Game Time!</span>
  </h1>
  <a href="<?php echo SITEURL; ?>products.php" class="btn">Shop Now</a>

</div>



</header>

<!-- Main -->
<main>
  <section class="section advert">
    <div class="title">
      <h1>Available Products</h1>
    </div>
    <div class="advert-center container">
      <div class="advert-box">
        <div class="dotted">
          <div class="content">
            <h2>
              PlayStation
            </h2>
            <h4>Best Sellers</h4>
            </div>
          </div>
        <img src="images/playstation.png" alt="PlayStation">
      </div>
      <div class="advert-box">
        <div class="dotted">
          <div class="content">
            <h2>
              Xbox
            </h2>
            <h4>Best Sellers</h4>
            </div>
          </div>
        <img src="images/xbox.png" alt="Xbox">
      </div>
      <div class="advert-box">
        <div class="dotted">
          <div class="content">
            <h2>
              Accessories
            </h2>
            <h4>Top Sellers</h4>
            </div>
          </div>
        <img src="images/accessories.png" alt="Accessories">
      </div>
      </div>
    </section>

    <!-- Featured Products -->
    <div class="title">
      <h1>Featured Products</h1>
    </div>
    <div class="container page-wrapper">
  <div class="page-inner">
    <div class="row">
      <div class="el-wrapper">
        <div class="box-up">
          <img class="img" src="images/godofwar.png" alt="">
          <div class="img-info">
            <div class="info-inner">

            </div>
            <div class="a-size"> <b id="productName">God of War: </b><span class="size">PS4</span></div>
          </div>
        </div>

        <div class="box-down">
          <div class="h-bg">
            <div class="h-bg-inner"></div>
          </div>

          <a class="cart" href="<?php echo SITEURL; ?>products.php">
            <span class="price" id="productPrice">$12</span>
            <span class="add-to-cart">
              <span class="txt">God of War: PS4</span>
            </span>
          </a>
        </div>
</div>
<div class="el-wrapper">
  <div class="box-up">
    <img class="img" src="images/controller.png" alt="">
    <div class="img-info">
      <div class="info-inner">

      </div>
      <div class="a-size"><b id="productName">Controller: </b<span class="size">PS4</span></div>
    </div>
  </div>

  <div class="box-down">
    <div class="h-bg">
      <div class="h-bg-inner"></div>
    </div>

    <a class="cart" href="<?php echo SITEURL; ?>products.php">
      <span class="price" id="productPrice">$12</span>
      <span class="add-to-cart">
        <span class="txt">Controller: PS4</span>
      </span>
    </a>
  </div>
</div>
<div class="el-wrapper">
  <div class="box-up">
    <img class="img" src="images/console.png" alt="">
    <div class="img-info">
      <div class="info-inner">

      </div>
      <div class="a-size"><b id="productName">Console: </b<span class="size">Xbox</span></div>
    </div>
  </div>

  <div class="box-down">
    <div class="h-bg">
      <div class="h-bg-inner"></div>
    </div>

    <a class="cart" href="<?php echo SITEURL; ?>products.php">
      <span class="price" id="productPrice">$12</span>
      <span class="add-to-cart">
        <span class="txt">Console: Xbox</span>
      </span>
    </a>
  </div>
</div>





</div>
</div>
</div>





    <!-- Brands -->
    <section class="section">
      <div class="brands-center container">
        <div class="brand">
          <img src="images/brand 1.png" alt="brand">
        </div>
        <div class="brand">
          <img src="images/brand 2.png" alt="brand">
        </div>
        <div class="brand">
          <img src="images/brand 3.png" alt="brand">
        </div>
      </div>
    </section>

</main>
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


<!-- GSAP -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.7.1/gsap.min.js"></script>
</body>
</html>
