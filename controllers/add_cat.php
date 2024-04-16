<?php include "connect.php";
$category_name=$_POST['category_name'];

$str_add_cat = "INSERT INTO `Categories` (`Category_name`) VALUES ('$category_name')";
$run_add_cat = mysqli_query($conn, $str_add_cat);
header("Location: ../lk.php");







?>