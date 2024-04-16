<?php
include ("components/header.php");
?>
<body class="d-flex flex-column min-vh-100">
    
<div class="auth">
    <form action='controllers/auth.php' method='POST' class="auth-form">
        <h1>Авторизация</h1>
        <input type='email' name='email' id='email' placeholder='Email'class="form-control" required>
        <input type='password' name='password' id='password' placeholder='Пароль'class="form-control" required>
        <input type='submit' name='btn' class="btn-reg btn btn-primary" value="Войти">
        <div class="errors">
            <?php 
            echo $_SESSION['error_message'];
            unset($_SESSION['error_message']);
            ?>
        </div>
    </form>
</div>
<?php 
 include "./components/footer.php"; ?>
</body>