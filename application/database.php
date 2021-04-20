<?php
$host = "127.0.0.1";
$user = "root";
$pass = "";
$db = "uks";

$koneksi = mysqli_connect($host, $user, $pass, $db);
if (!$koneksi) {
	die ("Server MySQL tidak terhubung");  
} 
?>