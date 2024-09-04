<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./CSS/loginregistration.css">
  <link rel="shortcut icon" href="./image/images.jpeg" type="image/x-icon">
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script src="./extension_remover.js"></script>
  <script src="jsfile.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
  <title>REGISTER PAGE</title>
</head>
<style>
  .btn{
    color:#00BDD6;
    border:3px solid #00BDD6;
  }
  .btn a{
    color:#00BDD6;
  }
</style>
<body>
  <div class="grided">
    <div class="grid-1">
      <!-- <div class="text">
      <h1>Welcome</h1>
        <H2>TO CEMENT MANUFACTURING<br>
        PROCESS SYSTEM</H2>
      </div> -->
      <!-- <button class="btn">
        <a href="login.php">SIGN IN</a>
        </button> -->
    </div>
    <div class="grid-2">
      <div class="text-1">
      <img src="./image/images.jpeg" alt="">
        <h1>Create An Account</h1>
        <form action="" method="post">
          
          <div class="inputbox">
          <ion-icon name="people-outline"></ion-icon>
          <input type="text" name="u_name" required>
          <label for="">USER NAME</label></div>

          <div class="inputbox">
            <ion-icon name="mail-outline"></ion-icon>
          <input type="email" name="u_email" required>
          <label for="">E-MAIL</label></div>

          <div class="inputbox">
          <ion-icon name="lock-closed-outline"></ion-icon>
          <input type="text" name="u_password" required>
          <label for="">PASSWORD</label></div>
          
          <div class="inputbox">
          <ion-icon name="briefcase-outline"></ion-icon>
          <input type="text" name="u_profession" required>
          <label for="">TYPE</label></div>

          <button name="submit" type="submit" class="btn-2">SIGN UP</button>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
<?php
  require 'connection.php';
  
  if(isset($_POST['submit'])){
    $name = $_POST['u_name'];
    $email = $_POST['u_email'];
    $password = $_POST['u_password'];
    $type = $_POST['u_profession'];
    $sql=mysqli_query($con,"INSERT INTO `users` VALUES('','$name','$email','$password','$type')");
    
    if($sql){
      echo "<script>alert('Registered Successfully| Please Head to the Login ')</script>";
    }
    else{
      echo "<script>alert('failed to register')</script>";
    }
  }
?>
