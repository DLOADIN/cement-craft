<?php
  require 'connection.php';
  
  if(isset($_POST['submit'])){
    $name = $_POST['u_name'];
    $password = $_POST['u_password'];
    $sql=mysqli_query($con,"SELECT * FROM `users` WHERE u_name = '$name' AND u_password = '$password' ");
    $query=mysqli_fetch_array($sql);
    
   if(mysqli_num_rows($sql) > 0){
  if($password===$query["u_password"]) { // Add curly braces here
    $_SESSION["login"] = true;
    $_SESSION["id"] = $query["id"];
    if($name == 'admin' && $password == 'admin'){
      header('location:dashboard.php');
    }
    else{
      header('location:userdashboard.php');
    }
  }
  
    else{
      echo "<script>alert('WRONG USERNAME OR PASSWORD')</script>";
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./CSS/loginregistration.css">
  <link rel="shortcut icon" href="./image/images.jpeg" type="image/x-icon">
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script src="./jsfile.js"></script>
  <script src="./extension_remover.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
  <title>LOGIN PAGE</title>
</head>
<body>
  <div id="grided">
    <div class="grid-2">
      <div class="text-1">
      <img src="./image/images.jpeg" alt="">
        <h1>LOGIN</h1>
        <form action="" method="post">
          
          <div class="inputbox">
          <ion-icon name="people-outline"></ion-icon>
          <input type="text" name="u_name" required>
          <label for="">USER NAME</label></div>

          <div class="inputbox">
          <ion-icon name="lock-closed-outline"></ion-icon>
          <input type="text" name="u_password" required>
          <label for="">PASSWORD</label></div>

          <button name="submit" type="submit" class="btn-2">SIGN IN</button>
        </form>
        </form>
      </div>
    </div>
  </div>
</body>
</html>