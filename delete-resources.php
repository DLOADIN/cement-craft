<?php
require './connection.php';
$id=$_GET['id'];
$sql=mysqli_query($con,"DELETE FROM `resources` WHERE id = $id");
header("location:userdashboard.php");
?>