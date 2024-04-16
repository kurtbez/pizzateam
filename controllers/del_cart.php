<?php 
session_start();
include"connect.php";
$query = "DELETE FROM`cart` WHERE user_id = '$_SESSION[user]'";
$conn->query($query);
header("Location: ../cart.php")
?>