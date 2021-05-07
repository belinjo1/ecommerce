<?php 
include_once '../Login/Database.inc.php';

class ContactFormValidation{

    function regexNameLastName(){
        $regex = '/^([a-zA-Z])*$/';
        $firstname=$_POST['firstname']; 
        $lastname=$_POST['lastname'];

        if(preg_match($regex,$firstname) && preg_match($regex,$lastname)){
            return true;
        }
        else
        {
            return false;
        }
    }
    function dataEmpty(){
            
        $lusername=$_POST['firstname']; 
        $lpassword=$_POST['lastname'];
        $subjecti =$_POST['subject'];

        if(empty($lusername) || empty($lpassword) || empty($subjecti)){
        
        return true;
    }
    else{
        return false;
    }    
    }
    function addMessage(){

        if($this->regexNameLastName()==true && $this->dataEmpty()==false){
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $country = $_POST['country'];
            $subjecti = $_POST['subject'];

            global $conn;
    
    
            $sql = "INSERT INTO messages(firstname,lastname,country,subjecti) VALUES ('$firstname','$lastname','$country','$subjecti')";
            mysqli_query($conn,$sql);
            header("Location: ./contactus.php?message=success");

        }
        else{
            header("Location:./contactus.php?message=error");
        }   
    }
    function returnMessages(){
        global $conn;
        $sql = "SELECT * from messages;";
        $result = mysqli_query($conn,$sql);
    
        while ($row = mysqli_fetch_assoc($result)){
            echo '<tr>';
            echo '<td class="id">'.$row['ID'].'</td>';
            echo '<td class="name">'.$row['firstname'].'</td>';
            echo '<td class="price">'.$row['lastname'].'</td>';
            echo '<td class="price">'.$row['country'].'</td>';
            echo '<td class="subjecti" style="width: 500px;">'.$row['subjecti'].'</td>';
            echo '<td><a href ="../ContactUS/deleteMessage.php?idMessage='.$row['ID'].'">Delete</a></td>';
            echo '</tr>';
        }
    }
}

if(isset($_POST['submitMessage'])){

    $valido= new ContactFormValidation();
    $valido->addMessage();
}


// $formvalidation = new ContactFormValidation();

// if(isset($_POST['submitMessage'])){

//     if($formvalidation->regexName_LastName() == true ){
//         $formvalidation->addMessage();
//     }
//     else{
//     header("Location:./contactus.php?message=error");
//     }
// }

?>