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
  <link rel="stylesheet" href="./CSS/another-one.css">
  <link rel="stylesheet" href="./CSS/tables.css">
  <link rel="stylesheet" href="./CSS/charts.css">
  <link rel="shortcut icon" href="./image/images.jpeg" type="image/x-icon">
  <script src="https://kit.fontawesome.com/14ff3ea278.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="jsfile.js"></script>
  <script src="./extension_remover.js"></script>
  <script scr="dropdown.js"></script>
  <title>INVENTORY</title>
</head>
<body>
  <style>
    #main-contents{
      height:200vh;
    }
    .caradan-products{
      text-decoration: none;
    }
    #clear{
      margin-right:3rem;
    }
    .catch h1{
      text-align:center
    }
    .logout i{
      color:black;
    }
  </style>


    <div class="main-content content-right" id="main-contents">
      <div class="header-wrapper">
        <div class="header-title">
          <h1>INVENTORY</h1>
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
          </button>
        </div> 
      </div>
      <?php
            $id=$_GET['id'];
            $sql=mysqli_query($con, "SELECT * from `inventory` WHERE id='$id'");
            while($row=mysqli_fetch_array($sql)):
            ?>
      <div class="catch">
        <h1>MODIFY THE INVENTORY FORM</h1>
        <form  method="post" class="form-form">
          <div class="formation-1">
          <label for="">RAW MATERIAL</label>
          <input type="text" name="raw_material" id="" required value="<?php echo $row['raw_material']?>">
          <label for="">CURRENT STOCK (Tons)</label>
          <input type="number" name="current_stock" id="" placeholder="1 - 999" required value="<?php echo $row['current_stock']?>">
          <label for="">RE-ORDER POINT (Tons)</label>
          <input type="number" name="reorder_point" id="" required placeholder="1 - 999" value="<?php echo $row['reorder_point']?>">
          <label for="">SUPPLIER</label>
          <input type="text" name="supplier" id="" required value="<?php echo $row['supplier']?>">
          <label for="">LEAD TIME (Days)</label>
          <input type="number"  name="lead_time" id="" required placeholder="1 - 999" value="<?php echo $row['lead_time']?>">
          <label for="">SAFETY STOCK (Tons)</label>
          <input type="number"  name="safety_stock" id="" required placeholder="1 - 999" value="<?php echo $row['safety_stock']?>">
          <?php 
          endwhile 
          ?>
        </div>
          <button name="submit" type="submit" class="btn-3" id="button-btn">MODIFY</a>
          </button>
        </form>
       </div>
</div> 

  
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
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</script>
</body>
</html>
<?php
if(isset($_POST['submit'])){
  $raw_material=$_POST['raw_material'];
  $line_setup=$_POST['current_stock'];
  $qc_check=$_POST['reorder_point'];
  $Batchdate=$_POST['supplier'];
  $inventory_update=$_POST['lead_time'];
  $demand=$_POST['safety_stock'];
  $sql=mysqli_query($con,"UPDATE inventory SET raw_material='$raw_material', current_stock='$line_setup',reorder_point='$qc_check', supplier='$Batchdate',lead_time='$inventory_update', safety_stock='$demand' ");

  if($sql){
    echo "<script>alert('Documented Successfully')</script>";
  }
  else{
    echo "<script>alert('failed to document')</script>";
  }

}
?>