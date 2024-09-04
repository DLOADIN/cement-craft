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
  <link rel="shortcut icon" href="./image/images.jpeg" type="image/x-icon">
  <script src="https://kit.fontawesome.com/14ff3ea278.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="jsfile.js"></script>
  <script src="./extension_remover.js"></script>
  <script scr="dropdown.js"></script>
  <title>PRODUCTION</title>
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
  </style>


    <div class="main-content content-right" id="main-contents">
      <div class="header-wrapper">
        <div class="header-title">
          <h1>PRODUCTION</h1>
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
            $sql=mysqli_query($con, "SELECT * from `production` WHERE id='$id'");
            while($row=mysqli_fetch_array($sql)){
            ?>
      <div class="catch">
        <h1>UPDATE PRODUCTION FORM </h1>
        <form  method="post" class="form-form">
          <div class="formation-1">
          <label for="">RAW MATERIAL</label>
          <input type="text" name="raw_material" id="" value="<?php echo $row['raw_material']?>" required>
          <label for="">PRODUCTION LINE SETUP</label>
          <input type="text" name="line_setup" id="" value="<?php echo $row['line_setup']?>" required>
          <label for="">QC CHECK</label>
          <input type="number" name="qc_check" id="" required maxlength="2" value="<?php echo $row['qc_check']?>">
          <label for="">BATCH PRODUCTION</label>
          <input type="text" name="Batchdate" id=""  readonly value="<?php echo $row['Batchdate']?>">
          <label for="">INVENTORY UPDATE</label>
          <input type="number"  name="inventory_update" id="" required maxlength="2" value="<?php echo $row['inventory_update']?>">
          <label for="">DEMAND FORECASTING UPDATE</label>
          <input type="number"  name="demand" id="" required maxlength="2" value="<?php echo $row['demand']?>">
          <?php }?>
        </div>
          <button name="submit" type="submit" class="btn-3" id="button-btn">SUBMIT</a>
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
  $line_setup=$_POST['line_setup'];
  $qc_check=$_POST['qc_check'];
  $Batchdate=$_POST['Batchdate'];
  $inventory_update=$_POST['inventory_update'];
  $demand=$_POST['demand'];
  $sql=mysqli_query($con,"UPDATE production SET raw_material='$raw_material', line_setup='$line_setup', qc_check='$qc_check',Batchdate='$Batchdate', inventory_update='$inventory_update', demand='$demand'");

  if($sql){
    echo "<script>alert('Documented Successfully')</script>";
  }
  else{
    echo "<script>alert('failed to document')</script>";
  }

}
?>