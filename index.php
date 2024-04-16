<?php include "components/header.php"; 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Главная страница</title>
</head>
<body class="d-flex flex-column min-vh-100">
    <div class="container">
        <div class="row">
            <div class="filtres">
                <a href="index.php">Все</a>
                <?php 
                $query = "SELECT * FROM `Categories`";
                $cat_res = mysqli_query($conn, $query);
                while($cat=mysqli_fetch_array($cat_res)) { 
                    echo "
                    <a href='?category_id=$cat[Category_id]'>$cat[Category_name]</a>
                ";
                }
                ?>

            </div>
            <?php 
            $category=$_GET['category_id'];
            if ($category) {
                $query_f="WHERE category_id=$category ";
            }
            $query="SELECT * FROM `Products` $query_f";
            $run_out_prod=mysqli_query($conn,$query);
            while($out_prod=mysqli_fetch_array($run_out_prod)) {

        
            ?>
            
            <div class="card col-lg-3 " id="<?=$out_prod['Product_ID']?>">
            <div class="title">
            <a href="#"><img src="assets/img/<?=$out_prod['image_products']?>" alt=""class="img_prod"></a>
                <h2 class="prod_name text-center"><?=$out_prod['Product_name']?></h2>
                </div>
                <div class="descr">
                <p  class="h5"><?=$out_prod['Description']?></p>
                </div>
                <div class="add_box">
                    <p class="h2"><?=$out_prod['prices']?> р.</p>
                    <?php 
                    $user_id =$_SESSION ['user'];
                    $prod = $out_prod['Product_ID'];
                    $query = "SELECT user_id, prod_id FROM cart WHERE user_id = $user_id AND prod_id = ?";
                    $stmt1 = mysqli_prepare($conn, $query);
                    mysqli_stmt_bind_param($stmt1, "s", $prod);
                    mysqli_stmt_execute($stmt1);
                    
                    mysqli_stmt_store_result($stmt1);
                    $num_rows = mysqli_stmt_num_rows($stmt1);
                    if ($num_rows > 0){
                           echo " Товар добавлен";
                    }
                    else {
                       echo " <a href='controllers/add_cart.php?prod_id=$out_prod[Product_ID]'>  <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-plus-circle-fill' viewBox='0 0 16 16'>
  <path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3z'/>";
                    }
                    ?>
                  
</svg>
</a>
                </div>
            </div>
            <?php 
            }
            ?>
        </div>
    </div>
    <?php include "components/footer.php"; ?>
</body>
</html>