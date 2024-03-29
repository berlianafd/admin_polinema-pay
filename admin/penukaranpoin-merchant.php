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
  header("Location:index.php");
  exit;
}
require_once 'koneksi.php';
include "phpqrcode/qrlib.php"; 

$tempdir = "temp/"; //Nama folder tempat menyimpan file qrcode
 if (!file_exists($tempdir)) //Buat folder bername temp
 mkdir($tempdir);

    //isi qrcode jika di scan
 $codeContents = 'https://www.maribelajarcoding.com'; 
 
 //simpan file kedalam temp 
 //nilai konfigurasi Frame di bawah 4 tidak direkomendasikan 
 QRcode::png($codeContents, $tempdir.'008_4.png', QR_ECLEVEL_L, 3, 4);   
 QRcode::png($codeContents, $tempdir.'008_6.png', QR_ECLEVEL_L, 3, 6); 
 QRcode::png($codeContents, $tempdir.'008_12.png', QR_ECLEVEL_L, 3, 10); 
 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>POLINEMA-PAY</title>
  <link
  rel="stylesheet"
  href="https://fonts.googleapis.com/css?family=Roboto:400,700"
  />
  <!-- https://fonts.google.com/specimen/Roboto -->
  <link rel="stylesheet" href="css/fontawesome.min.css" />
  <!-- https://fontawesome.com/ -->
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <!-- https://getbootstrap.com/ -->
  <link rel="stylesheet" href="css/templatemo-style.css">
    <!--
    Product Admin CSS Template
    https://templatemo.com/tm-524-product-admin
  -->
</head>

<body id="reportsPage">
  <div class="" id="home">
    <nav class="navbar navbar-expand-xl">
            <div class="container h-100">
                <a class="navbar-brand" href="index-admin.php">
                    <h1 class="tm-site-title mb-0">POLINEMA-PAY</h1>
                </a>
                <button class="navbar-toggler ml-auto mr-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars tm-nav-icon"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto h-100">
                    <li class="nav-item">
                        <a class="nav-link" href="index-admin.php">
                            <i class="fas fa-home"></i>
                            Dashboard
                            <!-- <span class="sr-only">(current)</span> -->
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="peninjaupesanan.php">
                            <i class="fas fa-clipboard-list"></i>
                            Pesanan
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="konversiharga.php">
                            <i class="fas fa-money-check-alt"></i>
                            Konversi Harga
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="far fa-user"></i>
                            <span>
                                Riwayat
                            </span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="riwayat-tukarpoin.php">Tukar Poin</a>
                            <a class="dropdown-item" href="riwayat-tukarsampah.php">Tukar Sampah</a>
                        </div>
                    </li>
                    
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="far fa-user"></i>
                            <span>
                                Admin
                            </span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="accounts.php">Profil</a>
                            <a class="dropdown-item" href="tambah-admin.php">Tambah Admin</a>
                            <a class="dropdown-item" href="logout.php">Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

    </nav>

<div class="container mt-5">
  <div class="row tm-content-row">
    <div class="col-12 tm-block-col">
      <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
        <h3 align="center" class="text-white">Generate QR Code</h3>
        <div align="center">
          <br>
          <form method="POST">
            <table>
              <tr>
                <td class="text-white">Total Poin</td>
                <td><input type="number" name="content" id="content"></td>
              </tr>
              <tr>
                <td valign="top"></td>
                <td align="center"><input type="submit" name="simpan" value="Generate"></td>
              </tr>
            </table>
          </form>
          <?php
          if (isset($_POST['simpan'])) {

            include "phpqrcode/qrlib.php"; 

            $tempdir = "temp/"; //Nama folder tempat menyimpan file qrcode
            if (!file_exists($tempdir)) //Buat folder bername temp
            mkdir($tempdir);

            //isi qrcode jika di scan
            $codeContents = $_POST['content'];
            //nama file qrcode yang akan disimpan
            $namaFile=$_POST['content'].".png";
            //ECC Level
            $level=QR_ECLEVEL_H;
            //Ukuran pixel
            $UkuranPixel=10;
            //Ukuran frame
            $UkuranFrame=4;

            QRcode::png($codeContents, $tempdir.$namaFile, $level, $UkuranPixel, $UkuranFrame); 

            echo '<img src="'.$tempdir.$namaFile.'" />';  
          }

          ?>
        </div>
      </div>
    </div>
  </div>
</div>
</div><br><br><br><br>

<footer class="tm-footer row tm-mt-small">
  <div class="col-12 font-weight-light">
    <p class="text-center text-white mb-0 px-4 small">
      Copyright &copy; <b>2020</b> | Polinema-Pay
    </p>
  </div>
</footer>
</div>

<script src="js/jquery-3.3.1.min.js"></script>
<!-- https://jquery.com/download/ -->
<script src="js/bootstrap.min.js"></script>
<!-- https://getbootstrap.com/ -->
</body>
</html>
