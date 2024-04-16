<?php 
include "components/header.php"; 
?>
<body class="d-flex flex-column min-vh-100">
    
<div class="container">
<?php 
        $query = "SELECT * FROM `Products` INNER JOIN `cart` ON cart.prod_id=Products.Product_ID WHERE user_id=$_SESSION[user]";
        $cart_out_run = $conn->query($query)->fetch_all(ASSERT_ACTIVE);
        if (empty($cart_out_run)) {
            echo "Корзина пустая";
        }
        else {

?>

    <h1>Корзина</h1>
    <form action="order.php" method="POST">
    <table class="table">
        <thead>
            <tr>
                <th>Название товара</th>
        <th class="col-lg-1">Количество</th>
        <th>Цена за один товар</th>
            </tr>

        </thead>
        <tbody>
            

           
        <?php 
        $query = "SELECT * FROM `Products` INNER JOIN `cart` ON cart.prod_id=Products.Product_ID WHERE user_id=$_SESSION[user]";
        $cart_out_run = $conn->query($query);
        while ($out_cart=mysqli_fetch_array($cart_out_run)) {
        
     ?><tr>
    <td><?=$out_cart['Product_name'];?></td>
    <td><input type="number" value="<?=$out_cart['value'];?>" class="col-lg-5" name="value_<?=$out_cart['Product_ID'];?>" id=""></td>
    <td><?=$out_cart['prices'];?></td>
    </tr>

       <?php }?>
       </tbody>
    </table>
    <div class="btn_cart">
        <a href="controllers/del_cart.php" class="btn btn-primary">Очистить корзину</a>
        <button type="submit" class="btn btn-primary">Оформить заказ</button>
    </div>
</form>
<?php 
    }
?>
</div>
<?php 
 include "./components/footer.php"; ?>
</body>

