<?php
include('config/constants.php');
include('front-partials/login-check.php');
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>About Us</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="about.css">
        <link rel="stylesheet" href="styles.css">
        <script src="https://kit.fontawesome.com/dbed6b6114.js" crossorigin="anonymous"></script>
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
    </nav>
        <section>
            <div class = "about-image">
                <!-- image here -->
                <img src="images/about.png" alt="">
            </div>

            <div class = "content">
                <h2>About Us</h2>
                <span><!-- line here --></span>

                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nobis aspernatur voluptas inventore ab voluptates nostrum minus illo laborum harum laudantium earum ut, temporibus fugiat sequi explicabo facilis unde quos corporis!</p>

                <ul class = "links">
                    <li><a href = "#">work</a></li>

                    <div class = "vertical-line"></div>

                    <li><a href = "#">service</a></li>

                    <div class = "vertical-line"></div>

                    <li><a href = "#">contact</a></li>
                </ul>

                <ul class = "icons">
                    <li>
                        <i class = "fa fa-twitter"></i>
                    </li>
                    <li>
                        <i class = "fa fa-facebook"></i>
                    </li>
                    <li>
                        <i class = "fa fa-github"></i>
                    </li>
                    <li>
                        <i class = "fa fa-pinterest"></i>
                    </li>
                </ul>
            </div>
                <br>
        </section>

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
