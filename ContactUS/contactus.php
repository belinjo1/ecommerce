<?php
include 'contactUsValidation.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="../reset.css">
    <link rel="stylesheet" href="contactstyles.css">
  </head>

<body>
  <nav>
      <a href="../index.php"><img src="../logojawhite.png" alt="logojawhite"></a>
      <ul>
        <li><a href="../index.php">Home</a></li>
        <li><a href="../Products/products.php">Products</a></li>
        <li><a href="ContactUS/contactus.php"  id="contactusnav">Contact Us</a></li>
        <li><?php
            if (empty($_SESSION['role'])) {
            } else if ($_SESSION['role'] == 1) {
              echo "<a href='../Dashboard/dashboard.php'>Dashboard</a>";
            }
            ?></li>
        <li><a href="../Login/login.php"><img src="../images/loginIcon.png" class="icon">
            <?php
            if (empty($_SESSION['username'])) {
              echo 'Login';
            } else {
              echo $_SESSION['username'];
              echo "<a href='../Login/logout.php' title='Logout'>Log Out</a>";
            }
            ?></a></li>
      </ul>
    </nav>
  <div class="container">
    
    <div class="content">
      <h5>
        <?php
        if (isset($_GET['message']) && $_GET['message'] == 'error') {
          echo ' <p><i style=color:black>Invalid or Empty Data!</i></p>';
        } else if (isset($_GET['message']) && $_GET['message'] == 'success') {
          echo ' <p><i style=color:green>Message sent!</i></p>';
        }
        ?>
      </h5>

      <form action="contactUsValidation.php" method="POST">
        <label for="fname">First Name</label>
        <input type="text" id="fname" name="firstname" placeholder="Your name..">

        <label for="lname">Last Name</label>
        <input type="text" id="lname" name="lastname" placeholder="Your last name..">

        <label for="country">Country/City</label>
        <select id="country" name="country" require>
          <optgroup label="Kosovë">
            <option value="Gjilan">Gjilan</option>
            <option value="Prishtine">Prishtine</option>
            <option value="Ferizaj">Ferizaj</option>
            <option value="Gjakove">Gjakove</option>
            <option value="Peje">Peje</option>
            <option value="Prizren">Prizren</option>
            <option value="Mitrovice">Mitrovice</option>
          </optgroup>
          <optgroup label="Shqipëri">
            <option value="Tiranë">Tiranë</option>
            <option value="Durrës">Durrës</option>
            <option value="Shkodër">Shkodër</option>
            <option value="Lezhë">Lezhë</option>
            <option value="Vlorë">Vlorë</option>
            <option value="Sarandë">Sarandë</option>
            <option value="Korce">Korce</option>
          </optgroup>
          <optgroup label="Tjeter Shtet">
            <option value="else">Tjeter</option>
          </optgroup>
        </select>

        <label for="subject">Subject</label>
        <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea>

        <input type="submit" formmethod="POST" value="Submit" name="submitMessage">
      </form>
    </div>

    <div class="infot">

    <div class="personat">
      <img src="../ContactUS/BlerimiImage.png" alt="Blerimi">

        <h1>Blerim Morina</h1>
        <p>CSE Student<br>City : Gjilan<br>Country: Kosovo<br>Date of birth: 23/04/2001</p>

        <div class="informatat">

          <div class="i1">

            <a href="https://instagram.com/blerim.morinaa" target="_blank" class="social-media"><img src="../images/instagram.png"></a>
            <p> /blerim.morinaa</p>
          </div>

          <div class="i2">
            <a href="https://facebook.com/beeli123" target="_blank" class="social-media"><img src="../images/facebook .png"></a>
            <p>/beeli123</p>
        </div>
      </div>
    </div>

      <div class="personat"><img src="../ContactUS/BajramiImage.png" alt="Bajrami">
        <h1>Bajram Latifaj</h1>
        <p>CSE Student <br>City : Hogosht<br>Country: Kosovo<br>Date of birth: 24/12/2000</p>

        <div class="informatat">

        <div class="i1">
        <a href="https://instagram.com/bajram.latifaj" target="_blank" class="social-media"><img src="../images/instagram.png"></a>
          <p>/bajram.latifaj</p>
        </div>

        <div class="i1">
        <a href="https://facebook.com/latifaj.bajram" target="_blank" class="social-media"><img src="../images/facebook .png"></a>
          <p>/latifaj.bajram</p>
        </div>
        </div>
      </div>
    </div>
  </div>
</body>

<footer>
  <h3>Contact Us on:</h3>
  <div class="contact-links">

    <a href="https://www.facebook.com/MbusheQantenks-507294149327471" target="_blank">
      <img alt="facebook" src="../images/facebook .png">
    </a>

    <a href="https://www.instagram.com/mbushecanten/" target="_blank">
      <img alt="instagram" src="../images/instagram.png">
    </a>

    <a href="mailto:bleerim12@hotmail.com" target="_blank">
      <img alt="outlook" src="../images/outlook.png">
    </a>
  </div>
  <span>&copy; Copyright 2020 MbusheCanten</span>
</footer>

</html>