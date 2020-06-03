<?php
require_once("admin/koneksi.php");
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        
        <title>Polinema-Pay</title>
        <link rel="shortcut icon" href="img/logo.png" />
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
        
        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/fontAwesome.css">
        <link rel="stylesheet" href="css/hero-slider.css">
        <link rel="stylesheet" href="css/owl-carousel.css">
        <link rel="stylesheet" href="css/templatemo-style.css">
        <link rel="stylesheet" href="css/lightbox.css">

        <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    </head>

<body>
    <div class="header">
        <div class="container">
            <nav class="navbar navbar-inverse" role="navigation">
                <div class="navbar-header">
                    <button type="button" id="nav-toggle" class="navbar-toggle" data-toggle="collapse" data-target="#main-nav">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="#" class="navbar-brand scroll-top"><span>P</span>olinema-<span>P</span>ay</a>
                </div>
                <!--/.navbar-header-->
                <div id="main-nav" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="#" class="scroll-top">Beranda</a></li>
                        <li><a href="#" class="scroll-link" data-id="about">Layanan</a></li>
                        <li><a href="#" class="scroll-link" data-id="map">Hubungi Kami</a></li>
                    </ul>
                </div>
                <!--/.navbar-collapse-->
            </nav>
            <!--/.navbar-->
        </div>
        <!--/.container-->
    </div>
    <!--/.header-->


    <div class="parallax-content baner-content" id="home">
        <div class="container">
            <div class="text-content">
                <img src="img/logo.png" alt="" height="200pt">
                <h2><em>THROW</em> <span>GARBAGE</span> NOW</h2>
                <p>Kini Semua Orang Bisa Untung Dengan Membuang Sampah</p>
                <div class="primary-white-button">

                    <?php
                $query = mysqli_query($koneksi,"SELECT * FROM file_apk"); 
                while($data = mysqli_fetch_array($query)){
                  ?>
                
                
                 <a href="download.php?filename=<?=$data['nama_file']?>" class="" >Download Aplikasi Polinema-Pay</a>

                    <?php 
                  } 
                  ?>
                    <!-- <a href="#" class="scroll-link" data-id="about">Download Android</a> -->
                </div>
            </div>
        </div>
    </div>


    <section id="about" class="page-section">
        <div class="container">
            <div class="text-content">
                <h2 style="color: white; text-align: center;">3 LANGKAH MUDAH MEMBUANG SAMPAH</h2>
                <br><br><br>
                <br>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="service-item">
                        <div class="icon">
                            <img src="img/service_icon_01.png" alt="" height="60pt">
                        </div>
                        <h4>Buang Sampah</h4>
                        <div class="line-dec"></div>
                        <!-- <p>Curabitur non risus fringilla libero accumsan molestie et quis justo. Cras aliquam tempor sem, vestibulum facilisis dui. Mauris malesuada porta.</p> -->
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="service-item">
                        <div class="icon">
                           &nbsp; &nbsp; &nbsp; <img src="img/service_icon_02.png" alt=""  height="70pt">
                        </div>
                        <h4>Scan Kode QR</h4>
                        <div class="line-dec"></div>
<!--                         <p>Do NOT re-distribute our template on any template download website. However, you can feel free to use this template for your commercial or non-commercial sites.</p> -->
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="service-item">
                        <div class="icon">
                            <img src="img/pay.png" alt="">
                        </div>
                        <h4>Dapatkan Poin</h4>
                        <div class="line-dec"></div>
                        <!-- <p>Feel free to talk to us on our Facebook page if you have any kind of question or suggestion. Sed tempor mi quis rhoncus convallis.</p> -->
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="portfolio">
        <div class="content-wrapper">
            <div class="inner-container container">
                <div class="row">
                    <div class="col-md-3 col-sm-12">
                        <div class="section-heading">
                            <h4>Layanan Kami</h4>
                            <div class="line-dec"></div>
                            
                            <div class="filter-categories">
                                <ul class="project-filter">
                                    <!-- <li class="filter" data-filter="all"><span>Show All</span></li> -->
                                    <li class="filter" data-filter="branding"><span>Tukar Sampah</span></li>
                                    <li class="filter" data-filter="graphic"><span>Jemput Sampah</span></li>
                                    <li class="filter" data-filter="nature"><span>Tukar Poin</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div><br><br><br><br><br><br><br><br><br><br><br><br></div>
                        <div class="projects-holder-3">
                            <div class="projects-holder">
                                <div class="row">
                                    <div class="col-md-4 col-sm-6 project-item mix branding">
                                      <div class="thumb">
                                            <div class="image">
                                                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <a href="img/portfolio_item_01.png" data-lightbox="image-1"><img src="img/portfolio_item_01.png" width="70%" style="border-radius: 50%; border:2px dotted #f89624!important;"></a>
                                            </div>
                                            <div>
                                                <p style="text-align: center;">Ingin buang sampah tapi bisa dapat poin? <br>Polineme-Pay punya solusinya. Buang sampah di tempat sampah tertentu di area Politeknik Negeri Malang. Scan Kode Qr nya melalui aplikasi dan dapatkan poinnya. <br>Throw Garbage Now!</p>
                                            </div>
                                      </div>
                                    </div>
                                
                                    <div class="col-md-4 col-sm-6 project-item mix graphic">
                                      <div class="thumb">
                                            <div class="image">
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                                                <a href="img/portfolio_item_03.png" data-lightbox="image-1"><img src="img/portfolio_item_03.png" width="70%" style="border-radius: 50%; border:2px dotted #f89624!important;"></a>
                                            </div>
                                            <div>
                                                <p style="text-align: center;">Setelah mengadakan acara kamu punya banyak sampah? Bingung cara membuangnya? <br> Booking permintaan jemput sampah melalui aplikasi. Relawan Polinema-Pay akan menjemput sampahmu dan kamu akan mendapatkan poin. <br> Throw Garbage Now! </p>
                                            </div>
                                      </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6 project-item mix nature">
                                        <div class="thumb">
                                            <div class="image">
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <a href="img/portfolio_item_04.png" data-lightbox="image-1"><img src="img/portfolio_item_04.png" width="70%" style="border-radius: 50%; border:2px dotted #f89624!important;"></a>
                                            </div>
                                            <div>
                                                <p style="text-align: center;">Ingin makan, minum, print, dan lainya secara gratis? <br> Kumpulkan poinmu sebanyak-banyaknya melalui aplikasi. Datang ke merchant tertentu dan gunakan poin untuk menukar barang yang ingin dibeli.<br>Throw Garbage Now!</p>
                                            </div>
                                        </div>
                                    </div>
                                
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </section>

    <div id="map">
    	<!-- How to change your own map point
            1. Go to Google Maps
            2. Click on your location point
            3. Click "Share" and choose "Embed map" tab
            4. Copy only URL and paste it within the src="" field below
        -->
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3951.5062222381925!2d112.61334811415617!3d-7.94652358136183!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e78827687d272e7%3A0x789ce9a636cd3aa2!2sState%20Polytechnic%20of%20Malang!5e0!3m2!1sen!2sth!4v1586931136866!5m2!1sen!2sth" width="100%" height="400" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
    </div>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-12">
                    <div class="logo">
                        <a class="logo-ft scroll-top" href="#"><em style="color:#fff">P</em>olinema-<em style="color:#fff">P</em>ay</a>
                        <p>Copyright &copy; 2020 Polinema-Pay
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="location">
                        <h4>Lokasi</h4>
                        <ul>
                            <li>Jalan Soekarno Hatta 9, Kota Malang <br>Politeknik Negeri Malang</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="contact-info">
                        <h4>Hubungi kami:</h4>
                        <ul>
                            <a href="mailto: cs@polinema-pay.online">
                            <li><em>Email</em>: cs@polinema-pay.online</li></a>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

    <script src="js/vendor/bootstrap.min.js"></script>

    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        // navigation click actions 
        $('.scroll-link').on('click', function(event){
            event.preventDefault();
            var sectionID = $(this).attr("data-id");
            scrollToID('#' + sectionID, 750);
        });
        // scroll to top action
        $('.scroll-top').on('click', function(event) {
            event.preventDefault();
            $('html, body').animate({scrollTop:0}, 'slow');         
        });
        // mobile nav toggle
        $('#nav-toggle').on('click', function (event) {
            event.preventDefault();
            $('#main-nav').toggleClass("open");
        });
    });
    // scroll function
    function scrollToID(id, speed){
        var offSet = 50;
        var targetOffset = $(id).offset().top - offSet;
        var mainNav = $('#main-nav');
        $('html,body').animate({scrollTop:targetOffset}, speed);
        if (mainNav.hasClass("open")) {
            mainNav.css("height", "1px").removeClass("in").addClass("collapse");
            mainNav.removeClass("open");
        }
    }
    if (typeof console === "undefined") {
        console = {
            log: function() { }
        };
    }
    </script>
</body>
</html>