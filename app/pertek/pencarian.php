<!DOCTYPE html>
<html lang="en">

<head>
  <?php include 'inc/head.php';?>
</head>

<body>
  <!-- ======= Header ======= -->
  <?php include 'inc/header.php';?>

  <main id="main">
    <div style="padding: 20px; text-align: center;">
      menampilkan hasil pencarian dari:
      <strong><?php echo $_GET['cari']; ?></strong>
    </div>
    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="row">

          <div class="col-lg-12 pt-3 pt-lg-0 content">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">No. Berkas/Tahun</th>
                  <th scope="col">Pemohon</th>
                  <th scope="col">Lokasi</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $akun_id=$_SESSION['user_id'];
                $batas = 20;
                $halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
                $halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

                $previous = $halaman - 1;
                $next = $halaman + 1;

                include 'inc/koneksi.php';

                //$data = mysqli_query($koneksi, "select id from berkas_pertek");
                $jumlah_data = 0;
                $total_halaman = 0;
                $cari = $_GET['cari'];
                // $query = "SELECT id, no_berkas, nama_pemohon, bertindak_atas_nama, desa_nagari, kecamatan, luas, tahun
                //           FROM berkas
                //           WHERE nama_pemohon LIKE '%?%' OR bertindak_atas_nama LIKE '%?%' OR no_berkas LIKE '%?%'
                //           ORDER BY waktu_entri DESC limit ?, ?";
                // $sql = $koneksi->prepare($query);
                // $sql->bind_param("sssss", $cari, $cari, $cari, $halaman_awal, $batas);
                $query = "SELECT id, no_berkas, nama_pemohon, bertindak_atas_nama, desa_nagari, 
                          kecamatan, luas, tahun
                          FROM berkas_pertek
                          WHERE akun_id = ?
                          AND (
                               LOWER(nama_pemohon) LIKE ? 
                            OR LOWER(bertindak_atas_nama) LIKE ? 
                            OR LOWER(no_berkas) LIKE ?
                            OR LOWER(desa_nagari) LIKE ?
                          )
                          ORDER BY waktu_entri DESC limit ?, ?";
                $sql = $koneksi->prepare($query);
                $cari2 = "%".strtolower($cari)."%";
                $sql->bind_param("sssssss", $akun_id, $cari2, $cari2, $cari2, $cari2, $halaman_awal, $batas);
                $sql->execute();
                $data = $sql->get_result();
                $no = $halaman_awal + 1;

                $jumlah_data = mysqli_num_rows($data);
                $total_halaman = ceil($jumlah_data / $batas);

                if ($data->num_rows > 0) {
                  while ($row = $data->fetch_assoc()) {
                    $id = $row['id'];
                    $no_berkas = $row['no_berkas'];
                    $tahun = $row['tahun'];
                    $nama_pemohon = $row['nama_pemohon'];
                    $nagari = $row['desa_nagari'];
                    $kecamatan = $row['kecamatan'];
                ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $no_berkas . "/" . $tahun; ?></td>
                      <td><?php echo $nama_pemohon ?></td>
                      <td><?php echo $nagari . ", " . $kecamatan; ?></td>
                      <td>
                        <a href="edit.php?berkas=<?php echo base64_encode($id) ?>">
                          <button type="button" class="btn btn-outline-primary btn-sm">Detail</button>
                      </td>
                      </a>
                    </tr>
                  <?php }
                } else { ?>
                  <tr>
                    <td colspan='5'>Tidak ada data ditemukan</td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
            Total Hasil Pencarian = <?php echo $jumlah_data ?>
            <nav>
              <ul class="pagination justify-content-center">
                <li class="page-item">
                  <a class="page-link" <?php if ($halaman > 1) {
                                          echo "href='?cari=".$cari."&halaman=$previous'";
                                        } ?>>Previous</a>
                </li>
                <?php
                for ($x = 1; $x <= $total_halaman; $x++) {
                ?>
                  <li class="page-item"><a class="page-link" href="?halaman=<?php echo $x ?>&cari=<?php echo $cari ?>"><?php echo $x; ?></a></li>
                <?php
                }
                ?>
                <li class="page-item">
                  <a class="page-link" <?php if ($halaman < $total_halaman) {
                                          echo "href='?halaman=$next'";
                                        } ?>>Next</a>
                </li>
              </ul>
            </nav>
          </div>
          
          <div class="col-md-12" style="text-align: center;">
            <br/>
            Pencarian Berkas:
            <form action="pencarian.php" method="GET" role="form">
              <div class="input-group mb-6">
                <input type="text" name="cari" class="form-control" placeholder=" cari salah satu saja, misalnyo: nomor berkas se (ndak pakai tahun), namo pemohon, bertindak atas nama, dll" aria-label="Recipient's username" aria-describedby="basic-addon2">
                <div class="input-group-append">
                  <button type="submit" class="input-group-text" id="basic-addon2">
                    <i class="fa fa-magnifying-glass"></i> &nbsp; Cari Berkas</button>
                </div>
              </div>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End About Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-info">
            <h3>About</h3>
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
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <?php
    if(isset($_GET['sukses'])){
      $sukses=$_GET['sukses'];
      echo '
        <script type="text/javascript">
        $(document).ready(function (){
          Swal.fire({
            position: "bottom-end",
            icon: "success",
            title: "'.$sukses.'",
            showConfirmButton: false,
            timer: 1500
          });
        });
        document.getElementById("berkas").scrollIntoView();
      </script>
      ';
    }
  ?>
</body>

</html>