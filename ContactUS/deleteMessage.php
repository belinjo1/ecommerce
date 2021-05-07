<?php 
include_once '../Login/Database.inc.php';
include_once './contactUsValidation.php';



        global $conn;
        if (isset($_GET['idMessage'])) {
            $id=$_GET['idMessage'];
            $query = "DELETE FROM messages WHERE ID = $id";
            $result = mysqli_query($conn,$query);

            if($result){
                header('Location:../Dashboard/dashboard.php');
            }
            else {
                echo 'Error!';
            }
            }

?>