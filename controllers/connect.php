<?php 
require_once('login.php');
$conn = mysqli_connect($host, $user, $pass, $db);
if (!$conn){
    echo mysqli_connect_error();
    die("Fatal error");
}
?>