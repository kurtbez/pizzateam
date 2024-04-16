<?php 
include "connect.php";
session_start();

$first_name = $_POST['first-name'] ?? '';
$last_name = $_POST['last-name'] ?? '';
$email = $_POST['email'] ?? '';
$pass = $_POST['pass'] ?? '';
$repass = $_POST['repass'] ?? '';

if (strlen($pass) <= 6){
    $_SESSION['errors']['pass'] = "Слишком слабый пароль.";  
}
else{
    if ($pass != $repass){
        $_SESSION['errors']['pass'] = "Пароли не совпадают";
    }
}

$query = "SELECT email FROM users WHERE email = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "s", $email);
mysqli_stmt_execute($stmt);

mysqli_stmt_store_result($stmt);
$num_rows = mysqli_stmt_num_rows($stmt);
if ($num_rows > 0){
    $_SESSION['errors']['email'] = "Пользователь с такой почтой уже существует.";

}

if (isset($_SESSION['errors'])){
    if ($_SESSION['errors']){
      header("Location: ../reg.php");
      exit;
    }
}
$_SESSION['success'] = "Пользователь зарегистрирован";

$password = password_hash($pass, PASSWORD_DEFAULT );

$russia = "INSERT INTO users(first_name, last_name, email, `password` ) VALUES(?,?,?,?)";
$stmt = mysqli_prepare($conn, $russia);
mysqli_stmt_bind_param($stmt, "ssss", $first_name, $last_name, $email, $password);
$stmt213 = mysqli_stmt_execute($stmt);
if ($stmt213){
     header("Location:../auth.php");
}




