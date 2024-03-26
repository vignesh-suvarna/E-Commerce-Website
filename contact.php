<?php
include('config/constants.php');
include('front-partials/login-check.php');
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Game Zone- Contact</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="contact.css">
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
  <br><br><br>
  <!-- Contact Form -->
<div class="wrapper">


  <form>
    <h1 class="heading text-center">Contact Us</h1>
    <br><br>
  <input name="name" type="text" class="feedback-input" placeholder="Name" />
  <input name="email" type="text" class="feedback-input" placeholder="Email" />
  <textarea name="text" class="feedback-input" placeholder="Comment"></textarea>
  <input type="submit" value="SUBMIT"/>
</form>
</div>
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
