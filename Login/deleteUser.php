<?php
include_once '/Database.inc.php';
include_once './registerValidation.php';

    global $conn;
    if(isset($_GET['id'])){
        $id= $_GET['id'];
        $query = "DELETE FROM user WHERE id = $id";
        $result = mysqli_query($conn,$query);
        if($result){
            header('Location:../Dashboard/dashboard.php');
        }
        else {
            echo 'Error!';
        }
    }
?>