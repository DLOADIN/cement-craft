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
  <title>RESOURCES</title>
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
    option{
              border-radius:20px
            }
            select{
              border-radius:15px;
              border-top: 1px solid black;
              height:8vh
            }
            input[name="asset_id"]{
              /* display:none; */
            }
  </style>


    <div class="main-content content-right" id="main-contents">
      <div class="header-wrapper">
        <div class="header-title">
          <h1>RESOURCES</h1>
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
      
      <div class="catch">
        <form  method="post" class="form-form">
        <?php
           $id=$_GET['id'];
           $sql=mysqli_query($con, "SELECT * from `myresources` WHERE id='$id'");
           while($row=mysqli_fetch_array($sql)){
            ?>
          <div class="formation-1">
          <label for="">RESOURCES</label>
          <input type="text" name="u_resources" id="" value="<?php echo $row['u_resources']?>" required>
          <label for="">DESCRIPTION</label>
          <input type="text" name="descriptions" id="" value="<?php echo $row['descriptions']?>" required>
          <label for="">QUANTITY</label>
          <input type="text" name="quantity" id="" required value="<?php echo $row['quantity']?>">
          <label for="">ALLOCATED TO</label>
          <input type="text" name="allocation" id="" value="<?php echo $row['allocation']?>" required>
          <label for="">STATUS</label>
          <input type="text" name="statuss" id="" value="<?php echo $row['statuss']?>" required>
        </div>
        <?php }?>
          <button name="submit" type="submit" class="btn-3" id="button-btn">SUBMIT</a>
          </button>
        </form>
       </div>

       
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
  $raw_material=$_POST['u_resources'];
  $line_setup=$_POST['descriptions'];
  $qc_check=$_POST['quantity'];
  $Batchdate=$_POST['allocation'];
  $inventory_update=$_POST['statuss'];
  $sql=mysqli_query($con,"UPDATE `myresources` SET u_resources='$raw_material', descriptions='$line_setup', quantity='$qc_check', allocation='$Batchdate', statuss='$inventory_update' ");

  if($sql){
    echo "<script>alert('Documented Successfully')</script>";
  }
  else{
    echo "<script>alert('failed to document')</script>";
  }

}
?>