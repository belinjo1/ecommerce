<?php
include_once 'Database.inc.php';
session_start()
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Log In</title>
  <link rel="stylesheet" href="../reset.css">
  <link rel="stylesheet" href="styles.css">
</head>
<body>

  <div class="container">

  <div class="logoja"><a href="../index.php"><img src="../logojawhite.png" width="100px"></a></div>


  <!--------------------------------------------Sign in-------------------------------------------------------------->
  
  <div class="form signin active" id="signin">
    <h1>Sign In</h1>
    <h5 id="failed">
      <?php
          if (isset($_GET["msg"]) && $_GET["msg"] == 'failed') {
            echo "<i style=color:white>Wrong email or password!</i>";
          }
          elseif(isset($_GET["msg"]) && $_GET["msg"] =='exist') {
            echo "<i style=color:white>Invalid data or username is taken!</i>";
          }
          elseif(isset($_GET["msg"]) && $_GET["msg"] =='loginfirst'){
            echo "<i style=color:red>Login to order!</i>";
          }
          elseif(isset($_GET["msg"]) && $_GET["msg"] =='success') {
            echo "<i style=color:green>Registered successfully. Try to log in!</i>";
          }?>
        </h5> 
    <form action="LoginValidation.php" method="POST"  >
    <input type="text" name ="lusername" class="input-box" id="lusername" placeholder="Username" >
    <input type="password" name="lpassword" class="input-box" placeholder="Password" > 
    <p><span><input type="checkbox" ></span>Save password?</p>
    <input type="hidden" name="form_submitted" value="1"/>
    <button type="submit" id="button0"  formmethod="post" name="signin" class="signin-btn" >Sign In</button>

    <hr>
    <p class="or">Don't have an account?<a id="signup" href="#" onclick="changeForm(1)"> Sign Up</a></p>

    </form>
      
  </div>



  <!-----------------------------------------------------Sign Up----------------------------------------------------->

  <div class="form signup hidden" id="signnup">
    <h1>Sign Up Now!</h1>
    <form action="registerValidation.php" method ="POST">
      <input type="text" class="input-box" name = "username" placeholder="Username">
      <input type="email" class="input-box" id="email" name ="email" placeholder="Email">
      <input type="password" id="pass" class="input-box" name ="pwd2" placeholder="Password">
      <input type="password" id="pass" class="input-box" name ="vpwd2" placeholder="Verify password">
        <fieldset class="genderi" data-role="controlgroup">
          <legend>Choose your gender:</legend>
            <label for="male">Male</label>
            <input type="radio" name="gender" id="male" class="radio" value="male" required checked>
            <label for="female">Female</label>
            <input type="radio" name="gender" id="female" class="radio" value="female" required>
        </fieldset>
  
    <p><span><input type="checkbox" id="checkbox" required></span>I agree the Terms of Service?</p>
    <button type="submit" id="button1" name = "signup" class="signin-btn">Sign Up</button>
  
    
    <hr>
    <p class="or">Already have an account?<a id="signup" href="#" onclick="changeForm(0)"> Sign in</a></p>

    </form>
  </div>
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

<script>
  
   //--------------------------------CHANGIG SIGN IN/SIGN UP FORMS-----------------------//

let changeForm = (number) => {

let listaKlasave=document.getElementsByClassName('form');

// ------------------------- 2 forma te ndryshimit te formave prej sign in ne sign up dhe anasjelltas ------------\\


// Forma 1
// if(number==1){
//     listaKlasave[1].classList.toggle('hidden');
//     listaKlasave[1].classList.add('active');
//     listaKlasave[0].classList.remove('active')
//     listaKlasave[0].classList.add('hidden');
  
// }
// else if(number == 0){
//     listaKlasave[1].classList.remove('active');
//     listaKlasave[1].classList.add('hidden');
//     listaKlasave[0].classList.add('active')
//     listaKlasave[0].classList.remove('hidden');
// }


//  forma 2
    listaKlasave[1].classList.toggle('hidden');
    listaKlasave[1].classList.toggle('active');
    listaKlasave[0].classList.toggle('active');
    listaKlasave[0].classList.toggle('hidden');


};

//--------------------REGEX EMAIL VALIDATION FUNCTION USED BOTH IN SIGN IN AND SIGN UP SECTION ---------------//

// let ValidateEmail = (inputText) =>
// {
// let mailformat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
// if(inputText.match(mailformat) && (inputText.endsWith(".com") || inputText.endsWith(".net") || inputText.endsWith(".org"))) {return true;}
// else {return false;}
// };


// var inplist = document.getElementsByClassName('input-box');


//-------------------------SIGN IN FORM VALIDATION -----------------------\\

// document.getElementById('button0').addEventListener('click',validate = _ => {
//   let mail = document.getElementById("emaili//ndrroje bone lusername").value;

//   if(inplist[0].value== "" || inplist[1].value== "")
//   {
//       alert("Ju lutem plotesoni te gjitha fushat");
//   }
//   else if(ValidateEmail(mail) == false)
//   {
//        alert("Ju lutem jepni nje email valid!"); 
//   }
//   else if(inplist[1].value.length<6) 
//   {
//   alert("Passwordi duhet te kete meshume se 6 karaktere!");
//   }
//   else{
//       alert("Jeni Kyqur Me Sukses!");
//   }

// });


//---------------------------SIGN UP FORM VALIDATION------------------------\\

// document.getElementById('button1').addEventListener('click',validate = () => {
// let count = 0;
// let mail = document.getElementById('email2').value;


// for(var i = 2; i<inplist.length; i++){
//     if(inplist[i].value == "")
//     count++;
// }

// if(count >=1)
// {
//     alert("Ploteso te gjitha te dhenat!");
// }
// else if(ValidateEmail(mail) == false){
//     alert("Ju lutem jepni nje email valid!");
// }
// else if(document.getElementById('checkbox').checked == false)
// {
//     alert("You must agree our terms to continue!");
// }
// else if(document.getElementById('pass').value < 6)
// {
//     getElementById('passwordii').classList.remove('hidden');
// }

// });
// </script>
  
</body>
</html>