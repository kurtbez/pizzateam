<?php 
session_start();
include "connect.php";
print_r($_GET['prod_id']);

$cart_add_str ="INSERT INTO `cart`(`prod_id`, `user_id`) VALUES ('$_GET[prod_id]', '$_SESSION[user]')";
$cart_add_run = mysqli_query($conn, $cart_add_str);
header("Location: ../index.php");

