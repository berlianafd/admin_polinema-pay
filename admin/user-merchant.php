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


$id_user = $_SESSION['id_user'];
$query = mysqli_query($koneksi, "SELECT * FROM admin WHERE id_user = '$id_user'");
$admin = mysqli_fetch_array($query);
$id_user = $admin['id_user'];
$foto = $admin['foto'];
$namaAdmin = $admin['name'];
$levelAdmin = $admin['level'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Polinema-Pay | Admin</title>
    <link rel="shortcut icon" href="img/logo.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
    <link href="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/jqvmap@1.5.1/dist/jqvmap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/weathericons@2.1.0/css/weather-icons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.css" rel="stylesheet" />

   
</head>

<body>
    <!-- Left Panel -->
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="">
                        <a href="home.php"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                    </li>
                    <li class="menu-title">Data</li><!-- /.menu-title -->
                    <li><a href="user-mahasiswa.php" > <i class="menu-icon fa fa-users"></i>User</a></li>
                    <li><a href="user-relawan.php"> <i class="menu-icon ti-signal"></i>Relawan</a></li>
                    <li class="active"><a href="user-merchant.php"> <i class="menu-icon fa fa-shopping-cart"></i>Merchant</a></li>
                     <?php if ($levelAdmin == "SuperAdmin") {
                        echo "<li><a href='user-admin.php'> <i class='menu-icon fa fa-user'></i>Admin</a></li>";
                    } ?>
                    

                    <li class="menu-title">Fitur</li><!-- /.menu-title -->
                    <li><a href="peninjaupesanan.php"> <i class="menu-icon ti-list"></i>Pesanan Jemput Sampah</a></li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa ti-time"></i>Riwayat</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="ti-trash"></i><a href="riwayat-tukarsampah.php">Tukar Sampah</a></li>
                            <li><i class="ti-server"></i><a href="riwayat-tukarpoin.php">Tukar Poin</a></li>
                        </ul>
                    </li>
                    <li><a href="konversiharga.php"> <i class="menu-icon ti-money"></i>Konversi Harga</a></li>
                    
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>
    <!-- /#left-panel -->
    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <!-- Header-->
        <header id="header" class="header">
            <div class="top-left">
                <div class="navbar-header">
                    <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
                    <a class="navbar-brand" href="./"><img src="img/logo.png" alt="Logo"></a>
                    <a class="navbar-brand hidden" href="./"><img src="img/logo2.png" alt="Logo"></a>
                </div>
            </div>
            <div class="top-right">
                <div class="header-menu">
                    <div class="header-left">
                        <P style="color: white; margin-top: 15px; margin-right: 15px">Hai <?php echo $namaAdmin ?></P>
                    </div>

                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <!-- <img class="user-avatar rounded-circle" src="img/admin.jpg" alt="User Avatar"> -->
                            <img  class="user-avatar rounded-circle" src="https://polinema-pay.online/upload/FotoProfil/<?php echo $admin['foto']; ?>" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="accounts.php"><i class="fa fa- user"></i>Profil</a>
                            <a class="nav-link" href="logout.php"><i class="fa fa-power -off"></i>Keluar</a>
                        </div>
                    </div>

                </div>
            </div>
        </header>
        <!-- /#header -->
        <!-- Header-->

        <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">Data</a></li>
                                    <li><a href="user-merchant.php"> Merchant </a></li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <form class="search-form" action="user-merchant.php" method="post">
                                <strong class="card-title"><input type="form-control mr-sm-2" placeholder="Username.." aria-label="Search" name="qcari"></strong>
                                <i class="fa fa-search"></i>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="breadcrumbs">
            <a class="btn btn-primary" href="tambah-merchant.php" role="button">Tambah Merchant</a>
        </div>
        <div class="content">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header" align="center">
                                <strong class="card-title">Data Merchant</strong>

                            </div>
                            <div class="table-stats order-table ov-h">
                                <table class="table ">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Username</th>
                                            <th>Nama Lengkap</th>
                                            <th>No. Telp</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $no=1;      
                                            $batas = 3;
                                            if(isset($_POST['qcari'])){
                                                $qcari=$_POST['qcari'];
                                                $result1 = mysqli_query($koneksi,"select count(*) from user where username like '%$qcari%'");
                                            } else {
                                                $result1 = mysqli_query($koneksi, "SELECT count(*) FROM user");
                                            }
                                            $recordcount = mysqli_fetch_row($result1)[0];
                                            $pagecount = ceil($recordcount / $batas);
                                            if(!isset($_GET['page'])){
                                                $activepage = 1;
                                            } else {
                                                $activepage = $_GET['page'];
                                            }
                                            $mulai = $batas * ($activepage-1);
                                            if(isset($_POST['qcari'])){
                                                $qcari=$_POST['qcari'];
                                                $query = mysqli_query($koneksi,"SELECT  id, username, level, name, nohp, encrypted_imei, salt, created_at, updated_at FROM user where username like '%$qcari%' limit $mulai, $batas");
                                            } else { 
                                                $query = mysqli_query($koneksi,"SELECT * FROM user where level='Merchant' order by name ASC");   
                                            }
                                            while ($menu = mysqli_fetch_array($query)) {
                                              ?>
                                              <tr>
                                                <td><p><?php echo $no; ?></p></td>
                                                <td><p><?php echo $menu['username'];?></p></td>
                                                <td><p><?php echo $menu['name'];?></p></td>
                                                <td><p><?php echo $menu['nohp'];?></p></td>
                                                <td><p><a href="generateqr.php" class='btn btn-success'></i>Tukar Poin</a></p></td>
                                            </tr>
                                            <?php
                                            $no++;
                                        }
                                        ?> 
                                    </tbody>
                                </table>
                            </div> <!-- /.table-stats -->
                        </div>
                    </div>

        </div>
    </div><!-- .animated -->
</div><!-- .content -->

<!-- /.content -->
<div class="clearfix"></div>
<!-- Footer -->
<footer class="site-footer">
    <div class="footer-inner bg-white">
        <div class="row">
            <div class="col-sm-6">
                Copyright &copy; 2020 Polinema-Pay
            </div>

        </div>
    </div>
</footer>
<!-- /.site-footer -->
</div>
<!-- /#right-panel -->

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
<script src="assets/js/main.js"></script>

</body>
</html>
