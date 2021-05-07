<?php
include_once '../Login/Database.inc.php';
include_once '../Products/productsManager.php';

    global $conn;
    if(isset($_GET['id'])){
        $id= $_GET['id'];
        $query = "DELETE FROM orders WHERE id = $id";
        $result = mysqli_query($conn,$query);
        if($result){
            header('Location:../Dashboard/dashboard.php');
        }
        else {
            echo 'Error!';
        }
    }
