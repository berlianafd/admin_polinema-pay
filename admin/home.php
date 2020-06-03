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

    <style>
        #weatherWidget .currentDesc {
            color: #ffffff!important;
        }
        .traffic-chart {
            min-height: 335px;
        }
        #flotPie1  {
            height: 150px;
        }
        #flotPie1 td {
            padding:3px;
        }
        #flotPie1 table {
            top: 20px!important;
            right: -10px!important;
        }
        .chart-container {
            display: table;
            min-width: 270px ;
            text-align: left;
            padding-top: 10px;
            padding-bottom: 10px;
        }
        #flotLine5  {
           height: 105px;
       }

       #flotBarChart {
        height: 150px;
    }
    #cellPaiChart{
        height: 160px;
    }

</style>
</head>

<body>
    <!-- Left Panel -->
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="home.php"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                    </li>
                    <li class="menu-title">Data</li><!-- /.menu-title -->
                    <li><a href="user-mahasiswa.php" > <i class="menu-icon fa fa-users"></i>User</a></li>
                    <li><a href="user-relawan.php"> <i class="menu-icon ti-signal"></i>Relawan</a></li>
                    <li><a href="user-merchant.php"> <i class="menu-icon fa fa-shopping-cart"></i>Merchant</a></li>

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
        <!-- Content -->
        <div class="content">
            <!-- Animated -->
            <div class="animated fadeIn">
                <!-- Widgets  -->
                <div class="row">

                    <div class="col-lg-4 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-2">
                                        <i class="pe-7s-users"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <?php
                                            $sqlUser = "SELECT id FROM user where level='User'";
                                            $queryUser = mysqli_query($koneksi, $sqlUser); ?>

                                            <div class="stat-text"><span class="count"><?php echo mysqli_num_rows($queryUser)?></span></div>
                                            <div class="stat-heading">User</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-3">
                                        <i class="ti-signal"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <?php
                                            $sqlUser = "SELECT id FROM user where level='Relawan'";
                                            $queryUser = mysqli_query($koneksi, $sqlUser); ?>

                                            <div class="stat-text"><span class="count"><?php echo mysqli_num_rows($queryUser)?></span></div>
                                            <div class="stat-heading">Relawan</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-4">
                                        <i class="pe-7s-cart"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <?php
                                            $sqlUser = "SELECT id FROM user where level='Merchant'";
                                            $queryUser = mysqli_query($koneksi, $sqlUser); ?>
                                            <div class="stat-text"><span class="count"><?php echo mysqli_num_rows($queryUser)?></span></div>
                                            <div class="stat-heading">Merchant</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Widgets -->
                <!--  Traffic  -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="box-title">Grafik Total Sampah </h4>
                            </div>
                            <div class="row">
                                <div class="col-lg-10">
                                    <div class="card-body">

                                        <!-- <canvas id="TrafficChart"></canvas>   -->
                                        <div id="traffic-chart" class="traffic-chart"></div>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="card-body">
                                        <div class="progress-box progress-1">

                                            <?php
                                            $querySampah = mysqli_query($koneksi, "SELECT SUM(IF( MONTH(created_at) = 1, beratSampah , 0)) AS bln_01, SUM(IF( MONTH(created_at) = 2, beratSampah , 0)) AS bln_02, SUM(IF( MONTH(created_at) = 3, beratSampah , 0)) AS bln_03, SUM(IF( MONTH(created_at) = 4, beratSampah , 0)) AS bln_04, SUM(IF( MONTH(created_at) = 5, beratSampah, 0)) AS bln_05, SUM(IF( MONTH(created_at) = 6, beratSampah , 0)) AS bln_06, SUM(IF( MONTH(created_at) = 7, beratSampah , 0)) AS bln_07, SUM(IF( MONTH(created_at) = 8, beratSampah , 0)) AS bln_08, SUM(IF( MONTH(created_at) = 9, beratSampah , 0)) AS bln_09, SUM(IF( MONTH(created_at) = 10, beratSampah , 0)) AS bln_10, SUM(IF( MONTH(created_at) = 11, beratSampah , 0)) AS bln_11, SUM(IF( MONTH(created_at) = 12, beratSampah , 0)) AS bln_12,  SUM(beratSampah) AS TotalSK FROM transaksisampah where jenisSampah=1");
                                            $sampahKertas = mysqli_fetch_array($querySampah);
                                            $skertas1 = $sampahKertas['bln_01'];
                                            $skertas2 = $sampahKertas['bln_02'];
                                            $skertas3 = $sampahKertas['bln_03'];
                                            $skertas4 = $sampahKertas['bln_04'];
                                            $skertas5 = $sampahKertas['bln_05'];
                                            $skertas6 = $sampahKertas['bln_06'];
                                            $skertas7 = $sampahKertas['bln_07'];
                                            $skertas8 = $sampahKertas['bln_08'];
                                            $skertas9 = $sampahKertas['bln_09'];
                                            $skertas10 = $sampahKertas['bln_10'];
                                            $skertas11 = $sampahKertas['bln_11'];
                                            $skertas12 = $sampahKertas['bln_12'];
                                            $Totalskertas = $sampahKertas['TotalSK'];                                            
                                            ?>

                                            <h4 class="por-title">Sampah Kertas</h4>
                                            <div class="por-txt"><?php echo $Totalskertas ?> g</div>
                                            <div class="progress mb-2" style="height: 5px;">
                                                <div class="progress-bar bg-flat-color-4" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="progress-box progress-2">

                                           <?php
                                           $querySampah = mysqli_query($koneksi, "SELECT SUM(IF( MONTH(created_at) = 1, beratSampah , 0)) AS bln_01, SUM(IF( MONTH(created_at) = 2, beratSampah , 0)) AS bln_02, SUM(IF( MONTH(created_at) = 3, beratSampah , 0)) AS bln_03, SUM(IF( MONTH(created_at) = 4, beratSampah , 0)) AS bln_04, SUM(IF( MONTH(created_at) = 5, beratSampah, 0)) AS bln_05, SUM(IF( MONTH(created_at) = 6, beratSampah , 0)) AS bln_06, SUM(IF( MONTH(created_at) = 7, beratSampah , 0)) AS bln_07, SUM(IF( MONTH(created_at) = 8, beratSampah , 0)) AS bln_08, SUM(IF( MONTH(created_at) = 9, beratSampah , 0)) AS bln_09, SUM(IF( MONTH(created_at) = 10, beratSampah , 0)) AS bln_10, SUM(IF( MONTH(created_at) = 11, beratSampah , 0)) AS bln_11, SUM(IF( MONTH(created_at) = 12, beratSampah , 0)) AS bln_12, SUM(beratSampah) AS TotalSP FROM transaksisampah where jenisSampah=2");
                                           $sampahPlastik = mysqli_fetch_array($querySampah);
                                           $splastik1 = $sampahPlastik['bln_01'];
                                           $splastik2 = $sampahPlastik['bln_02'];
                                           $splastik3 = $sampahPlastik['bln_03'];
                                           $splastik4 = $sampahPlastik['bln_04'];
                                           $splastik5 = $sampahPlastik['bln_05'];
                                           $splastik6 = $sampahPlastik['bln_06'];
                                           $splastik7 = $sampahPlastik['bln_07'];
                                           $splastik8 = $sampahPlastik['bln_08'];
                                           $splastik9 = $sampahPlastik['bln_09'];
                                           $splastik10 = $sampahPlastik['bln_10'];
                                           $splastik11 = $sampahPlastik['bln_11'];
                                           $splastik12 = $sampahPlastik['bln_12'];
                                           $Totalsplastik = $sampahPlastik['TotalSP'];
                                           ?>

                                           <h4 class="por-title">Sampah Plastik</h4>
                                           <div class="por-txt"><?php echo $Totalsplastik ?> g</div>
                                           <div class="progress mb-2" style="height: 5px;">
                                            <div class="progress-bar bg-flat-color-1" role="progressbar" style="width: 100%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="50"></div>
                                        </div>
                                    </div>


                                </div> <!-- /.card-body -->
                            </div>
                        </div> <!-- /.row -->
                        <div class="card-body"></div>
                    </div>
                </div><!-- /# column -->
            </div>
            <!--  /Traffic -->
            <div class="clearfix"></div>
            <!-- Orders -->
            <div class="orders">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="box-title">Pesanan Jemput Sampah Terbaru </h4>
                            </div>
                            <div class="card-body--">
                                <div class="table-stats order-table ov-h">
                                    <table class="table ">
                                        <thead>
                                          <tr>
                                            <th class="serial">No.</th>
                                            <th class="avatar">Nama Acara</th>
                                            <th>Alamat</th>
                                            <th>Kelurahan</th>
                                            <th>Kecamatan</th>
                                            <th>Tanggal</th>
                                            <th>Waktu</th>
                                            <th>Berat Sampah</th>
                                            <th>Status</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php
                                      $no=1;      
                                      $batas = 3;
                                      if(isset($_POST['qcari'])){
                                          $qcari=$_POST['qcari'];
                                          $result1 = mysqli_query($koneksi,"select count(*) from permintaanjemputsampah where namaAcara like '%$qcari%'");
                                      } else {
                                          $result1 = mysqli_query($koneksi, "SELECT count(*) FROM permintaanjemputsampah");
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
                                          $query = mysqli_query($koneksi,"SELECT * FROM permintaanjemputsampah where namaAcara like '%$qcari%' limit $mulai, $batas");
                                      } else { 
                                          $query = mysqli_query($koneksi,"SELECT * FROM permintaanjemputsampah where Status='Pending'");  
                                      }
                                      while ($menu = mysqli_fetch_array($query)) {
                                          ?>
                                          <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $menu['namaAcara']; ?></td>
                                            <td><?php echo $menu['alamat']; ?></td>
                                            <td><?php echo $menu['kelurahan']; ?></td>                                              
                                            <td><?php echo $menu['kecamatan'];?></td>
                                            <td><span class="name"><?php echo $menu['tanggal'];?></span></td>
                                            <td><span class="product"><?php echo $menu['waktu'];?></span></td>
                                            <td><span class="count"><?php echo $menu['perkiraanBeratSampah'];?></span></td>

                                            <td>
                                               <span class="badge badge-warning"><?php echo $menu['Status'];?></span>
                                           </td>

                                       </tr>
                                       <?php
                                       $no++;
                                   }
                                   ?>  
                               </tbody>
                           </table>
                       </div> <!-- /.table-stats -->
                   </div>
               </div> <!-- /.card -->
           </div>  <!-- /.col-lg-8 -->
       </div>
   </div>
   <!-- /.orders -->

</div>
<!-- .animated -->
</div>
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

<!--  Chart js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.bundle.min.js"></script>

<!--Chartist Chart-->
<script src="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartist-plugin-legend@0.6.2/chartist-plugin-legend.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/jquery.flot@0.8.3/jquery.flot.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flot-pie@1.0.0/src/jquery.flot.pie.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flot-spline@0.0.1/js/jquery.flot.spline.min.js"></script>

<!--Local Stuff-->
<script>
 function status (id){
    var aksi = $('#aksistatus' + id ).val();  
    $.ajax({
      url: 'status-peninjaupesanan.php',
      type: 'POST',
      dataType: 'json',
      data: {
        value: aksi,
        id: id
    },
})
    .done(function() {
      console.log("success");
  })
    .fail(function() {
      console.log("error");
  });

}


jQuery(document).ready(function($) {
    "use strict";


            // Traffic Chart using chartist
            if ($('#traffic-chart').length) {
                var chart = new Chartist.Line('#traffic-chart', {
                  labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Juni', 'Juli', "Agust", "Sept", "Okt", "Des"],
                  series: [

                  [<?php  echo $splastik1; ?>, <?php  echo $splastik2; ?>, <?php  echo $splastik3; ?>, <?php  echo $splastik4; ?> , <?php  echo $splastik5; ?>, <?php  echo $splastik6; ?>, <?php  echo $splastik7; ?>, <?php  echo $splastik8; ?>, <?php  echo $splastik9; ?>, <?php  echo $splastik10; ?>, <?php  echo $splastik11; ?>, <?php  echo $splastik12; ?>],

                  [<?php  echo $skertas1; ?>, <?php  echo $skertas2; ?>, <?php  echo $skertas3; ?>, <?php  echo $skertas4; ?> , <?php  echo $skertas5; ?>, <?php  echo $skertas6; ?>, <?php  echo $skertas7; ?>, <?php  echo $skertas8; ?>, <?php  echo $skertas9; ?>, <?php  echo $skertas10; ?>, <?php  echo $skertas11; ?>, <?php  echo $skertas12; ?>]
                  ]
              }, {
                  low: 0,
                  showArea: true,
                  showLine: false,
                  showPoint: false,
                  fullWidth: true,
                  axisX: {
                    showGrid: true
                }
            });

                chart.on('draw', function(data) {
                    if(data.type === 'line' || data.type === 'area') {
                        data.element.animate({
                            d: {
                                begin: 2000 * data.index,
                                dur: 2000,
                                from: data.path.clone().scale(1, 0).translate(0, data.chartRect.height()).stringify(),
                                to: data.path.clone().stringify(),
                                easing: Chartist.Svg.Easing.easeOutQuint
                            }
                        });
                    }
                });
            }
            // Traffic Chart using chartist End

        });
    </script>
</body>
</html>
