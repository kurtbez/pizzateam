<?php 
include "components/header.php"; 
?> <body class="d-flex flex-column min-vh-100">
    <?php
$user_id = $_SESSION['user'];
$query= "SELECT * FROM users WHERE client_id = $user_id";

$res_1=mysqli_query($conn,$query);
$res=mysqli_fetch_array($res_1);

if($_SESSION['role'] !=2){
     ?>
        <div class="user_info">
            <h1>Имя</h1>
            <h2><?= $res['first_name']; ?></h2>
            <h1>Фамилия</h1>
            <h2><?= $res['last_name']; ?></h2>
            <h1>Почта</h1>
            <h2><?= $res['email']; ?></h2>
        </div>
     <?php
}
else {

    ?><div class="container"><form action="controllers/add.php" class="add" method="POST" enctype="multipart/form-data">
    <h1>Создание товара</h1>
    <input type="text" name="product_name" placeholder="Название продукта"class="form-control">
    <input type="text" name="price" placeholder="Цена продукта"class="form-control">
    <input type="file" name="image_product" placeholder="Картинка продукта"class="form-control">
    <textarea type="text" name="description" placeholder="Описание товара"class="form-control"> </textarea>
    <input type="text" name="value" placeholder="Грамовка товара"class="form-control">
    <select name="category" class="form-select" >
            <?php 
            $query="SELECT * FROM `Categories`";
            $run_out_prod=mysqli_query($conn, $query);
            while($category_option=mysqli_fetch_array($run_out_prod)){
                ?>
                <option value="<?=$category_option['Category_id']?>"><?=$category_option['Category_name']?></option>
           <?php }?>     


    </select>
    <input type="submit" class="btn btn-primary" name="send_prod">
</form>
<form action="controllers/add_cat.php" class="add" method="POST" enctype="multipart/form-data">
    <h1>Создание Категории</h1>
    <input type="text" name="category_name" placeholder="Название категории"class="form-control">
    <input type="submit" class="btn btn-primary" name="send_cat">
</form>
<table class="table">

<tr>
    <th>Название</th>
    <th>Фотография</th>
    <th>Описание</th>
    <th>Цена</th>
    <th>Грамовка</th>
    <th>Категория</th>
</tr>
<?php
$str_out_prod = "SELECT * FROM `Products` INNER JOIN `Categories` ON Products.Category_id=Categories.Category_id";
$run_out_prod = mysqli_query($conn, $str_out_prod);
while ($out_prod=mysqli_fetch_array($run_out_prod)) {	
    echo   "
    
    <tr>
        <td>$out_prod[Product_name]</td>
        <td><img src='assets/img/$out_prod[image_products]' alt='' class='img_table'></td>
        <td>$out_prod[Description]</td>
        <td>$out_prod[prices]</td>
        <td>$out_prod[value]</td>
        <td>$out_prod[Category_name]</td>
        <td><a href='#'>Изменить</a></td>
        <td><a href='controllers/del.php/?prod_id=$out_prod[Product_ID]'>Удалить</a></td>
    </tr>
    
    ";
}

?>
</table>
<table class="table">

<tr>
    <th>Название</th>
</tr>
<?php
$str_out_cat = "SELECT * FROM `Categories`";
$run_out_cat = mysqli_query($conn, $str_out_cat);
while ($out_cat=mysqli_fetch_array($run_out_cat)) {
    echo "
    <tr>
    <td>$out_cat[Category_name]</td>
    <td><a href='#'>Изменить</a></td>
    <td><a href='controllers/del.php/?cat_id=$out_cat[Category_id]'>Удалить</a></td>
    </tr>
    ";
}


    

?>
</div>
<?php 
 include "./components/footer.php"; ?>
</body>
<?php
}
echo $_SESSION['erorrs'];
echo $_SESSION['success'];
unset($_SESSION['success']);
unset($_SESSION['erorrs']);
?>