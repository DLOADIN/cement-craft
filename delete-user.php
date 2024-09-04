<?php
require './connection.php';
$id = $_GET['id'];
$sql=mysqli_query($con, "DELETE FROM users WHERE id = $id");
header("location:dashboard.php");
?>