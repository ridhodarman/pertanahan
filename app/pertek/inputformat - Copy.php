<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Contact - Serenity Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Serenity
  * Updated: Sep 18 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/serenity-bootstrap-corporate-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
        <h1 class="text-light"><a href="index.php">Seksi 3</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.php"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="index.php">Home</a></li>
          <li class="dropdown"><a href="#"><span>About</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="about.html">About</a></li>
              <li><a href="team.html">Team</a></li>
              <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
            </ul>
          </li>
          <li><a href="services.html">Services</a></li>
          <li><a href="pricing.html">Pricing</a></li>
          <li><a href="portfolio.html">Portfolio</a></li>
          <li><a href="blog.html">Blog</a></li>
          <li><a class="active" href="contact.html">Contact</a></li>

          <li><a class="getstarted" href="about.html">Get Started</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="breadcrumb-hero">
        <div class="container">
          <div class="breadcrumb-hero">
            <h2>Input Format</h2>
            <p>Pertimbangan Teknis Pertanahan Kabupaten Agam</p>
          </div>
        </div>
      </div>
      <div class="container">
        <ol>
          <li><a href="index.php">Home</a></li>
          <li>Input Format</li>
        </ol>
      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="row mt-5">

          <div class="col-lg-12 mt-5 mt-lg-0" data-aos="fade-left">

            <form action="act/tambah-format.php" method="post" role="form" class="php-email-form" enctype="multipart/form-data">
              <div class="row">
                <div class="col-md-4 form-group">
                  <label>Nomor SK:</label>
                  <input type="text" name="no_sk" class="form-control" id="no_sk" placeholder="nomor SK Pertek">
                </div>
                <div class="col-md-4 form-group mt-3 mt-md-0">
                  <label>Tanggal SK:</label>
                  <input type="date" class="form-control" name="tanggal_sk">
                </div>
                <div class="col-md-4 form-group mt-3 mt-md-0">
                  <label>File SK (pdf):</label>
                  <input type="file" class="form-control" name="file_sk">
                </div>
              </div>
              <div class="row mt-5">
                <div class="col-md-4 form-group">
                <label>Format Surat Undangan Rapat Persiapan:</label>
                  <input type="file" class="form-control" name="surat_undangan_rapat_persiapan">
                </div>
                <div class="col-md-4 form-group">
                <label>Format Notulensi Rapat Persiapan:</label>
                  <input type="file" class="form-control" name="notulensi_rapat_persiapan">
                </div>
                <div class="col-md-4 form-group">
                <label>Format Daftar Hadir Rapat Persiapan:</label>
                  <input type="file" class="form-control" name="daftar_hadir_rapat_persiapan ">
                </div>
              </div>

              <div class="row mt-5">
                <div class="col-md-6 form-group">
                <label>Format Surat Surat Tugas Pemeriksaan Lapang:</label>
                  <input type="file" class="form-control" name="st_pl">
                </div>
                <div class="col-md-6 form-group">
                <label>Format Berita Acara Pemeriksaan Lapang:</label>
                  <input type="file" class="form-control" name="ba_pl">
                </div>
              </div>

              <div class="row mt-5">
                <div class="col-md-4 form-group">
                <label>Format Surat Tugas Pengolahan Data:</label>
                  <input type="file" class="form-control" name="st_pengolahan_data">
                </div>
                <div class="col-md-4 form-group">
                <label>Format Berita Acara Pengolahan Data:</label>
                  <input type="file" class="form-control" name="ba_pengolahan_data">
                </div>
                <div class="col-md-4 form-group">
                <label>Format Daftar Hadir Pengolahan Data:</label>
                  <input type="file" class="form-control" name="daftar_hadir_pengolahan_data">
                </div>
              </div>

              <div class="row mt-5">
                <div class="col-md-4 form-group">
                <label>Format Surat Undangan Pembahasan PTP:</label>
                  <input type="file" class="form-control" name="surat_undangan_pembahasan_ptp">
                </div>
                <div class="col-md-4 form-group">
                <label>Format Berita Acara Pembahasan PTP:</label>
                  <input type="file" class="form-control" name="ba_pembahasan_ptp">
                </div>
                <div class="col-md-4 form-group">
                <label>Format Daftar Rapat Pembahasan PTP:</label>
                  <input type="file" class="form-control" name="daftar_hadir_pembahasan_ptp">
                </div>
              </div>

              <div class="row mt-5">
                <div class="col-md-6 form-group">
                <label>Format Risalah PTP:</label>
                  <input type="file" class="form-control" name="risalah">
                </div>
                <div class="col-md-6 form-group">
                <label>Format Surat Keluar PTP:</label>
                  <input type="file" class="form-control" name="surat_ptp">
                </div>
              </div>

              <div class="row mt-5">
                <div style="padding-top: 15px;"></div>
                <!-- <div style="padding-top: 5px;"></div> -->
                <button name="baru" type="submit" class="btn btn-success btn-lg btn-block">
                  <i class="fa fa-save"></i>
                  Simpan Format
                </button>
              </div>
            </form>

          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-info">
            <h3>Serenity</h3>
            <p>Cras fermentum odio eu feugiat lide par naso tierra. Justo eget nada terra videa magna derita valies darta donna mare fermentum iaculis eu non diam phasellus. Scelerisque felis imperdiet proin fermentum leo. Amet volutpat consequat mauris nunc congue.</p>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><a href="#">Home</a></li>
              <li><a href="#">About us</a></li>
              <li><a href="#">Services</a></li>
              <li><a href="#">Terms of service</a></li>
              <li><a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-contact">
            <h4>Contact Us</h4>
            <p>
              A108 Adam Street <br>
              New York, NY 535022<br>
              United States <br>
              <strong>Phone:</strong> +1 5589 55488 55<br>
              <strong>Email:</strong> info@example.com<br>
            </p>

            <div class="social-links">
              <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
              <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
              <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
              <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
            </div>

          </div>

          <div class="col-lg-3 col-md-6 footer-newsletter">
            <h4>Our Newsletter</h4>
            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna veniam enim veniam illum dolore legam minim quorum culpa amet magna export quem marada parida nodela caramase seza.</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>
          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Serenity</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/serenity-bootstrap-corporate-template/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <!-- <script src="assets/vendor/php-email-form/validate.js"></script> -->

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>