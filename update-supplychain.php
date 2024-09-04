<?php
  require "connection.php";
  if (!empty($_SESSION["id"])) {
    $id = $_SESSION["id"];
    $check = mysqli_query($con, "SELECT * FROM `users` WHERE id='$id'");
    $row = mysqli_fetch_array($check);
  } else {
    header('location:login.php');
  }
?>
<!DOCTYPE html>
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
  <script src="dropdown.js"></script>
  <script src="./extension_remover.js"></script>
  <title>SUPPLY CHAIN</title>
</head>
<body>
  <style>
    #main-contents {
      height: 200vh;
    }
    .caradan-products {
      text-decoration: none;
    }
    #clear {
      margin-right: 3rem;
    }
    .catch h1 {
      text-align: center;
    }
    .logout i {
      color: black;
    }
    option {
      border-radius: 20px;
    }
    select {
      border-radius: 15px;
      border-top: 1px solid black;
    }
  </style>
  <!-- Commented out sidebar code if it's not used -->
  <!-- <div class="sidebar"> ... </div> -->

  <div class="main-content content-right" id="main-contents">
    <div class="header-wrapper">
      <div class="header-title">
        <h1>SUPPLY CHAIN</h1>
      </div>
      <div class="user-info">
        <div class="gango">
          <?php
            $sql = mysqli_query($con, "SELECT u_name FROM `users` WHERE id='$id'");
            $row = mysqli_fetch_array($sql);
            $attorney = $row['u_name'];
          ?>
          <h2 class="my-account-header">
            <?php echo htmlspecialchars($attorney); ?>
          </h2>
          <p>User</p>
        </div> 
        <button name="submit" type="submit" class="btn-3">
          <a href="logout.php">LOGOUT</a>
        </button>
      </div> 
    </div>
    <?php
      if (isset($_GET['id'])) {
        $item_id = intval($_GET['id']);
        $sql = mysqli_query($con, "SELECT * FROM `supply-chain` WHERE id='$item_id'");
        while ($row = mysqli_fetch_array($sql)) {
    ?>
    <div class="catch">
      <form method="post" class="form-form">
        <div class="formation-1">
          <label for="">PRODUCTS</label>
          <input type="text" name="u_productname" required value="<?php echo $row['u_productname']; ?>">
          <label for="">QUANTITY (TONS)</label>
          <input type="text" name="u_quantity" required value="<?php echo $row['u_quantity']; ?>">
          <label for="">AMOUNT</label>
          <input type="text" name="u_amount" required value="<?php echo $row['u_amount']; ?>">
          <label for="">SUPPLIER</label>
          <input type="text" name="u_supplier" required value="<?php echo $row['u_supplier'] ?>">
          <label for="">DISTRIBUTOR</label>
          <input type="text" name="u_distributor" required value="<?php echo $row['u_distributor']; ?>">
          <label for="">FIRST MAINTENANCE DATE</label>
          <input type="date" name="date" required value="<?php echo $row['date']; ?>">
          <label for="">STATUS</label>
          <select name="status" <?php echo $row['status']?> required>
            <option value="N/A"></option>
            <option value="in-transit">In-transit</option>
            <option value="Delivered">Delivered</option>
            <option value="Pending" >Pending</option>
          </select>
          <label for="">COLLABORATION TOOLS</label>
          <input type="text" name="u_tools" required value="<?php echo $row['u_tools']; ?>">
        </div>
        <button name="submit" type="submit" class="btn-3" id="button-btn">SUBMIT</button>
      </form>
    </div>
    <?php
        }
      }
    ?>

    <div class="tablestotable">
      <div class="table-containment">
        <?php
          $sql = mysqli_query($con, "SELECT * FROM `supply-chain`");
          $number = 0;
        ?>
        <h1>DETAILS ON THE PRODUCTION RATE OF OUR PRODUCTS</h1>
        <table>
          <tr>
            <th>#</th>
            <th>PRODUCT NAME</th>
            <th>QUANTITY</th>
            <th>AMOUNT</th>
            <th>SUPPLIER</th>
            <th>DISTRIBUTOR</th>
            <th>DATE</th>
            <th>STATUS</th>
            <th>COLLABORATION TOOLS</th>
          </tr>
          <?php 
            while ($row = mysqli_fetch_array($sql)) {
          ?>
          <tr>
            <td><?php echo ++$number; ?></td>
            <td><?php echo htmlspecialchars($row['u_productname']); ?></td>
            <td><?php echo htmlspecialchars($row['u_quantity']); ?></td>
            <td><?php echo htmlspecialchars($row['u_amount']); ?></td>
            <td><?php echo htmlspecialchars($row['u_supplier']); ?></td>
            <td><?php echo htmlspecialchars($row['u_distributor']); ?></td>
            <td><?php echo htmlspecialchars($row['date']); ?></td>
            <td><?php echo htmlspecialchars($row['status']); ?></td>
            <td><?php echo htmlspecialchars($row['u_tools']); ?></td>
          </tr>
          <?php 
            }
          ?>
        </table>
      </div>
    </div> 
  </div> 
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>

<?php
if (isset($_POST['submit'])) {
  $raw_material = $_POST['u_productname'];
  $line_setup = $_POST['u_quantity'];
  $qc_check =  $_POST['u_amount'];
  $Batchdate =$_POST['u_supplier'];
  $u_distributor = $_POST['u_distributor'];
  $date = $_POST['date'];
  $demand =  $_POST['status'];
  $u_tools =  $_POST['u_tools'];

  $sql = mysqli_query($con, "UPDATE `supply-chain` SET u_productname='$raw_material', u_quantity='$line_setup', u_amount='$qc_check', u_supplier='$Batchdate', u_distributor='$u_distributor', date='$date', status='$demand', u_tools='$u_tools' ");

  if ($sql) {
    echo "<script>alert('Documented Successfully')</script>";
  } else {
    echo "<script>alert('Failed to document')</script>";
  }
}
?>
