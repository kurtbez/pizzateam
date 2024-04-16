<?php 
session_start();
include "connect.php";

$email = $_POST['email'] ?? '';
$pass = $_POST['password'] ?? '';

$query = "SELECT * FROM users WHERE email=?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "s", $email);
mysqli_stmt_execute($stmt);

$res = mysqli_stmt_get_result($stmt);
if( $user = mysqli_fetch_array($res)){
    if (password_verify($pass, $user['password'])){
        $_SESSION['user'] = $user['client_id'];
        header("Location:../lk.php");
    }
    else{
        $_SESSION['error_message'] = "Неверные логин или пароль";
        echo 'всё плохо';
        header("Location:../auth.php");
    }
}
else{
    $_SESSION['error_message'] = "Неверные логин или пароль";
    echo 'всё плохо2';
    header("Location:../auth.php");
}
$_SESSION['role'] = $user['role_id'];
