<?php
include 'Database.inc.php';

class RegisterValidation{

    function regexValidation(){

        $validoUsername ='/^(?=[a-zA-Z0-9._]{8,20}$)(?!.*[_.]{2})[^_.].*[^_.]$/';
        $validoEmail = '/^([a-z0-9_\.-]+)@([\da-z\.-]+)(\.)([a-z\.]{2,6})$/';
        $validoPassword ='/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/';
        
        $username=$_POST['username']; 
        $email=$_POST['email']; 
        $pwd2=$_POST['pwd2'];
        
            if(preg_match($validoUsername,$username)&&
            preg_match($validoEmail,$email)&&
            preg_match($validoPassword,$pwd2)){
                return true;
            }
            else{

            return false;
            } 
}
    function dataIsEmpty(){
            
            $username=$_POST['username'];
            $email=$_POST['email']; 
            $pwd2=$_POST['pwd2'];
            $vpwd2=$_POST['vpwd2'];

        if(empty($username) || empty($email) || empty($pwd2) || empty($vpwd2)){
            return true;
            
            }
            return false;
    }   

    function exist(){

        $username=$_POST['username'];
        global $conn;

        $sql = "SELECT * from user WHERE username = '$username';";
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)> 0){
            return false;
            header("Location:login.php?msg=exist");
        }
        return true;
        
        }
    function userValidation(){

        $pwd2=$_POST['pwd2'];
        $vpwd2=$_POST['vpwd2'];
    
        
        if( $this->regexValidation() !=true || $this->dataIsEmpty() ==true || $pwd2!= $vpwd2 || $this->exist()==false){
            return false;
        }
        else{
            return true;
        }
}
    
    function addUser(){

        $username = $_POST['username'];
        $email = $_POST['email'];
        $pwd2 = $_POST['pwd2'];
        global $conn;


        $sql = "INSERT INTO user(username,pwd,email) VALUES ('$username','$pwd2','$email')";
        mysqli_query($conn,$sql);
        header("Location:login.php?msg=success");
    }

    function returnUsers(){
        global $conn;
        $sql = "SELECT * from user;";
        $result = mysqli_query($conn,$sql);
    
        while ($row = mysqli_fetch_assoc($result)){
            echo '<tr>';
            echo '<td class="id" name="row1">'.$row['id'].'</td>';
            echo '<td class="name">'.$row['username'].'</td>';
            echo '<td class="price">'.$row['pwd'].'</td>';
            echo '<td class="name">'.$row['email'].'</td>';
            echo '<td class="createdat">'.$row['createdat'].'</td>';
            echo '<td><a href ="../Login/deleteUser.php?id='.$row['id'].'">Delete</a></td>';
            echo '</tr>';
        }
    }
}
if(isset($_POST['signup'])){

    $registerValidimi = new RegisterValidation();
    $registerValidimi->userValidation();
    if($registerValidimi->userValidation() == true){
        $registerValidimi->addUser();
    }
    else {
        header("Location:login.php?msg=exist");
    }
}


?>

        
    
