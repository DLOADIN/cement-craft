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
          <div class="search__box">
            <form method="GET">
            <input type="text" placeholder="Search" name="search"/>
        </form>
        </div> 
        </div> 
      </div>
      
      <div class="catch">
        <form  method="post" class="form-form">
          <div class="formation-1">
          <label for="">RESOURCES</label>
          <input type="text" name="u_resources" id="" placeholder="RAW MATERIAL" required>
          <label for="">DESCRIPTION</label>
          <input type="text" name="descriptions" id="" placeholder="CHEMICAL COMPOSITION" required>
          <label for="">QUANTITY</label>
          <input type="text" name="quantity" id="" required placeholder="TONS">
          <label for="">ALLOCATED TO</label>
          <input type="text" name="allocation" id="" placeholder="LOCATION" required>
          <label for="">STATUS</label>
          <select name="statuss" id="">
            <option value="Allocated">Allocated</option>
            <option value="Scheduled">Scheduled</option>
            <option value="Consumed">Consumed</option>
            <option value="Operational">Operational</option>
          </select>
        </div>
          <button name="submit" type="submit" class="btn-3" id="button-btn">SUBMIT</a>
          </button>
        </form>
       </div>

       

       <div class="tablestotable">
    <div class="table-containment">
        <?php
        // Connexion à la base de données
        // Assurez-vous d'avoir une connexion $con

        // Nombre de résultats par page
        $results_per_page = 10;

        // Page actuelle
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $offset = ($page - 1) * $results_per_page;

        // Requête de recherche
        $search = '';
        if (isset($_GET['search'])) {
            $search = mysqli_real_escape_string($con, $_GET['search']);
        }

        // Requête SQL
        $sql = "SELECT * FROM `myresources`";
        if (!empty($search)) {
            $sql .= " WHERE 
                        `u_resources` LIKE '%$search%' OR 
                        `descriptions` LIKE '%$search%' OR 
                        `quantity` LIKE '%$search%' OR 
                        `allocation` LIKE '%$search%' OR 
                        `statuss` LIKE '%$search%'";
        }
        $sql .= " ORDER BY `u_resources` ASC LIMIT $offset, $results_per_page";
        $result = mysqli_query($con, $sql);

        // Calculer le nombre total de résultats
        $total_sql = "SELECT COUNT(*) FROM `myresources`";
        if (!empty($search)) {
            $total_sql .= " WHERE 
                            `u_resources` LIKE '%$search%' OR 
                            `descriptions` LIKE '%$search%' OR 
                            `quantity` LIKE '%$search%' OR 
                            `allocation` LIKE '%$search%' OR 
                            `statuss` LIKE '%$search%'";
        }
        $total_result = mysqli_query($con, $total_sql);
        $total_rows = mysqli_fetch_array($total_result)[0];
        $total_pages = ceil($total_rows / $results_per_page);
        ?>

        <h1>DETAILS ON THE PRODUCTION RATE OF OUR PRODUCTS</h1>
        <table>
            <tr>
                <th>#</th>
                <th>RESOURCES</th>
                <th>DESCRIPTION</th>
                <th>QUANTITY</th>
                <th>ALLOCATED TO</th>
                <th>STATUS</th>
                <th>DOWNLOAD</th>
            </tr>
            <?php 
            if (mysqli_num_rows($result) > 0) {
                $number = $offset; // Commencer le comptage à l'offset
                while ($row = mysqli_fetch_assoc($result)) {
                    $number++;
            ?>
            <tr>
                <td><?php echo $number; ?></td>
                <td><?php echo htmlspecialchars($row['u_resources']); ?></td>
                <td><?php echo htmlspecialchars($row['descriptions']); ?></td>
                <td><?php echo htmlspecialchars($row['quantity']); ?></td>
                <td><?php echo htmlspecialchars($row['allocation']); ?></td>
                <td><?php echo htmlspecialchars($row['statuss']); ?></td>
                <td>
                    <button class="view-btn">
                        <a href="./pdf/resources.php"><i class="fa-solid fa-circle-down"></i></a>
                    </button>
                </td>
            </tr>
            <?php 
                }
            } else {
                echo "<tr><td colspan='7'>No results found</td></tr>";
            }
            ?>
        </table>

        <div class="pagination">
            <?php
            if ($page > 1) {
                echo '<a href="?page=' . ($page - 1) . '&search=' . htmlspecialchars($search) . '">&laquo; Previous</a>';
            }
            for ($i = 1; $i <= $total_pages; $i++) {
                if ($i == $page) {
                    echo '<span class="current-page">' . $i . '</span>';
                } else {
                    echo '<a href="?page=' . $i . '&search=' . htmlspecialchars($search) . '">' . $i . '</a>';
                }
            }
            if ($page < $total_pages) {
                echo '<a href="?page=' . ($page + 1) . '&search=' . htmlspecialchars($search) . '">Next &raquo;</a>';
            }
            ?>
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
  $sql=mysqli_query($con,"INSERT INTO `myresources` VALUES('','$raw_material','$line_setup','$qc_check','$Batchdate','$inventory_update')");

  if($sql){
    echo "<script>alert('Documented Successfully')</script>";
  }
  else{
    echo "<script>alert('failed to document')</script>";
  }

}
?>