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
  <title>DASHBOARD</title>
</head>
<body>
  <style>
    #main-contents{
      height:fit-content;
      overflow-y:auto;
      padding-bottom:3rem;
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
          <a href="dashboard.php">
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
              <a href="production.php">PRODUCT PLANNING & SCHEDULING </a></li>
              <li>
              <a href="resources.php">RESOURCES & DEMAND</a></li>
          </ul>
      </div>
        <li>
          <a href="inventory.php">
            <i class="fa-solid fa-warehouse"></i>
            <span>INVENTORY</span>
          </a>
        </li>
        <li>
          <a href="quality-assurance.php">
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
              <a href="add-items.php">ADD ITEMS </a></li>
              <li>
              <a href="asset-management.php">ASSET MANAGEMENT</a></li>
              <li>
              <a href="notifications.php">NOTIFICATIONS</a></li>
          </ul>
      </div>
        <li>
          <a href="supply-chain.php">
          <i class="fa-solid fa-boxes-packing"></i>
            <span>SUPPLY CHAIN</span>
          </a>
        </li>
        <li>
          <a href="regulations.php">
          <i class="fa-solid fa-scale-balanced"></i>
            <span>REGULATORY COMPLIANCE</span>
          </a>
        </li>
        <li>
          <a href="profile.php">
          <i class="fa-solid fa-user"></i>
            <span>PROFILE</span>
          </a>
        </li>
    </ul>
  </div>


    <div class="main-content content-right" id="main-contents">
      <div class="header-wrapper">
        <div class="header-title">
          <h1>DASHBOARD</h1>
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
          <button name="submit" type="submit" class="btn-4" >
            <a href="registration.php">
            <i class="fa-solid fa-plus"></i>  
            </a>
          </button>
        </div> 
      </div>
    
      <?php
$sql_1 = mysqli_query($con, "SELECT count(*) AS total FROM `users`");
$number = mysqli_fetch_array($sql_1);
$numbers = $number['total'];

$sql_2 = mysqli_query($con, "SELECT sum(qc_check + inventory_update + demand) AS focal FROM `production`");
$number2 = mysqli_fetch_array($sql_2);
$numberss = $number2['focal'];

$sql_3 = mysqli_query($con, "SELECT sum(current_stock + reorder_point + lead_time + safety_stock) AS strt FROM `inventory`");
$div1 = mysqli_fetch_array($sql_3);
$numbersss = $div1['strt'];

$sql_4 = mysqli_query($con, "SELECT count(*) AS strt FROM `supply-chain`");
$div1 = mysqli_fetch_array($sql_4);
$numberssss = $div1['strt'];

$sql_5 = mysqli_query($con, "SELECT count(*) AS strt FROM `myresources`");
$div1 = mysqli_fetch_array($sql_5);
$DATE = $div1['strt'];

$sql_6 = mysqli_query($con, "SELECT count(*) AS strt FROM `assurance`");
$div11 = mysqli_fetch_array($sql_6);
$frequency = $div11['strt'];

$sql_7 = mysqli_query($con, "SELECT count(*) AS strt FROM `equipments`");
$div11 = mysqli_fetch_array($sql_7);
$tye = $div11['strt'];
?>
    <div class="comptia">
    <h1>OVERVIEW</h1>
    <div class="giy">
        <div class="gta5">
            <div class="majj">
                <h6>USERS</h6>
                <h6 class="numbers"><?php echo $numbers; ?></h6>
            </div>
            <div class="majjor">
                <i class="fa-solid fa-user-group"></i>
            </div>
        </div>

        <div class="gta5">
            <div class="majj">
                <h6>PRODUCTS</h6>
                <h6 class="numbers"><?php echo $numberss; ?></h6>
            </div>
            <div class="majjor">
              <i class="fa-solid fa-boxes-packing"></i>
            </div>
        </div>

        <div class="gta5">
            <div class="majj">
                <h6>INVENTORY</h6>
                <h6 class="numbers"><?php echo $numbersss; ?></h6>
            </div>
            <div class="majjor">
            <i class="fa-solid fa-warehouse"></i>
            </div>
        </div>


        <div class="gta5">
            <div class="majj">
                <h6>SUPPPLY-CHAIN</h6>
                <h6 class="numbers"><?php echo $numberssss; ?></h6>
            </div>
            <div class="majjor">
            <i class="fa-solid fa-chart-line"></i>
            </div>
        </div>
        
        <div class="gta5">
            <div class="majj">
                <h6>MANTAINED EQUIPMENTS</h6>
                <h6 class="numbers"><?php echo $DATE; ?></h6>
            </div>
            <div class="majjor">
            <i class="fa-solid fa-screwdriver-wrench"></i>
            </div>
        </div>

        <div class="gta5">
            <div class="majj">
                <h6>ASSURANCE DATA</h6>
                <h6 class="numbers"><?php echo $frequency; ?></h6>
            </div>
            <div class="majjor">
            <i class="fa-solid fa-hand-holding-medical"></i>
            </div>
        </div>
        
        <div class="gta5">
            <div class="majj">
                <h6>SUCCESSFUL UTILZED EQUIPMENTS</h6>
                <h6 class="numbers"><?php echo $tye; ?></h6>
            </div>
            <div class="majjor">
            <i class="fa-solid fa-check"></i>
            </div>
        </div>
        
    </div>
</div>

<style>
    .giy {
        display: flex;
        flex-direction: row;
        justify-content: center;
        width: 100%;
        padding: 3rem;
        gap: 1rem;
        flex-wrap: wrap; 
    }

    .gta5 {
        width: 20%; 
        height: 30vh;
        background: #fff;
        border-radius: 17px;
        border: 1px solid #000;
        box-sizing: border-box; 
    }
    .majj {
        padding: 1rem; 
        font-size: 2rem;
        display: flex;
        justify-content:space-between
    }

    .majjor {
        display: flex;
        justify-content: center;
    }

    .majjor i {
        font-size: 5.3rem; 
        margin:2rem 0rem 0rem 0rem;
        color: #00BDD6;
    }
    .comptia{
      text-align:center
    }
</style>
  <div class="tablestotable">
    <div class="table-containment">
    <?php
        $sql=mysqli_query($con,"SELECT * FROM `users`");
        $number=0;
        ?>
        <h1>AVAILABLE USERS OF THE USERS</h1>
        <table>
        <tr>
          <th>#</th>
          <th>NAME</th>
          <th>EMAIL</th>
          <th>PROFESSION</th>
          <th>DELETE</th>
        </tr>
        <?php 
        while($row=mysqli_fetch_array($sql)):
        ?>
        <tr>
          <td><?php echo ++$number ?></td>
          <td><?php echo $row['u_name']?></td>
          <td><?php echo $row['u_email']?></td>
          <td><?php echo $row['u_profession']?></td>
          <td>
            <button class="delete-btn"><a href="delete-user.php?id=<?php echo $row['id'];?>">DELETE</button>
          </td>
        </tr>
        <?php 
        endwhile
        ?>
      </table>
    </div>
    <style>
       .far-off {
            display: flex;
            justify-content: center; 
            padding: 2rem;
        }

        .one-time {
            margin: 5rem 0;
            width: 100%; 
            max-width: 160vh;
        }

        .one-time canvas {
            width: 100%; /* Responsive width */
            height: auto; /* Maintain aspect ratio */
            border: 1px solid #ddd; /* Optional: adds a border around the canvas */
        }
    </style>
    <div class="far-off">
      <div class="one-time">
        <canvas id="myChart"></canvas>
      </div>
    </div>
</div> 
<script>
  const ctx = document.getElementById('myChart').getContext('2d');

const myBarChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July','August'], 
        datasets: [{
            label: 'Sales',
            data: [12, 19, 3, 5, 2, 3, 7,9], 
            backgroundColor: 'rgba(75, 192, 192, 0.2)', 
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 1 
        }]
    },
    options: {
        scales: {
            x: {
                beginAtZero: true 
            },
            y: {
                beginAtZero: true 
            }
        },
        plugins: {
            legend: {
                display: true, // Display the legend
            },
            tooltip: {
                enabled: true // Enable tooltips
            }
        }
    }
});
</script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

<script src="./charts/devoid.js"></script>

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
