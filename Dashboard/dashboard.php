<?php
include '../Products/productsManager.php';
include '../Login/registerValidation.php';
include '../ContactUS/contactUsValidation.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../reset.css">
    <link rel="stylesheet" href="stylesdashboard.css">
    <title>Dashboard</title>
</head>

<body>
    <div class="container">
        <nav>
            <a href="../index.php"><img src="../logojawhite.png" alt="logojawhite"></a>
            <ul>
                <li><a href="../index.php">Home</a></li>
                <li><a href="../Products/products.php" >Products</a></li>
                <li><a href="../ContactUS/contactus.php">Contact Us</a></li>
                <li><?php
                    if (empty($_SESSION['role'])) {
                    } else if ($_SESSION['role'] == 1) {
                        echo "<a href='./Dashboard/dashboard.php' id='dashboardnav'>Dashboard</a>";
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

                    
        <h3 class="s3-title">Add Product</h3>
        <form action="../Products/productsManager.php" method="POST" enctype="multipart/form-data" >
        <label for="productname">Product Title</label>    
        <input type="text" name="productname">
        <label for="my_image">Insert image</label>
        <input type="file" name="my_image">
        <label for="price">Price</label>
        <input type="text" name="price" >
            <input type="submit" name="add" id="submit-btn">
        </form>
        <h3 class="s3-title">Products</h3>
        <table class="styled-table">
            <thead>
                <tr>
                    <th class="id">ID</th>
                    <th class="name">Name</th>
                    <th class="price">Price</th>
                    <th class="button">Manage</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $showProductForAdmin = new productManager();
                $showProductForAdmin->returnProductsForAdmin();
            ?>
            </tbody>
        </table>
        <h3 class="s3-title">Orders</h3>
        <table class="styled-table">
            <thead>
                <tr>
                    <th class="id">ID</th>
                    <th class="name">Title</th>
                    <th class="price">Name</th>
                    <th class="price">Surname</th>
                    <th class="price">Address</th>
                    <th class="price">Street</th>
                    <th class="price">ZIP</th>
                    <th class="price">Country</th>
                    <th class="price">Price</th>
                    <th class="price">Date ordered</th>
                    <th class="button">Manage</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $showOrdersForAdmin = new productManager();
                $showOrdersForAdmin->returnOrdersForAdmin();
            ?>
            </tbody>
        </table>
        <h3 class="s3-title">Users</h3>
        <table class="styled-table">
            <thead>
                <tr>
                    <th class="id">ID</th>
                    <th class="name">Username</th>
                    <th class="price">Password</th>
                    <th class="price">Email</th>
                    <th class="price">Created at:</th>
                    <th class="button">Manage</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $ktheUserat = new RegisterValidation();
                $ktheUserat->returnUsers();
            ?>
            </tbody>
        </table>

        <h3 class="s3-title">Messages</h3>
        <table class="styled-table">
            <thead>
                <tr>
                <th class="id">ID</th>
                    <th class="name">Name</th>
                    <th class="price">Lastname</th>
                    <th class="price">City</th>
                    <th class="price">Subject</th>
                    <th class="button">Manage</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $ktheMesazhet = new ContactFormValidation();
                $ktheMesazhet->returnMessages();
            ?>
            </tbody>
        </table>
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