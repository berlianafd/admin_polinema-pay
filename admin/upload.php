<?php
include'koneksi.php';

if($_FILES["file"]["name"] != ''){
 $id_user = $_GET['idUser'];
 $test = explode('.', $_FILES["file"]["name"]);
 $ext = end($test);
 $name = rand(100, 999) . '.' . $ext;
 $location = '/home/polinema/public_html/upload/FotoProfil/' . $name;

 
 // Update produk data into table
        $result = mysqli_query($koneksi, "UPDATE admin SET foto='$name' WHERE id_user = $id_user");

        if( mysqli_query($koneksi, $result)) {
        echo "<script type='text/javascript'>alert('Perubahan Gagal!');</script>";
        }else{
            move_uploaded_file($_FILES["file"]["tmp_name"], $location);
            
        echo "<script type='text/javascript'>alert('Perubahan Berhasil!');</script>";
        
        // header('Location: accounts.php');
        }
}
?>
