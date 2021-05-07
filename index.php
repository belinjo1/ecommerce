<?php include './Login/LoginValidation.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  <link rel="stylesheet" href="reset.css">
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <div class="container">
  <nav>
    <a href="index.php"><img src="logojawhite.png" alt="logojawhite"></a>
    <ul>
        <li><a href="#home" id="homenav">Home</a></li>
        <li><a href="./Products/products.php">Products</a></li>
        <li><a href="./ContactUS/contactus.php">Contact Us</a></li>
        <li><?php 
            if(empty($_SESSION['role'])){
            }
            else if($_SESSION['role'] == 1){
            echo "<a href='./Dashboard/dashboard.php'>Dashboard</a>";
            }
            ?></li>
        <li><a href="./Login/login.php"><img src="./images/loginIcon.png" class="icon">
            <?php
            if (empty($_SESSION['username'])) {
            echo 'Login';
            } else {
            echo $_SESSION['username'];
            echo "<a href='./Login/logout.php' title='Logout'>Log Out</a>";
          }
          ?></a></li>
    </ul>
  </nav>
  <div class="slider">
    <div class="slider-content active">
      <img src="images/T1.png" alt="Slide1"/>
    </div>
    <div class="slider-content not-active">
      <img src="images/T2.png" alt="Slide2"/>
    </div>
    <div class="slider-content not-active">
      <img src="images/T3.png" alt="Slide3"/>
    </div>
    <div class="slider-content not-active">
      <img src="images/T4.png" alt="Slide4"/>
    </div>
    <div class="slider-content not-active">
      <img src="images/T5.png" alt="Slide5"/>
    </div>
  </div>

  <div class="section2" >
  <div class="upper-side">
  <div class="boxes">
      <img src="images/FastDeliveryIcon.png" alt="Fast-Delivery-Icon"/>
      <h5>Fast Delivery</h5>
      <p>Ordered products get shipped to your address within 48 hours.</p>
    </div>

  <div class="boxes">
      <img src="images/QualityIcon.png" alt="Quality-Icon"/>
      <h5>Quality</h5>
      <p>We provide full quality products which are proven for years.</p>
  </div>

    <div class="boxes">
      <img src="images/WarrantyIcon.png" alt="Warranty-Icon"/>
      <h5>Warranty</h5>
      <p>We offer 3 months guarantee for every product in our store.</p>
    </div>
    </div>

    <div class="lower-side">
    <h3>TOP SELLING PRODUCTS Dashboard</h3>
    <table class="styled-table">
      <thead>
        <tr>
          <th>Name of the Product</th>
          <th>In Stock</th>
          <th>Sold</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Dior Sauvage</td>
          <td>15</td>
          <td>18</td>
        </tr>
        <tr>
          <td>One Million</td>
          <td>22</td>
          <td>16</td>
        </tr>
        <tr>
          <td>Joop</td>
          <td>25</td>
          <td>12</td>
        </tr>
        <tr>
          <td>Creed</td>
          <td>19</td>
          <td>9</td>
        </tr>
      </tbody>
    </table>
  </div>
  </div>

  <div class="about">
    <div class="quotes">
      <a id="quote">
        <h2>OUR STORY OF SUCCESS</h2>
      </a>
      <a id="quote">
        <h3>“The beauty of flagrance is that it speaks to your <br>heart…and hopefully someone else's” – Elizabeth Taylor.</h3>
      </a>
    </div>
  </div>
  </div>
  <footer>
      <h3>Contact Us on:</h3>
      <div class="contact-links">

      <a href="https://www.facebook.com/MbusheQantenks-507294149327471" target="_blank">
          <img alt="facebook" src="images/facebook .png">
      </a>

      <a href="https://www.instagram.com/mbushecanten/" target="_blank">
        <img alt="instagram" src="images/instagram.png" >
      </a>
    
      <a href="mailto:bleerim12@hotmail.com" target="_blank">
        <img alt="outlook" src="images/outlook.png">
      </a>
      </div>
      <span>&copy; Copyright 2020 MbusheCanten</span>
  </footer>
  <script src="main.js"></script>
</body>
</html>