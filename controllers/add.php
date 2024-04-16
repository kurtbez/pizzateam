<?php
include "connect.php";


$product_name=$_POST['product_name'];
$price=$_POST['price'];
$description=$_POST['description'];
$value=$_POST['value'];
$image=$_FILES['image_product'];
$category=$_POST['category'];
$send_prod=$_POST['send_prod'];

$image_name=$_FILES['image_product']['name'];
$image_type=$_FILES['image_product']['type'];
$image_tmp_name=$_FILES['image_product']['tmp_name'];
$image_size=$_FILES['image_product']['size'];

$photo_name = rand(1000, 500000);
$photo_full_name = "$photo_name.png";
$full_path= "../assets/img/$photo_full_name";
print_r($full_path);

if ($send_prod) {
    if ($product_name && $price && $description && $value && $image && $category ) {
        if ($image_type=="image/png") {
            if ($image_size<'10485760') {
                $str_add_prod="INSERT INTO `Products`( `Product_name`, `Category_id`, `prices`, `image_products`, `Description`, `value`) VALUES ('$product_name','$category','$price','$photo_full_name','$description','$value')";
                
                $run_add_prod=mysqli_query($conn, $str_add_prod);

            if ($run_add_prod) {
                $_SESSION['success']="Продукт добавлен";
                move_uploaded_file($image_tmp_name, $full_path);
                header( "Location: ../lk.php");
            }
            }
            else {
                $_SESSION['errors']="Файл должен быть меньше 10 мб";
            }
    }
    else {
        $_SESSION['errors']="Файл должен быть формата png";
    }

    }
    
else {
    $_SESSION['errors']="Заполните все поля";
}

}
if (isset($_SESSION['errors'])){
    if ($_SESSION['errors']){
      header("Location: ../lk.php");
    }
} 







?>