<?php

// Check If form submitted, insert form data into users table.
    if(isset($_POST['Submit'])) {
        $id = $_POST['id'];
        $jenis = $_POST['jenis'];
        $harga = $_POST['harga'];
        $keterangan = $_POST['keterangan'];
        // include database connection file
        include'koneksi.php';

        // Update produk data into table
        $result = mysqli_query($koneksi, "UPDATE konversiharga SET id='$id' , jenis='$jenis',harga='$harga',  keterangan='$keterangan'WHERE id = $id");

        if( mysqli_query($koneksi, $result)) {
        // kalau gagal alihkan ke halaman produk.php dengan status=gagal
        header('Location: konversiharga.php?pesan=gagal');
        }else{
        // kalau berhasil alihkan ke halaman produk.php dengan status=update
        header('Location: konversiharga.php?pesan=update');
        }
    }
    mysqli_close($conn);
?>