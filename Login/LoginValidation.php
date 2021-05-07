<?php
include 'Database.inc.php';
session_start();
class LoginValidation{
    
    function regexValidation(){

        $validolUsername ='/^(?=[a-zA-Z0-9._]{8,20}$)(?!.*[_.]{2})[^_.].*[^_.]$/';
        $validoPassword ='/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/';
        
        $lusername=$_POST['lusername']; 
        $lpassword=$_POST['lpassword'];

            if(preg_match($validolUsername,$lusername)&&
            preg_match($validoPassword,$lpassword)){
            return true;
}
            else{
            return false;
            } 
}
            function dataIsEmpty(){
            
            $lusername=$_POST['lusername']; 
            $lpassword=$_POST['lpassword'];

            if(empty($lusername) || empty($lpassword)){
            
            return true;
        }
        else{
            return false;
        }
            
        }   

    function validateUser(){

        if($this->regexValidation()==true && $this->dataIsEmpty()==false){
            
        $lusername = $_POST['lusername'];
        $lpassword = $_POST['lpassword'];
        global $conn;

        $sql = "SELECT * from user WHERE username = '$lusername' AND pwd = '$lpassword';";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($result);
            if($row > 0){
                if($row['role'] == 1){
                    $_SESSION['username'] = $lusername;
                    $_SESSION['role'] = 1;
                    header("Location:../index.php");
                    
                }
                elseif($row['role'] == 0){  
                    $_SESSION['username'] = $lusername;
                    $_SESSION['role'] = 0;
                    header("Location:../Products/products.php");
                    
                }
                
            }
            else {
                header("Location:../Login/login.php?msg=failed");
            }
        }
        else {
            header("Location:../Login/login.php?msg=failed");
        }
    }
}
    

if(isset($_POST['signin'])){

    $validoLoginin = new LoginValidation();
    $validoLoginin ->validateUser();
}

?>