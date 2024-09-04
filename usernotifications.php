<?php
  require "connection.php";
  if(!empty($_SESSION["id"])){
  $id = $_SESSION["id"];
  $check = mysqli_query($con,"SELECT * FROM `users` WHERE id=$id ");
  $row = mysqli_fetch_array($check);
  }
  else{
  header('location:login.php');
  } 
?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./CSS/newfriend.css">
  <link rel="stylesheet" href="./CSS/dropdown.css">
  <link rel="stylesheet" href="./CSS/charts.css">
  <link rel="stylesheet" href="./CSS/tables.css">
  <link rel="shortcut icon" href="./image/images.jpeg" type="image/x-icon">
  <script src="https://kit.fontawesome.com/14ff3ea278.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="jsfile.js"></script>
  <script src="./extension_remover.js"></script>
  <script scr="./dropdown.js"></script>
  <title>NOTIFICATIONS</title>
</head>
<body>
  <style>
    #main-contents{
      height:200vh;
    }
    .caradan-products{
      text-decoration: none;
    }
    .ropdown{
      padding:1rem 0rem;
    }
    
  </style>
<div class="sidebar">
      <ul class="menu">
        <div class="logout">
        <li>
        <a href="userdashboard.php">
            <i class="fa-solid fa-house-chimney"></i>
            <span>DASHBOARD</span>
          </a>
        </li>
        <div class="ropdown">
          <div class="select">
          <i class="fa-brands fa-product-hunt"></i>
              <span class="selectee">PRODUCTION</span>
              <div class="caret"></div>
          </div>
          <ul class="fireef">
              <li>
              <a href="userproduction.php">PRODUCT PLANNING & SCHEDULING </a></li>
              <li>
              <a href="userresources.php">RESOURCES & DEMAND</a></li>
          </ul>
      </div>
        <li>
          <a href="userinventory.php">
            <i class="fa-solid fa-warehouse"></i>
            <span>INVENTORY</span>
          </a>
        </li>
        <li>
          <a href="userquality-assurance.php">
            <i class="fa-solid fa-medal"></i>
            <span>QA ASSURANCE</span>
          </a>
        </li>
        <div class="ropdown">
          <div class="select">
              <i class="fa-solid fa-wrench"></i>
              <span class="selectee">EQUIPMENT MANTENANCE</span>
              <div class="caret"></div>
          </div>
          <ul class="fireef">
              <li>
              <a href="useradd-items.php">ADD ITEMS </a></li>
              <li>
              <a href="userasset-management.php">ASSET MANAGEMENT</a></li>
              <li>
              <a href="usernotifications.php">NOTIFICATIONS</a></li>
          </ul>
      </div>
        <li>
          <a href="usersupply-chain.php">
          <i class="fa-solid fa-boxes-packing"></i>
            <span>SUPPLY CHAIN</span>
          </a>
        </li>
        <li>
          <a href="userregulations.php">
          <i class="fa-solid fa-scale-balanced"></i>
            <span>REGULATORY COMPLIANCE</span>
          </a>
        </li>
        <li>
          <a href="userprofile.php">
          <i class="fa-solid fa-user"></i>
            <span>PROFILE</span>
          </a>
        </li>
    </ul>
  </div>


    <div class="main-content content-right" id="main-contents">
      <div class="header-wrapper">
        <div class="header-title">
          <h1>NOTIFICATIONS</h1>
        </div>
        <div class="user-info">
        <div class="gango">
          <?php
            $sql=mysqli_query($con, "SELECT u_name from `users` WHERE id='$id'");
            $row=mysqli_fetch_array($sql);
            $attorney=$row['u_name'];
            ?>
          <h2 class="my-account-header">
          <?php echo $attorney?>
            </h2>
          <p>User</p></div> 
          <button name="submit" type="submit" class="btn-3" >
            <a href="logout.php">LOGOUT</a>
        </div> 
      </div>
    <div class="info-container">
      <div class="info-subcontainer">
        <div class="freeed">
          <?php
          $sql=mysqli_query($con,"SELECT * from `equipments`");
          while($rowed=mysqli_fetch_array($sql)):
          $stock=$rowed['equipment'];
          $stocked=$rowed['first_maintenance'];
          $stockedd=$rowed['last_maintenance'];
          $stockeddd=$rowed['status'];
          
        echo "<i class='fa-solid fa-triangle-exclamation'></i>";
        echo "<h3> The equipment $stock is out of stock; For it Had it's first maintenance on $stocked <br>
        and last maintenance on the $stockedd which is still now in $stockeddd</h3>";
        endwhile
        ?>
        </div>
      </div>
    </div>
</div> 
<style>
  .info-container{
    position:relative;
  }
  .info-subcontainer{
    display:grid;
    gap:1;
    place-items:center;
    color:black
  }
  .freeed{
    width:180vh;
    height:20vh;
    background: #caebf0;
    border-radius:15px;
    border:border-box;
    display:flex;
    padding:1.7rem;
    font-size:20px;
  }
  .freeed h3{
    text-align:center;
    margin-bottom:2rem
  }
  .freeed i{
    font-size:50px;
    margin-right:5px;
    margin-top:15px;
  }
</style>
  
 
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script src="./charts/linechart.js"></script>
<script src="./charts/app.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', () => {
      const dropdowns = document.querySelectorAll('.ropdown');

dropdowns.forEach(dropdown => {
  const select = dropdown.querySelector('.select');
  const caret = dropdown.querySelector('.caret');
  const menu = dropdown.querySelector('.fireef');
  const options = dropdown.querySelectorAll('.fireef li');
  const selected = dropdown.querySelector('.selectee');

select.addEventListener('click', () => {
select.classList.toggle('select-clicked');
caret.classList.toggle('caret-rotate');
menu.classList.toggle('menu-open');
});

options.forEach(option => {
option.addEventListener('click', () => {
selected.innerText = option.innerText;
select.classList.remove('select-clicked');
caret.classList.remove('caret-rotate');
menu.classList.remove('menu-open');
});
});
});
});

</script>
<?php
require "./charts/app.php";
?>
</body>
</html>
