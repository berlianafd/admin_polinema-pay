<?php 
if (!isset($_SESSION)) {
  session_start(); 
  ob_start();
}

@ini_set('output_buffering',0);
set_time_limit(0);
error_reporting(0);

if (!isset($_SESSION['password']) || !isset($_SESSION['username'])) {     
  session_unset();
  header("Location:login.php");
  exit;
}

require_once 'koneksi.php';

$id_user = $_SESSION['id_user'];
$query = mysqli_query($koneksi, "SELECT * FROM admin WHERE id_user = '$id_user'");
$admin = mysqli_fetch_array($query);

$foto = $admin['foto'];

echo "<img src='https://polinema-pay.online/upload/FotoProfil/$foto' id='imgView' height='100%' width='100%'>"

?>