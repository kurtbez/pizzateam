<?php 
include "components/header.php";

?>

<body class="d-flex flex-column min-vh-100">
    

<div class="container">
    <h1>Ваш заказ:</h1>
    <form action="controllers/order.php" method="post">
    <table class="table">
        <thead>
            <tr>
                <th>Название товара</th>
                <th>Количество товара</th>
                <th>Цена</th>
            </tr>
        </thead>
        <tbody>
        <tr>
        <?php 
        $query = "SELECT * FROM `Products` INNER JOIN `cart` ON cart.prod_id=Products.Product_ID WHERE user_id=$_SESSION[user]";
        $order_out_run = $conn->query($query);

        while ($out_order=mysqli_fetch_array($order_out_run)) {
            $price = $out_order['prices'];
            ?> <?php
            $value = $_POST["value_$out_order[Product_ID]"];
            $itog_price = $value * $price;

        ?>
        <input type="hidden" name = "prod_id_<?=$out_order['Product_ID'];?>" value = "">
        <td ><?=$out_order['Product_name'];?></td>
        <td><?=$value;?></td>
        <td ><?=$itog_price;?></td>
        </tr>
        <?php 
        $final_price += $itog_price;
        }
        ?>
        </tbody>
    </table>
    <h3>Итоговая цена: <?php echo $final_price;?></h3> 
    <?php 


    ?>
    <h2>Ваш заказ успешно оформлен</h2>
        
    </form>
</div>
<?php 
 include "./components/footer.php"; ?>
</body>