<?php
require './connection.php';
$id=$_GET['id'];
$sql=mysqli_query($con,"DELETE FROM `supply-chain` WHERE id = $id");
header("location:userdashboard.php");
?>