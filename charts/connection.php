<?php
session_start();
$con=mysqli_connect('localhost','root','','cementcraft');

if(!$con){
  die(mysqli_error($con));
}
?>
