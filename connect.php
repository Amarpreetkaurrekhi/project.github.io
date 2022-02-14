<?php

$server="localhost";
$username="root";
$password="";
$database="test1";

$con=mysqli_connect($server, $username, $password, $database);
if(!$con){
    die("error");

}

$showAlert=false;
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
$fname=$_POST['f_name'];
$lname=$_POST['l_name'];
$userid=$_POST['user_number'];
$usermail=$_POST['user_email'];
$usermsg=$_POST['user_message'];


$sql="INSERT INTO `contact` (`f_name`, `l_name`, `user_number`, `user_email`, `user_message`) VALUES ('$fname', '$lname', '$userid', '$usermail', '$usermsg');";
$result=mysqli_query($con,$sql);
if($result){
    $showAlert=true;
}
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Help desk</title>
    <link href="help.css" rel="stylesheet">
    <script>
        function fun(){
            document.getElementById('msg').innerHTML="Thanku for submitting...we will revert you back as soon as possible.";
        }
       
        
       </script>
</head>
<body>
    <h3 class="contact">Contact Form</h3>
    <div class="container">
        <form  name="myform" action="connect.php" method="post">
              <label for="fname">First name:</label>
              <input type="text" id="fname" name="f_name"  placeholder="Enter your first name" required>
              <label for="lname">Last name</label>
              <input type="text" id="lname" name="l_name" placeholder="Enter your last name">
              <label for="number">Phone number</label>
              <input type="number" id="number" name="user_number"placeholder="Enter your number" required>
           
              <label for="mail">E-mail:</label>
              <input type="email" id="mail" name="user_email"placeholder="Enter your email" required>
          
              <label for="msg1">Concern</label>
              <textarea id="msg1" name="user_message" placeholder="Enter your concern here.." required></textarea>
              <button onclick="fun()">submit</button>
              <p id="msg"></p>
            </form>
            <?php 
            if($showAlert){
                echo "submitted";
            }
            ?>
    </div>
</body>
</html>