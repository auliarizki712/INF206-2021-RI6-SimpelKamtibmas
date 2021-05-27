<?php
include("koneksi/php");

$user = $_POST["username"];
$user = $_POST["password"];
$sql = mysqli_query($conn, "SELECT * FROM login WHERE username='$user' AND password = '$pass'") or die (mysql_error());

if(mysqli_num_rows($sql) == 0)
{
	echo '<script language="javascript"> alert("Username dan password salah");
	document.location ="login.php";</script>';

}
else
{
	header("location: blank.html");
}