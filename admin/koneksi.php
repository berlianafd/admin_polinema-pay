<?php
$host = "localhost";
$user = "polinema_admin";
$password = "adminpolinema-pay";
$db = "polinema_pay";

$koneksi = mysqli_connect($host, $user, $password) or die(mysqli_error());
$db_select = mysqli_select_db($koneksi, $db) or die(mysqli_error($koneksi));

?>