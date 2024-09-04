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
          <label for="">RAW MATERIAL</label>
          <input type="text" name="raw_material" id="" required>
          <label for="">CURRENT STOCK (Tons)</label>
          <input type="number" name="current_stock" id="" placeholder="1 - 999" required>
          <label for="">RE-ORDER POINT (Tons)</label>
          <input type="number" name="reorder_point" id="" required placeholder="1 - 999">
          <label for="">SUPPLIER</label>
          <input type="text" name="supplier" id="" required>
          <label for="">LEAD TIME (Days)</label>
          <input type="number"  name="lead_time" id="" required placeholder="1 - 999">
          <label for="">SAFETY STOCK (Tons)</label>
          <input type="number"  name="safety_stock" id="" required placeholder="1 - 999">
        </div>
          <button name="submit" type="submit" class="btn-3" id="button-btn">SUBMIT</a>
          </button>
        </form>
       </div>

       

       <div class="tablestotable">
    <div class="table-containment">
        <?php
        // Define the number of results per page
        $results_per_page = 10; // Adjust as needed

        // Get the current page number from URL, default is page 1
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

        // Calculate the starting record for the current page
        $offset = ($page - 1) * $results_per_page;

        // Get search term from URL
        $search = '';
        if (isset($_GET['search'])) {
            $search = mysqli_real_escape_string($con, $_GET['search']);
        }

        // Construct the SQL query for total records
        $total_sql = "SELECT COUNT(*) FROM `inventory`";
        if (!empty($search)) {
            $total_sql .= " WHERE 
                            `raw_material` LIKE '%$search%' OR 
                            `current_stock` LIKE '%$search%' OR 
                            `reorder_point` LIKE '%$search%' OR 
                            `supplier` LIKE '%$search%' OR 
                            `lead_time` LIKE '%$search%' OR 
                            `safety_stock` LIKE '%$search%'";
        }
        $total_result = mysqli_query($con, $total_sql);
        $total_rows = mysqli_fetch_array($total_result)[0];
        
        // Calculate total pages
        $total_pages = ceil($total_rows / $results_per_page);

        // Construct the SQL query with LIMIT and OFFSET
        $sql = "SELECT * FROM `inventory`";
        if (!empty($search)) {
            $sql .= " WHERE 
                        `raw_material` LIKE '%$search%' OR 
                        `current_stock` LIKE '%$search%' OR 
                        `reorder_point` LIKE '%$search%' OR 
                        `supplier` LIKE '%$search%' OR 
                        `lead_time` LIKE '%$search%' OR 
                        `safety_stock` LIKE '%$search%'";
        }
        $sql .= " ORDER BY `raw_material` ASC LIMIT $offset, $results_per_page";

        // Execute the query
        $result = mysqli_query($con, $sql);
        ?>

        <h1>DETAILS ON THE PRODUCTION RATE OF OUR PRODUCTS</h1>
        <table>
            <tr>
                <th>#</th>
                <th>RAW MATERIAL</th>
                <th>CURRENT STOCK (Tons)</th>
                <th>RE-ORDER POINT (Tons)</th>
                <th>SUPPLIER</th>
                <th>LEAD TIME (Days)</th>
                <th>SAFETY STOCK (Tons)</th>
                <th>UPDATE</th>
                <th>DELETE</th>
                <th>DOWNLOAD</th>
            </tr>
            <?php 
            if (mysqli_num_rows($result) > 0) {
                $number = $offset; // Adjust the number based on offset
                while ($row = mysqli_fetch_assoc($result)) {
                    $number++;
            ?>
            <tr>
                <td><?php echo $number; ?></td>
                <td><?php echo htmlspecialchars($row['raw_material']); ?></td>
                <td><?php echo htmlspecialchars($row['current_stock']); ?></td>
                <td><?php echo htmlspecialchars($row['reorder_point']); ?></td>
                <td><?php echo htmlspecialchars($row['supplier']); ?></td>
                <td><?php echo htmlspecialchars($row['lead_time']); ?></td>
                <td><?php echo htmlspecialchars($row['safety_stock']); ?></td>
                <td>
                    <button class="update-btn">
                        <a href="update-inventory.php?id=<?php echo $row['id']; ?>">MODIFY</a>
                    </button>
                </td>
                <td>
                    <button class="delete-btn">
                        <a href="delete-inventory.php?id=<?php echo $row['id']; ?>">DELETE</a>
                    </button>
                </td>
                <td>
                    <button class="view-btn">
                        <a href="./pdf/inventory.php"><i class="fa-solid fa-circle-down"></i></a>
                    </button>
                </td>
            </tr>
            <?php 
                }
            } else {
                echo "<tr><td colspan='10'>No results found</td></tr>";
            }
            ?>
        </table>

        <!-- Pagination Links -->
        <div class="pagination">
            <?php if ($page > 1) { ?>
                <a href="?page=<?php echo $page - 1; ?>&search=<?php echo urlencode($search); ?>">&laquo; Previous</a>
            <?php } ?>
            
            <?php for ($i = 1; $i <= $total_pages; $i++) { ?>
                <a href="?page=<?php echo $i; ?>&search=<?php echo urlencode($search); ?>" 
                   class="<?php echo $i == $page ? 'active' : ''; ?>">
                   <?php echo $i; ?>
                </a>
            <?php } ?>
            
            <?php if ($page < $total_pages) { ?>
                <a href="?page=<?php echo $page + 1; ?>&search=<?php echo urlencode($search); ?>">Next &raquo;</a>
            <?php } ?>
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
  $raw_material=$_POST['raw_material'];
  $line_setup=$_POST['current_stock'];
  $qc_check=$_POST['reorder_point'];
  $Batchdate=$_POST['supplier'];
  $inventory_update=$_POST['lead_time'];
  $demand=$_POST['safety_stock'];
  $sql=mysqli_query($con,"INSERT INTO inventory VALUES('','$raw_material','$line_setup','$qc_check','$Batchdate','$inventory_update','$demand')");

  if($sql){
    echo "<script>alert('Documented Successfully')</script>";
  }
  else{
    echo "<script>alert('failed to document')</script>";
  }

}
?>