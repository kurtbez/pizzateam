<?php 
include "connect.php";
$prod_id = $_GET['prod_id'];
$str_out_prod = "SELECT * FROM `Products` WHERE Product_ID=$prod_id";
$run_out_prod = mysqli_query($conn, $str_out_prod);
$out_prod = mysqli_fetch_array($run_out_prod);
$del_file = $out_prod['image_products'];


$str_del_prod = "DELETE FROM `Products` WHERE Product_ID=$prod_id";

if ($prod_id) {
    $run_del_prod = mysqli_query($conn, $str_del_prod);
}

if ($run_del_prod) {
    unlink("../assets/img/$del_file");
    $_SESSION['success'] = "Продукт удален";
    header( "Location: /../main/lk.php");
}
$cat_id = $_GET['cat_id'];
$str_del_cat = "DELETE FROM `Categories` WHERE Category_id=$cat_id";
if ($cat_id){
    $run_del_cat = mysqli_query($conn, $str_del_cat);
    header( "Location: /../main/lk.php");
}