<?php include "./components/header.php"; 
?>
<body class="d-flex flex-column min-vh-100">
    
<div class='reg'>

    <form method="POST" action="controllers/registr.php" class="reg-form">
    <h1>Регистрация</h1>
        <label for="first-name">Имя:</label>
        <input  required type="text" name="first-name" id="first-name" class="form-control" placeholder="Введите имя">
        <label for="last-name">Фамилия:</label>
        <input  required type="text" name="last-name" id="last-name" class="form-control" placeholder="Введите фамилию" >
        <label for="email">Почта:</label>
        <input  required type="email" name="email" id="email " class="form-control" placeholder="Введите адрес электроной почты ">
        <label for="pass">Пароль:</label>
        <input  required type="password" name="pass" id="pass" class="form-control" placeholder="Введите пороль">
        <label for="repass">Повтор пароля:</label>
        <input  required type="password" name="repass" id="repass" class="form-control" placeholder="Повторите пороль">

        <input type="submit" value="Зарегестрироваться" class="btn-reg btn btn-primary" >
        <div class="errors">
            <?php echo $_SESSION['errors']['email'] ?? '';
            echo $_SESSION['errors']['pass'] ?? '';
            unset($_SESSION['errors']);
            ?>
        </div>
    </form>
</div>
<?php include "./components/footer.php"; 
    ?>
</body>