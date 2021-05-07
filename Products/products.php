<?php
include 'productsManager.php';
include '../Login/Database.inc.php';
session_start()
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link rel="stylesheet" href="../reset.css">
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container">
        <nav>
            <a href="../index.php"><img src="../logojawhite.png" alt="logojawhite"></a>
            <ul>
                <li><a href="../index.php">Home</a></li>
                <li><a href="../Products/products.php" id="productnav">Products</a></li>
                <li><a href="../ContactUS/contactus.php">Contact Us</a></li>
                <li><?php
                    if (empty($_SESSION['role'])) {
                    } else if ($_SESSION['role'] == 1) {
                        echo "<a href='../Dashboard/dashboard.php'>Dashboard</a>";
                    }
                    ?></li>
                <li><a href="../Login/login.php"><img src="loginIcon.png" class="icon">
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

        <div class="articles">
            <?php
            $ktheProduktet = new productManager();
            $ktheProduktet->returnProducts();
            ?>
        </div>
        
        <?php 
            $orderForma = new productManager();
            $orderForma->orderForm();
            ?>
        <?php
        if (isset($_GET["msg"]) && $_GET["msg"] == 'order-successful') {
            $success= new productManager();
            $success->orderSuccessful();
        }
        ?>
    </div>
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
</body>

</html>