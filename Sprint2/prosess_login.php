<?php
session_start();

$username   = $_POST['username'];
$pass       = $_POST['password'];

require 'function.php';

$user = mysqli_query($conn,"SELECT * FROM login WHERE username='$username' and password='$pass'");
$chek = mysqli_num_rows($user);
if($chek>0)
{

    //set session
    $_SESSION["login"] = true;

    header("location: LihatLaporan.php");
}else
{
    echo "<script>
    alert('Username atau Password yang anda masukkan salah atau tidak terdaftar')
    document.location = 'login.php';
    </script>";
}
?>