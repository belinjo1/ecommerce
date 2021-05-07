<?php
include '../Login/Database.inc.php';
include 'deleteProduct.php';
ob_start();
class productManager{
    
    function returnProducts(){
    global $conn;
    $sql = "SELECT * from products;";
    $result = mysqli_query($conn,$sql);

    while ($row = mysqli_fetch_assoc($result)){
        echo '<form method="post" action=products.php?prodid='.$row['id'].'>';
        echo '<div class="productbox">';
        echo '<img src="'.$row['image'].'">';
        echo '<div class="prod">';
        echo '<h3 class="tit">' .$row['productname'].'</h3>';
        echo '<h4 class="price">'.$row['price'].'</h4>';
        echo '</div>';
        echo '<div>';
        echo '<button name="order-btn" type="submit">Order</button>';
        echo '</div>';
        echo '</div>'; 
        echo '</form>';
        }
}

function orderForm(){
    global $conn;
    if(isset($_POST['order-btn'])){
        if(isset($_SESSION['username'])){
        $id = $_GET['prodid'];
        $query = "SELECT * FROM products WHERE id = $id";
        $result = mysqli_query($conn,$query);
        $row = mysqli_fetch_assoc($result);

        if($result){
                echo '<div class="ordbackground" id="close-form" >';
                echo '<a href="#" onclick="closeForm()">X</a>';
                echo '<div class="form-prod">';
                echo '<div class="miniprod">';
                echo '<img src="'.$row['image'].'">';
                echo '<h1>' .$row['productname'].'</h1>';
                echo '<h3>' .$row['price']. '</h3>';
                echo '</div>';
                echo '<form method="post" action=productsManager.php?prodidorder='.$row['id'].'>';
                echo '<label for="fname">First Name</label>';
                echo '<input type="text" id="fname" name="firstname" placeholder="Your name.. "required>';
                echo '<label for="lname">Last Name</label>';
                echo '<input type="text" id="lname" name="lastname" placeholder="Your last name.."required>';
                echo '<label for="adress">Address</label>';
                echo '<input type="text" id="address" name="address" placeholder="Your Address.."required>';
                echo '<label for="adress">Street</label>';
                echo '<input type="text" id="street" name="street" placeholder="Street.."required>';
                echo '<label for="adress">ZIP code</label>';
                echo '<input type="number" id="zipcode" name="zipcode" placeholder="ZIP Code.."required>';
                echo '<label for="country">Country/City</label>';
                echo '<select id="country" name="country" required>';
                echo '<optgroup label="Kosovë">';
                echo '<option value="Gjilan">Gjilan</option>';
                echo '<option value="Prishtine">Prishtine</option>';
                echo '<option value="Ferizaj">Ferizaj</option>';
                echo '<option value="Gjakove">Gjakove</option>';
                echo '<option value="Peje">Peje</option>';
                echo '<option value="Prizren">Prizren</option>';
                echo '<option value="Mitrovice">Mitrovice</option>';
                echo '</optgroup>';
                echo '<optgroup label="Shqipëri">';
                echo '<option value="Tiranë">Tiranë</option>';
                echo '<option value="Durrës">Durrës</option>';
                echo '<option value="Shkodër">Shkodër</option>';
                echo '<option value="Lezhë">Lezhë</option>';
                echo '<option value="Vlorë">Vlorë</option>';
                echo '<option value="Sarandë">Sarandë</option>';
                echo '<option value="Korce">Korce</option>';
                echo '</optgroup>';
                echo '<optgroup label="Tjeter Shtet">';
                echo '<option value="else">Tjeter</option>';
                echo '</optgroup>';
                echo '</select>';
                echo '<button name="confirm-order" type="submit">Confirm Order</button>';
                echo '</form>';
                echo '</div>';
                echo '</div>';
                echo '
                    <script>
                    function closeForm() {
                    document.getElementById("close-form").style.display = "none";}
                    </script>';
                }
            }
            else{
                header('Location:../Login/login.php?msg=loginfirst');
            }
    }  
}

function orderedProducts(){
    global $conn;
    $id1=$_GET['prodidorder'];
    $sql = "SELECT * from products WHERE id =$id1";
    $result = mysqli_query($conn,$sql);
    while ($row = mysqli_fetch_assoc($result)){
            $price = $row['price'];
            $title = $row['productname'];
        }
        $name = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $address = $_POST['address'];
        $street = $_POST['street'];
        $zip = $_POST['zipcode'];
        $country = $_POST['country'];
        
        $sql2 = "INSERT INTO orders(title,price,name,lastname,address,street,zip,country) 
        VALUES ('$title','$price','$name','$lastname','$address','$street','$zip','$country')";
        mysqli_query($conn,$sql2);
        header('Location:products.php?msg=order-successful');
}


function returnProductsForAdmin(){

    global $conn;
    $sql = "SELECT * from products;";
    $result = mysqli_query($conn,$sql);

    while ($row = mysqli_fetch_assoc($result)){
            echo '<tr>';
            echo '<td class="id" name="row1">'.$row['id'].'</td>';
            echo '<td class="name">'.$row['productname'].'</td>';
            echo '<td class="price">'.$row['price'].'</td>';
            echo '<td><a href ="../Products/deleteProduct.php?id='.$row['id'].'">Delete</a></td>';
            echo '</tr>';
}
}

function returnOrdersForAdmin(){

    global $conn;
    $sql = "SELECT * from orders;";
    $result = mysqli_query($conn,$sql);

    while ($row = mysqli_fetch_assoc($result)){
            echo '<tr>';
            echo '<td class="id" name="row1">'.$row['id'].'</td>';
            echo '<td class="id">'.$row['title'].'</td>';
            echo '<td class="id">'.$row['name'].'</td>';
            echo '<td class="id">'.$row['lastname'].'</td>';
            echo '<td class="id">'.$row['address'].'</td>';
            echo '<td class="id">'.$row['street'].'</td>';
            echo '<td class="id">'.$row['zip'].'</td>';
            echo '<td class="id">'.$row['country'].'</td>';
            echo '<td class="id">'.$row['price'].'</td>';
            echo '<td class="id">'.$row['orderedat'].'</td>';
            echo '<td><a href ="../Products/deleteOrder.php?id='.$row['id'].'">Deliver</a></td>';
            echo '</tr>';
    }
}

    function addProducts(){
            $productname = $_POST['productname'];
            
            $img_name = $_FILES['my_image']['name'];
            $tmp_name = $_FILES['my_image']['tmp_name'];
            $img_upload_path = '../Products/Images/'.$img_name;
            move_uploaded_file($tmp_name, $img_upload_path);
            $price = $_POST['price'];
    
            global $conn;
    
            $sql = "INSERT INTO products(image,productname,price) VALUES ('$img_upload_path','$productname','$price')";
                    mysqli_query($conn, $sql);
                    header("Location:../Dashboard/dashboard.php");
        
    }

    function orderSuccessful(){
        
        echo '<div class="success" id="close-form" >';
        echo '<h1>ORDER HAS BEEN PLACED!</h1>';
        echo '<a href="#" onclick="closeForm()">X</a>';
        echo '</div>';
        echo '
            <script>
            function closeForm() {
            document.getElementById("close-form").style.display = "none";}
            </script>';
    }
}

if(isset($_POST['add']) && isset($_FILES['my_image'])){
    $addProduct = new productManager();
    $addProduct->addProducts();
}
if(isset($_POST['confirm-order'])){
    $test = new productManager();
    $test->orderedProducts();
}

?>